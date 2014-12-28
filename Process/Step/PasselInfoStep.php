<?php
namespace Volleyball\Bundle\PasselBundle\Process\Step;

use \Volleyball\Bundle\PasselBundle\Form\Type\Step\PasselInfoFormType;

class PasselInfoStep extends \Sylius\Bundle\FlowBundle\Process\Step\ControllerStep
{
    /**
     * {@inheritdoc}
     */
    public function displayAction(\Sylius\Bundle\FlowBundle\Process\Context\ProcessContextInterface $context)
    {
        $form = new PasselInfoFormType();
        return $this->render(
            'VolleyballResourceBundle:Form/Step:passel_info.html.twig',
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
        $form = new PasselInfoFormType();
        
        if ($form->handleRequest($request)->isValid()) {
            return $this->complete();
        }
        
        return $this->render(
            'VolleyballResourceBundle:Form/Step:passel_info.html.twig',
            array(
                'form' => $form->createView(),
                'context' => $context
            )
        );
    }
}
