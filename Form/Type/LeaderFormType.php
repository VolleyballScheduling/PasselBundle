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
        /**
         * @todo migrate to confiog file params and not hardcoded.
         */
        $minYr = date('Y') - 18;
        $maxYr = date('Y') - 10;
        $years = array();

        for ($x=$maxYr; $x >= $minYr; $x--) {
            $years[] = $x;
        }

        $builder->add(
            'birthdate',
            'birthday',
            array(
                'years' => $years,
                'format' => 'M/dd/y'
            )
        );
        $builder->add('passel');
        $builder->add('admin');
        $builder->add('primary');
    }

    public function getName()
    {
        return 'leader';
    }
}
