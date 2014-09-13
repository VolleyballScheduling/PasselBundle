<?php
namespace Volleyball\Bundle\PasselBundle\Form\Type;

class FactionFormType extends \Symfony\Component\Form\AbstractType
{
    public function buildForm(
        \Symfony\Component\Form\FormBuilderInterface $builder,
        array $options
    ) {
        $builder->add('name');
        $builder->add('avatar', 'file');
        $builder->add('passel');
    }

    public function getName()
    {
        return 'faction';
    }
}
