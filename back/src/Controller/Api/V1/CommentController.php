<?php

namespace App\Controller\Api\V1;

use App\Entity\Comment;
use App\Form\CommentType;
use App\Repository\CommentRepository;
use App\Service\ImageUploader;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\KernelInterface;

/**
* @Route("/api/v1/secured/comments", name="api_v1_secured_comments_")
*/
class CommentController extends AbstractController
{
    /**
     * show all comments
     * @Route("/", name="list", methods={"GET"})
     */
    public function list(CommentRepository $commentRepository, SerializerInterface $serializer)
    {
        $comments = $commentRepository->findAll();
        $data = $serializer->normalize($comments, null, ['groups' => 'api_v1_comment']);
        return $this->json($data);
    }

    /**
     * Show comments by id
     * @Route("/{id}", name="show", requirements={"id": "\d+"}, methods={"GET"})
     */
    public function show(Comment $comment, SerializerInterface $serializer)
    {
        $data = $serializer->normalize($comment, null, ['groups' => 'api_v1_comment']);
        return $this->json($data);
    }

    /**
     * Create a new comment
     * @Route("/", name="new", methods={"POST"})
     */
    public function new(Request $request, ImageUploader $imageUploader, SerializerInterface $serializer, KernelInterface $kernel, ContainerInterface $container)
    {
        // first action we get the Json content
        $newComment = $request->getContent();

        // then decode Json
        $data = json_decode($newComment, true);

        // and replace this into the request with parameters in array shape
        $request->request->replace(is_array($data) ? $data : array());

        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment, ['csrf_protection' => false]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() ) {
            // if the user actually fill the picture data, then we upload it
            if ($form['picture']->getData() !== null) {
                // upload of the picture 
                $urlFile = $form['picture']->getData();
                $file = $imageUploader->downloadFile($urlFile, 'images');
                $comment->setPicture('/images/' . $file);
            }
            
            // if the user fill the rate data, then we set it
            if ($form['rate']->getData() !== null) {
                $comment->setRate($form['rate']->getData());
            }

            // add comment to bdd
            $comment->setUser($this->getUser());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comment);
            $entityManager->flush();

            // Here we instantiate the kernel class to create application kernel
            $application = new Application($kernel);
            // Sets whether to automatically exit after a command execution or not.
            $application->setAutoExit(false);

            // instantiate the input interface with arguments and options to pass to the command
            $input = new ArrayInput([
                'command' => 'app:make:average'
            ]);

            // instantiate output interface. BufferedOutPut empties buffer and returns its content. We use NullOutput() because we don't use the output.
            $output = new NullOutput();

            // run the command
            $application->run($input, $output);

            // return comment in JSON
            $data = $serializer->normalize($comment, null, ['groups' => 'api_v1_comment']);
            return $this->json($data);
        }

        return $this->json('Form invalid');
    }

}

