<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom de la catégorie',
                'attr' => [
                    'placeholder' => 'Ex: Concert, Expo, Atelier...',
                    'class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm'
                ],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'Le nom est obligatoire']),
                    new Assert\Length([
                        'max' => 50,
                        'maxMessage' => 'Le nom ne peut pas dépasser {{ limit }} caractères'
                    ])
                ]
            ])
            ->add('couleur', ColorType::class, [
                'label' => 'Couleur (code hex)',
                'attr' => [
                    'class' => 'mt-1 block w-20 h-10 rounded-md border-gray-300 shadow-sm'
                ],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'La couleur est obligatoire'])
                ]
            ])
            ->add('icone', TextType::class, [
                'label' => 'Icône (emoji)',
                'attr' => [
                    'placeholder' => 'Ex: 🎵 🎨 ✍️ 🎤',
                    'class' => 'mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm',
                    'maxlength' => 50
                ],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'L\'icône est obligatoire']),
                    new Assert\Length([
                        'max' => 50,
                        'maxMessage' => 'L\'icône ne peut pas dépasser {{ limit }} caractères'
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Category::class,
        ]);
    }
}
