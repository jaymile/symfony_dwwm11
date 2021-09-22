<?php

namespace App\Form;

use App\Entity\Animal;
use App\Entity\Utilisateur;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UtilisateurType extends AbstractType {
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('pseudo')
            ->add('age')
            ->add('animaux', EntityType::class,  [
                'class' => Animal::class,
                'choice_label' => 'nom',
                'multiple' => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
