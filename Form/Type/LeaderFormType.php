<?php
namespace Volleyball\Bundle\PasselBundle\Form\Type;

class LeaderFormType extends \Symfony\Component\Form\AbstractType
{
    public function buildForm(
        \Symfony\Component\Form\FormBuilderInterface $builder,
        array $options
    ) {
        $builder->add('first_name');
        $builder->add('last_name');
        $builder->add('birthdate', 'birthday');
        $builder->add('passel');
    }

    public function getName()
    {
        return 'leader';
    }
}
