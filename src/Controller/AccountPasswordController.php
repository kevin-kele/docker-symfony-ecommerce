<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\NewPasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AccountPasswordController extends AbstractController
{

    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/account/password", name="app_account_password")
     */
    public function index(Request $request , UserPasswordHasherInterface $encoder): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(NewPasswordType::class,$user);
        
        $form->handleRequest($request);

        if ($form->isSubmitted()&& $form->isValid()) {
            
            $user = $form->getData();
            $password = $encoder->hashPassword($user,$user->getPassword());
            $user->setPassword($password);
            $this->entityManager->persist($user);
            $this->entityManager->flush();
            
        }

        return $this->render('account_password/index.html.twig',[
            'form'=> $form->createView()
        ]);
    }
}
