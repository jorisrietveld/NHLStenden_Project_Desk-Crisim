<?php

namespace App\Form;

use App\Entity\Scenario;
use Doctrine\DBAL\Types\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScenarioType extends AbstractType
{
    public function buildForm( FormBuilderInterface $builder, array $options )
    {
        $builder
            ->add( 'userId' )
            ->add( 'name', TextType::class, [
                    'attr' => [
                        'placeholder' => 'game.scenario.upload.form.scenario-name',
                        'class' => 'input-field',
                    ],
                    'required' => true,
                    'help' => '',
                    'label' => 'game.scenario.upload.form.name',
                ]
            )->add( 'description', TextareaType::class, [
                    'attr' => [
                        'placeholder' => 'game.scenario.upload.form.scenario-name',
                        'class' => 'input-field',
                    ],
                    'required' => true,
                    'help' => '',
                    'label' => 'game.scenario.upload.form.name',
                ]
            )->add( 'genericFile', VichFileType::class, [
                'required' => true,
                'allow_delete' => true,
                'download_uri' => true,
                'download_label' => true,
            ] )
            ->add( 'fileName' )
            ->add( 'fileSize' )
            ->add( 'updatedAt' )
            ->add( 'submit', SubmitType::class, [
                'attr' => [
                    'class' => '',
                ],
            ] );
    }

    public function configureOptions( OptionsResolver $resolver )
    {
        $resolver->setDefaults( [
            'data_class' => Scenario::class,
        ] );
    }
}
