<?php
namespace Volleyball\Bundle\PasselBundle\Form\Type;

class LevelFormType extends \Symfony\Component\Form\AbstractType
{
    public function buildForm(
        \Symfony\Component\Form\FormBuilderInterface $builder,
        array $options
    ) {
        $builder->add('name');
        $builder->add('special');
        $builder->add('organization');
    }

    public function getName()
    {
        return 'level';
    }
}
