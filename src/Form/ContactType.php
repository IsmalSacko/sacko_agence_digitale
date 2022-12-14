<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class,[
                'label' =>'Votre nom'
            ])
            ->add('prenom', TextType::class,[
                'label' =>'Votre prénom'
            ])
            ->add('email', EmailType::class,[
                'label' =>'Votre adresse email'
            ])
            ->add('message', TextareaType::class,[
                'label' =>'Votre message'
            ])
            ->add('submit', SubmitType::class,[
                'label' =>'Envoyer',
                'attr'=>[
                    'class'=>'btn btn-primary btn-block mb-5',
                    'id'=>'navbarsackola'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }


}
