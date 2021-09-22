<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class AnimalType extends AbstractType {
	public function buildForm(FormBuilderInterface $builder, array $options) {
		$builder
			->add('nom', TextType::class)
			->add('dateNaissance', DateType::class, [
				'widget' => 'single_text',
				'input_format' => 'd/m/Y',
			])
			->add('isSterilise', CheckboxType::class, [
				'label' => 'Stérilisé ?',
				'required' => false
			])
			->add('photo', FileType::class, [
				'required' => false
			])
			->add('submit', SubmitType::class, [
				'label' => 'Envoyer'
			]);
	}
}
