<?php
namespace Volleyball\Bundle\PasselBundle\Controller;

use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use \Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use \Symfony\Component\HttpFoundation\Request;

use \Pagerfanta\Pagerfanta;
use \Pagerfanta\Adapter\DoctrineORMAdapter;
use \Pagerfanta\Exception\NotValidCurrentPageException;
use \Pagerfanta\View\TwitterBootstrapView;

class PasselTypeController extends \Volleyball\Bundle\UtilityBundle\Controller\UtilityController
{
    /**
     * @Route("/", name="volleyball_passel_type_index")
     * @Template("VolleyballPasselBundle:PasselType:index.html.twig")
     */
    public function indexAction(Request $request)
    {
        $query = $this->get('doctrine')
            ->getRepository('VolleyballPasselBundle:PasselType');

        if (!$this->getRequest()->get('slug', false)) {
            $query->findAll();
        } else {
            $query->andWhere()
        }

        $pager = new Pagerfanta(new DoctrineORMAdapter($query));
        $pager->setMaxPerPage($this->getRequest()->get('pageMax', 5));
        $pager->setCurrentPage($this->getRequest()->get('page', 1));

        return array(
          'passel_types' => $pager->getCurrentPageResults(),
          'pager'  => $pager
        );
    }

    /**
     * @Route("/new", name="volleyball_passel_type_new")
     * @Template("VolleyballPasselBundle:PasselType:new.html.twig")
     */
    public function newAction(Request $request)
    {
        $passel_type = new \Volleyball\Bundle\PasselBundle\Entity\PasselType();
        $form = $this->createForm(
            new \Volleyball\Bundle\PasselBundle\Form\Type\PasselTypeFormType(),
            $passel_type
        );

        if ("POST" == $request->getMethod()) {
            $form->handleRequest($this->getRequest());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($passel_type);
                $em->flush();

                $this->get('session')->getFlashBag()->add(
                    'success',
                    'passel type created.'
                );

                return $this->render(
                    'VolleyballPasselBundle:PasselType:show.html.twig',
                    array('passel_type' => $passel_type)
                );
            }
        }

        return array('form' => $form->createView());
    }
    
    /**
     * @Route("/search", name="volleyball_passel_type_search")
     * @Template("VolleyballPasselBundle:PasselType:search.html.twig")
     */
    public function searchAction(Request $request)
    {
        $form = $this->createForm(new \Volleyball\Bundle\PasselBundle\Form\Type\Search\PasselTypeSearchFormType());
        
        if ("POST" == $request->getMethod()) {
            $form->handleRequest($this->getRequest());
            if ($form->isValid()) {
                /** @TODO finish passel_type search, also restrict access */
                $passel_types = array();

                return $this->render(
                    'VolleyballPasselBundle:PasselType:index.html.twig',
                    array('passel_types' => $passel_types )
                );
            }
        }

        return array('form' => $form->createView());
    }
    
    /**
     * @Route("/{slug}", name="volleyball_passel_type_show")
     * @Template("VolleyballPasselBundle:PasselType:show.html.twig")
     */
    public function showAction(Request $request)
    {
        $slug = $request->getParameter('slug');
        $passel_type = $this->getDoctrine()
            ->getRepository('VolleyballPasselBundle:PasselType')
            ->findOneBySlug($slug);

        if (!$passel_type) {
            $this->get('session')->getFlashBag()->add(
                'error',
                'no matching passel type found.'
            );
            $this->redirect($this->generateUrl('volleyball_passel_type_index'));
        }

        return array('passel_type' => $passel_type);
    }
}
