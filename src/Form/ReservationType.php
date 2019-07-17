<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('spectacle', HiddenType::class)
            ->add('group', CheckboxType::class, [
                'required' => false,
            ])
            ->add('nbgroup',IntegerType::class, [
                'required' => false,
            ])
            ->add('ecole', CheckboxType::class, [
                'required' => false,
            ])
            ->add('nbecole',IntegerType::class, [
                'required' => false,
            ])
            ->add('adulte', CheckboxType::class, [
                'required' => false,
            ])
            ->add('nbadulte',IntegerType::class, [
                'required' => false,
            ])
            ->add('enfant', CheckboxType::class, [
                'required' => false,
            ])
            ->add('nbenfant',IntegerType::class, [
                'required' => false,
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
