<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\Schedule;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;

class ScheduleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('startFrom', DateType::class, [
            'required' => false,
            'widget' => 'single_text',
            'html5' => false,
            'format' => 'dd.MM.yyyy HH:mm',
            'constraints' => [
                new NotBlank([
                    'message' => 'Моля, изберете час.'
                ])
            ]
        ]);

        $builder->add('email', EmailType::class, [
            'required' => false,
            'constraints' => [
                new NotBlank([
                    'message' => 'Моля, въведете имейл.'
                ]),
                new Email([
                    'mode' => 'strict',
                    'message' => 'Моля, въведете валиден имейл.'
                ]),
                new Length([
                    'max' => 255,
                    'maxMessage' => 'Моля, въведете правилна дължина за имейл.',
                ])
            ]
        ]);

        $builder->add('name', TextType::class, [
            'required' => false,
            'constraints' => [
                new NotBlank([
                    'message' => 'Моля, въведете име.'
                ]),
                new Length([
                    'max' => 255,
                    'maxMessage' => 'Името е прекалено дълго. Моля, да го редактирате.',
                ])
            ]
        ]);

        $builder->add('phoneNumber', TelType::class, [
            'required' => false,
            'constraints' => [
                new NotBlank([
                    'message' => 'Моля, въведете телефонен номер.'
                ]),
                new Regex([
                    'pattern' => '/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{4,9}$/',
                    'message' => 'Телефонния номер не е валиден.'
                ]),
                new Length([
                    'max' => 255,
                    'maxMessage' => "Дължината на телефонния номер е невалидна."
                ])
            ]
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Schedule::class
        ]);
    }
}