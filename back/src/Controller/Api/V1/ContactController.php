<?php

namespace App\Controller\Api\V1;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("api/v1/contact", name="api_v1_contact", methods={"POST"})
     */
    public function contact(Request $request, \Swift_Mailer $mailer)
    {
        // first action we get the Json content
        $newContact = $request->getContent();

        // then decode Json
        $data = json_decode($newContact, true);

        // and replace this into the request with parameters in array shape
        $request->request->replace(is_array($data) ? $data : array());

        // second action is to create a new object contact and a ContactType form associated that we fill with the request
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact, ['csrf_protection' => false]);
        $form->handleRequest($request);
     

        if ($form->isSubmitted() && $form->isValid()) {

            // Let's set the message with form data
            $message = (new \Swift_Message('Formulaire de contact : '.$form['subject']->getData()))
                ->setFrom($form['email']->getData())
                ->setTo('contact.prendrelaire@gmail.com')
                ->setReplyTo($form['email']->getData())
                ->setBody(
                    '<h2>Message de '.$form['name']->getData() .'</h2>'.'<h2>Contenu : </h2>'.$form['content']->getData(),
                    'text/html'
            );

            // send message
            $mailer->send($message);

            return $this->json('mail sent');
        }
        
        return $this->json('failed to send the message');
    }
}
