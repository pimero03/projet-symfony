<?php

namespace App\Form;

use App\Entity\Recette;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RecetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('preparation_time', ChoiceType::class, [
                'choices'  => [
                    '5-10min' => '5-10min', 
                    '10-20min' => '10-20min', 
                    '20-30min' => '20-30min', 
                    '30min-1h' => '30min-1h', 
                    '1-2h' => '1-2h', 
                    '2-3h' => '2-3h', 
                    'plus' => 'plus'
                ],
            ])
            ->add('cuisson_time', ChoiceType::class, [
                'choices'  => [
                    '5-10min' => '5-10min', 
                    '10-20min' => '10-20min', 
                    '20-30min' => '20-30min', 
                    '30min-1h' => '30min-1h', 
                    '1-2h' => '1-2h', 
                    '2-3h' => '2-3h', 
                    'plus' => 'plus'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recette::class,
        ]);
    }
}
