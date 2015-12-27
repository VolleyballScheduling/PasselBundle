<?php
namespace Volleyball\Bundle\PasselBundle\Controller;

use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use \Symfony\Component\HttpFoundation\Request;

use \Pagerfanta\Pagerfanta;
use \Pagerfanta\Adapter\DoctrineORMAdapter;
use \Pagerfanta\Exception\NotValidCurrentPageException;
use \Pagerfanta\View\TwitterBootstrapView;

class PasselController extends \Volleyball\Bundle\UtilityBundle\Controller\Controller
{
    /**
     * Index action
     * @inheritdoc
     */
    public function indexAction(Request $request)
    {
        $this->breadcrumbs->addItem('passels');
        
        $query = $this->get('doctrine')
            ->getRepository('VolleyballPasselBundle:Passel')
            ->findAll();

        $pager = new Pagerfanta(new DoctrineORMAdapter($query));
        $pager->setMaxPerPage($this->getRequest()->get('pageMax', 5));
        $pager->setCurrentPage($this->getRequest()->get('page', 1));

        return array(
          'passels' => $pager->getCurrentPageResults(),
          'pager'  => $pager
        );
    }

    /**
     * New action
     * @inheritdoc
     */
    public function newAction(Request $request)
    {
        $passel = new \Volleyball\Bundle\PasselBundle\Entity\Passel();
        $form = $this->createForm(
            new \Volleyball\Bundle\PasselBundle\Form\Type\PasselFormType(),
            $passel
        );

        if ("POST" == $request->getMethod()) {
            $form->handleRequest($this->getRequest());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($passel);
                $em->flush();

                $this->get('session')->getFlashBag()->add(
                    'success',
                    'passel created.'
                );

                return $this->render(
                    'VolleyballPasselbundle:Passel:show.html.twig',
                    array('passel' => $passel)
                );
            }
        }

        return array('form' => $form->createView());
    }
    
    /**
     * Search action
     * @inheritdoc
     */
    public function searchAction(Request $request)
    {
        $form = $this->createForm(new \Volleyball\Bundle\PasselBundle\Form\Type\PasselSearchFormType());
        
        if ("POST" == $request->getMethod()) {
            $form->handleRequest($this->getRequest());
            if ($form->isValid()) {
                /** @TODO finish passel search, also restrict access */
                $passels = array();

                return $this->render(
                    'VolleyballPasselbundle:Passel:index.html.twig',
                    array('passels' => $passels )
                );
            }
        }

        return array('form' => $form->createView());
    }
    
    /**
     * Show action
     * @inheritdoc
     */
    public function showAction(Request $request)
    {
        $slug = $request->getParameter('slug');
        $passel = $this->getDoctrine()
            ->getRepository('VolleyballPasselbundle:Passel')
            ->findOneBySlug($slug);

        if (!$passel) {
            $this->get('session')->getFlashBag()->add(
                'error',
                'no matching passel found.'
            );
            $this->redirect($this->generateUrl('volleyball_passel_index'));
        }

        return array('passel' => $passel);
    }
}
