<?php

namespace App\Form;

use App\Entity\Artist;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArtistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
          ->add('artist_name', TextType::class,)
          ->add('artist_img', FileType::class, [
            'mapped' => false,
            'required' => true,
            'constraints' => [
              new File([
                'mimeTypes' => [
                  'image/gif',
                  'image/jpeg',
                  'image/jpg',
                  'image/png',
                  'image/webp',
                ],
              'mimeTypesMessage' => 'Please upload a valid image file',
              ])
            ]
          ])
          ->add('save', SubmitType::class)
          ->add('cancel', ResetType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Artist::class,
        ]);
    }
}
