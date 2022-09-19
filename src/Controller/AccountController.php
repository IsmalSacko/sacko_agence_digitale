<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="account_index")
     */
    public function index(): Response
    {

        //$session = $request->getSession();
        //$session->set('full_name', $this->getUser()->getFullName(),  0, 5);
        //$session->get('full_name');

        return $this->render('account/index.html.twig', [
            'user' => $this->getUser(),
        ]);
    }
}
