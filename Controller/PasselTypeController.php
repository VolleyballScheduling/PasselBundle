<?php
namespace Volleyball\Bundle\PasselBundle\Controller;

class PasselTypeController extends \Volleyball\Bundle\UtilityBundle\Controller\Controller
{
    /**
     * Index action
     * @inheritdoc
     */
    public function indexAction(array $passel_types)
    {
        return ['passel_types' => $this->getPasselTypes()];
    }

    /**
     * New action
     * @inheritdoc
     */
    public function newAction()
    {
        $passel_type = new \Volleyball\Bundle\PasselBundle\Entity\PasselType();
        $form = $this->createBoundObjectForm($passel_type, 'new');

        if ($form->isBound() && $form->isValid()) {
            $this->persist($passel_type, true);
            $this->addFlash('passel type created');

            return $this->redirectToRoute('volleyball_passel_types_index');
        }

        return ['form' => $form->createView()];
    }
    
    /**
     * Search action
     * @inheritdoc
     */
    public function searchAction(array $passel_types)
    {
        $passel_type = new \Volleyball\Bundle\PasselBundle\Entity\PasselType();
        $form = $this->createBoundObjectForm($passel_type, 'search');
        
        if ($form->isBound() && $form->isValid()) {
            /** @TODO finish passel type search, also restrict access */
            $passel_types = array();

            return ['passel_types' => $passel_types];
        }

        return ['form' => $form->createView()];
    }
    
    /**
     * Show action
     * @inheritdoc
     */
    public function showAction(\Volleyball\Bundle\PasselBundle\Entity\PasselType $passel_type)
    {
        return ['passel_type' => $passel_type];
    }


}
