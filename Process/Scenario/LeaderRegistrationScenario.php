<?php
namespace Volleyball\Bundle\PasselBundle\Process\Scenario;

use \Volleyball\Bundle\UserBundle\Process\Step;

class LeaderRegistrationScenario extends \Volleyball\Bundle\UserBundle\Process\Scenario\RegistrationScenario
{
    public function build(\Sylius\Bundle\FlowBundle\Process\Builder\ProcessBuilderInterface $builder)
    {
        $builder
            ->add('passel info', new Step\PasselInfoStep())
            ->add('attendee details', new Step\AttendeeDetailsStep());
    }
}
