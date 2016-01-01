<?php
namespace Volleyball\Bundle\PasselBundle\Controller;

class PasselController extends \Volleyball\Bundle\UtilityBundle\Controller\Controller
{
    /**
     * Index action
     * @inheritdoc
     */
    public function indexAction(array $passels)
    {
        return ['passels' => $this->getPassels()];
    }

    /**
     * New action
     * @inheritdoc
     */
    public function newAction()
    {
        $passel = new \Volleyball\Bundle\PasselBundle\Entity\Passel();
        $form = $this->createBoundObjectForm($passel, 'new');

        if ($form->isBound() && $form->isValid()) {
            $this->persist($passel, true);
            $this->addFlash('passel created');

            return $this->redirectToRoute('volleyball_passels_index');
        }

        return ['form' => $form->createView()];
    }
    
    /**
     * Search action
     * @inheritdoc
     */
    public function searchAction(array $passels)
    {
        $passel = new \Volleyball\Bundle\PasselBundle\Entity\Passel();
        $form = $this->createBoundObjectForm($passel, 'search');
        
        if ($form->isBound() && $form->isValid()) {
            /** @TODO finish passel search, also restrict access */
            $passels = array();

            return ['passels' => $passels];
        }

        return ['form' => $form->createView()];
    }
    
    /**
     * Show action
     * @inheritdoc
     */
    public function showAction(\Volleyball\Bundle\PasselBundle\Entity\Passel $passel)
    {
        return ['passel' => $passel];
    }


}
