<?php

namespace App\Form;

use App\Entity\User;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname',TextType::class,[
                'label'=>'Prenom :',
                'attr'=> [
                    'placeholder'=> 'Saisir votre prenom'
                ]
            ])
            ->add('lastname',TextType::class,[
                'label'=>'Nom :',
                'attr'=> [
                    'placeholder'=> 'Saisir votre nom'
                ]  
            ])
            ->add('email',EmailType::class,[
                'label'=>'Email :',
                'attr'=> [
                    'placeholder'=> 'Saisir un email'
                ]
            ])
            ->add('password',PasswordType::class,[
                'label'=>'Votre mot de passe :',
                'attr'=> [
                    'placeholder'=> 'Saisir un mot de pass'
                ]
            ])
            ->add('password_confirm',PasswordType::class,[
                'label'=>'confirmez votre mot de pass',
                'mapped'=>false,
                'attr'=> [
                    'placeholder'=> 'Confirmer votre mot de pass'
                ]
            ])
            ->add('submit',SubmitType::class,[
                'label'=>"s'incrire"
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
