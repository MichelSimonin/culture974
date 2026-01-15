<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Events;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, [
                'attr' => ['class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm'],
            ])
            ->add('description', TextareaType::class, [
                'attr' => ['class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm', 'rows' => 4],
            ])
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'attr' => ['class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm'],
            ])
            ->add('lieu', null, [
                'attr' => ['class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm'],
            ])
            ->add('image', null, [
                'attr' => ['class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm'],
            ])
            ->add('category_id', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'nom',
                'placeholder' => false,
                'attr' => ['class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Events::class,
        ]);
    }
}
