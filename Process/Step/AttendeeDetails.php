<?php
namespace Volleyball\Bundle\PasselBundle\Process\Step;

use \Volleyball\Bundle\PasselBundle\Form\Type\Step\AttendeeDetailsFormType;

class AttendeeDetailsStep extends \Sylius\Bundle\FlowBundle\Process\Step\ControllerStep
{
    /**
     * {@inheritdoc}
     */
    public function displayAction(\Sylius\Bundle\FlowBundle\Process\Context\ProcessContextInterface $context)
    {
        $form = new AttendeeDetailsFormType();
        
        return $this->render(
            'VolleyballResourceBundle:Form/Step:attendee_details.html.twig',
            array(
                'form' => $form->createView(),
                'context' => $context
            )
        );
    }

    /**
     * {@inheritdoc}
     */
    public function forwardAction(\Sylius\Bundle\FlowBundle\Process\Context\ProcessContextInterface $context)
    {
        $request = $context->getRequest();
        $form = new AttendeeDetailsFormType();
        
        if ($form->handleRequest($request)-isValid()) {
            $this->complete();
        }
        
        return $this->render(
            'VolleyballResourceBundle:Form/Step:attendee_details.html.twig',
            array(
                'form' => $form->createView(),
                'context' => $context
            )
        );
    }
}
