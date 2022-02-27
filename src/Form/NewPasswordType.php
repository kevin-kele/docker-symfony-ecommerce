<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class NewPasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('password',RepeatedType::class,[
            'type'=>PasswordType::class,
            'invalid_message'=>'Le mot de passe et la confirmation doivent etre identique',
            'label'=>'Votre mot de passe :',
            'required'=>true,
            'first_options'=> [
                'label'=> 'Mot de passe'
            ],
            'second_options'=>[
                'label'=>'Confirmer votre mot de passe'
            ]
        ])
        ->add('submit',SubmitType::class,[
            'label'=>"Enregistre"
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
