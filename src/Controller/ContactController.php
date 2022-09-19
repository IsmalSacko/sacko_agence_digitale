<?php

namespace App\Controller;

use App\Classe\Mailjet;
use App\Form\ContactType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $notify = null;
        $mail = new Mailjet();
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $name = $form->get('nom')->getData().' '.$form->get('prenom')->getData();
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=utf-8';
            $headers[] ='Reply-To: '.$form->get('email')->getData()."\n";
            $message= $form->get('message')->getData();
            $adress_email = $form->get('email')->getData();
            $content = "Bonjour Ismael SACKO, <br/> Vous avez un message de la part de ";
            $content .= $name.'.'.'<br>'. "Contenu du message : <p>$message</p> <hr> Pour répondre à ce client, il faut envoyer un email à ";
            $content .="<strong>$adress_email</strong>";
           mail('ismalsacko@yahoo.fr','Contact de '.$name ,$content,implode("\r\n", $headers));

            $notify = "Votre message nous est parvenu et nous vou répondrons dans le plus bef délai";
        }
        return $this->render('contact/index.html.twig', [
            'form'=> $form->createView(),
            'notify' => $notify,
        ]);
    }
}
