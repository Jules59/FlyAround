<?php
/**
 * Created by PhpStorm.
 * User: julien
 * Date: 21/05/18
 * Time: 15:39
 */

namespace AppBundle\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstName')
            ->add('lastName')
            ->add('phoneNumber')
            ->add('birthDate', BirthdayType::class)
            ->add('isACertifiedPilot', ChoiceType::class, array(
                'choices' => array(
                    'Yes' => true,
                    'No' => false,
                ),
            ));
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}