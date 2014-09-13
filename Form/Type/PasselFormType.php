<?php
namespace Volleyball\Bundle\PasselBundle\Form\Type;

class PasselFormType extends \Symfony\Component\Form\AbstractType
{
    public function buildForm(
        \Symfony\Component\Form\FormBuilderInterface $builder,
        array $options
    ) {
        $builder->add('name');
        $builder->add('type');
        $builder->add('region');
        $builder->add('leader');
    }

    public function getName()
    {
        return 'passel';
    }
}
