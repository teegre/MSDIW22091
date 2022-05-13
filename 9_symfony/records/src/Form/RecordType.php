<?php

namespace App\Form;

use App\Entity\Record;
use App\Entity\Artist;
use App\Repository\ArtistRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class RecordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
          ->add('record_title', TextType::class, [
            'attr' => [
              'class' => 'form-control form-control-sm mb-2',
              'placeholder' => 'Enter title...',
            ],
            'label' => 'Title',
            'label_attr' => [
              'class' => 'col-form-label-sm',
            ]

          ])
            ->add('artist_id', EntityType::class, [
              'class' => Artist::class,
              'query_builder' => function (ArtistRepository $ar) {
                return $ar->createQueryBuilder('a')
                  ->orderBy('a.artist_name', 'ASC');
              },
              'choice_label' => 'artist_name',
              'attr' => [
                'class' => 'form-select form-select-sm mb-2',
              ],
              'label' => 'Artist',
              'label_attr' => [
                'class' => 'col-form-label-sm'
              ],
            ])
            ->add('record_year', NumberType::class, [
              'attr' => [
                'class' => 'form-control form-control-sm',
                'placeholder' => 'Enter year...',
              ],
              'label' => 'Year',
              'label_attr' => [
                'class' => 'col-form-label-sm',
              ]
            ])
            ->add('record_label', TextType::class, [
              'attr' => [
                'class' => 'form-control form-control-sm',
                'placeholder' => 'Enter label (Warp Records, Reprise, Warner Bros.)...',
              ],
              'label' => 'Label',
              'label_attr' => [
                'class' => 'col-form-label-sm',
              ]
            ])
            ->add('record_genre', TextType::class, [
              'attr' => [
                'class' => 'form-control form-control-sm',
                'placeholder' => 'Enter genre (Funk, Black Metal, Jazz, Classic, Rock)...',
              ],
              'label' => 'Genre',
              'label_attr' => [
                'class' => 'col-form-label-sm',
              ]
            ])
            ->add('record_price', NumberType::class, [
              'attr' => [
                'class' => 'form-control form-control-sm',
                'placeholder' => 'Enter price...',
              ],
              'label' => 'Price',
              'label_attr' => [
                'class' => 'col-form-label-sm',
              ]
            ])
            ->add('record_picture', FileType::class, [
              'attr' => [
                'class' => 'form-control form-control-sm mb-4',
                'placeholder' => 'Choose a file...'
              ],
              'label' => 'Picture',
              'label_attr' => [
                'class' => 'col-form-label-sm',
              ],
              'mapped' => false,
              'required' => true,
              'constraints' => [
                new File([
                  'mimeTypes' => [
                    'image/gif',
                    'image/jpeg',
                    'image/jpg',
                    'image/png',
                  ],
                  'mimeTypesMessage' => 'Please upload a valid image file',
                ])
              ]
            ])
            ->add('Save', SubmitType::class, [
              'attr' => [
                'class' => 'col btn btn-danger btn-sm',
              ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Record::class,
        ]);
    }
}
