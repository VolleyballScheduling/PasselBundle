<?php
namespace Volleyball\Bundle\PasselBundle\Form\Type\Step;

class AttendeeDetailsFormType extends \FOS\UserBundle\Form\Type\RegistrationFormType
{
    public function buildForm(\Symfony\Component\Form\Test\FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('level')
            ->add('position');
    }
}
