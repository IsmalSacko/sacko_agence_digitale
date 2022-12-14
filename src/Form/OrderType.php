<?php

namespace App\Form;

use App\Entity\Adress;
use App\Entity\Carier;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $user = $options['user'];

        $builder
            ->add('adresses', EntityType::class,[
                'label' => false,
                'required' => true,
                'class' => Adress::class,
                'choices'=>$user->getAdresses(),
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('carriers', EntityType::class,[
                'label' => 'Choisissez votre transporteur',
                'required' => true,
                'class' => Carier::class,
                'multiple' => false,
                'expanded' => true,
            ])
            ->add('submit', SubmitType::class,[
                'label' => 'Valider votre commande',
                'attr' => [
                    'class' => 'btn btn-success btn-block mt-5'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'user' => [],
        ]);
    }
}
