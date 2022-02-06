<?php

namespace App\Form;

use App\Entity\Band;
use App\Entity\Concert;
use App\Entity\ConcertRoom;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ConcertType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameConcert', TextType::class, ['label' => 'Nom du concert'])
            ->add('date', DateType::class, ['widget' => 'choice', 'format' => 'dd / MM / yyyy'])
            ->add('hourEnd', TimeType::class, ['widget'=>'choice'])
            ->add('hourBeginning', TimeType::class, ['widget'=>'choice'])
            ->add('bands', EntityType::class, [
                'class' => Band::class,
                'multiple' => true,
                'choice_label' => 'nameBand'
            ])
            ->add('concertRoom', EntityType::class, [
                'class' => ConcertRoom::class,
                'choice_label' => 'nameConcertRoom'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Concert::class,
        ]);
    }
}
