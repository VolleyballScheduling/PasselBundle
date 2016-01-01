<?php
namespace Volleyball\Bundle\PasselBundle\Controller;

class PositionController extends \Volleyball\Bundle\UtilityBundle\Controller\Controller
{
    /**
     * Index action
     * @inheritdoc
     */
    public function indexAction(array $positions)
    {
        return ['positions' => $this->getPositions()];
    }

    /**
     * New action
     * @inheritdoc
     */
    public function newAction()
    {
        $position = new \Volleyball\Bundle\PasselBundle\Entity\Position();
        $form = $this->createBoundObjectForm($position, 'new');

        if ($form->isBound() && $form->isValid()) {
            $this->persist($position, true);
            $this->addFlash('position created');

            return $this->redirectToRoute('volleyball_positions_index');
        }

        return ['form' => $form->createView()];
    }
    
    /**
     * Search action
     * @inheritdoc
     */
    public function searchAction(array $positions)
    {
        $position = new \Volleyball\Bundle\PasselBundle\Entity\Position();
        $form = $this->createBoundObjectForm($position, 'search');
        
        if ($form->isBound() && $form->isValid()) {
            /** @TODO finish position search, also restrict access */
            $positions = array();

            return ['positions' => $positions];
        }

        return ['form' => $form->createView()];
    }
    
    /**
     * Show action
     * @inheritdoc
     */
    public function showAction(\Volleyball\Bundle\PasselBundle\Entity\Position $position)
    {
        return ['position' => $position];
    }


}
