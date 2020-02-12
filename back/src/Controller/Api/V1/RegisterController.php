<?php

namespace App\Controller\Api\V1;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    /**
     * Create a new user
     * @Route("/api/v1/register", name="api_v1_register", methods={"POST"})
     */
    public function register(Request $request, SerializerInterface $serializer, UserPasswordEncoderInterface $passwordEncoder): Response
    {
        // first action we get the Json content
        $newUser = $request->getContent();

        // then decode Json
        $data = json_decode($newUser, true);

        // and replace this into the request with parameters in array shape
        $request->request->replace(is_array($data) ? $data : array());

        // second action is to create a new object user and a UserType form associated that we fill with the request
        $user = new User();
        $form = $this->createForm(UserType::class, $user, ['csrf_protection' => false]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // attribute role user
            $user->setRoles(['ROLE_USER']);

            // get plain password 
            $plainPassword = $user->getPassword();

            // encode password
            $encodedPassword = $passwordEncoder->encodePassword($user, $plainPassword);

            // replace plain password by the hashed password
            $user->setPassword($encodedPassword);

            // save in database
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            // return JSON
            return $this->json('user registered');
        }

        // return JSON if not a success
        return $this->json('failed to register');
    }
}