<?php
namespace Volleyball\Bundle\PasselBundle\Form\Type;

class PositionFormType extends \Symfony\Component\Form\AbstractType
{
    public function buildForm(
        \Symfony\Component\Form\FormBuilderInterface $builder,
        array $options
    ) {
        $builder->add('name');
        $builder->add('description');
        $builder->add('parent');
    }

    public function getName()
    {
        return 'leader_position';
    }
}
