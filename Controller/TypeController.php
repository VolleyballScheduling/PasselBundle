<?php
namespace Volleyball\Bundle\PasselBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use \Symfony\Component\HttpFoundation\Request;

use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\Exception\NotValidCurrentPageException;
use Pagerfanta\View\TwitterBootstrapView;

class TypeController extends \Volleyball\Bundle\UtilityBundle\Controller\UtilityController
{
    /**
     * @Route("/", name="volleyball_passel_type_index")
     * @Template("VolleyballPasselBundle:Type:index.html.twig")
     */
    public function indexAction(Request $request)
    {
        $query = $this->get('doctrine')
            ->getRepository('VolleyballPasselBundle:Type')
            ->findAll();

        $pager = new Pagerfanta(new DoctrineORMAdapter($query));
        $pager->setMaxPerPage($this->getRequest()->get('pageMax', 5));
        $pager->setCurrentPage($this->getRequest()->get('page', 1));

        return array(
          'types' => $pager->getCurrentPageResults(),
          'pager'  => $pager
        );
    }

    /**
     * @Route("/new", name="volleyball_passel_type_new")
     * @Template("VolleyballPasselbundle:Type:new.html.twig")
     */
    public function newAction(Request $request)
    {
        $type = new \Volleyball\Bundle\PasselBundle\Entity\Type();
        $form = $this->createForm(
            new \Volleyball\Bundle\PasselBundle\Form\Type\TypeFormType(),
            $type
        );

        if ("POST" == $request->getMethod()) {
            $form->handleRequest($this->getRequest());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($type);
                $em->flush();

                $this->get('session')->getFlashBag()->add(
                    'success',
                    'passel type created.'
                );

                return $this->render(
                    'VolleyballPasselbundle:Type:show.html.twig',
                    array('type' => $type)
                );
            }
        }

        return array('form' => $form->createView());
    }
    
    /**
     * @Route("/search", name="volleyball_passel_type_search")
     * @Template("VolleyballPasselBundle:Type:search.html.twig")
     */
    public function searchAction(Request $request)
    {
        $form = $this->createForm(new \Volleyball\Bundle\PasselBundle\Form\Type\Search\TypeSearchFormType());
        
        if ("POST" == $request->getMethod()) {
            $form->handleRequest($this->getRequest());
            if ($form->isValid()) {
                /** @TODO finish type search, also restrict access */
                $types = array();

                return $this->render(
                    'VolleyballPasselbundle:Type:index.html.twig',
                    array('types' => $types )
                );
            }
        }

        return array('form' => $form->createView());
    }
    
    /**
     * @Route("/{slug}", name="volleyball_passel_type_show")
     * @Template("VolleyballPasselBundle:Type:show.html.twig")
     */
    public function showAction(Request $request)
    {
        $slug = $request->getParameter('slug');
        $type = $this->getDoctrine()
            ->getRepository('VolleyballPasselbundle:Type')
            ->findOneBySlug($slug);

        if (!$type) {
            $this->get('session')->getFlashBag()->add(
                'error',
                'no matching type found.'
            );
            $this->redirect($this->generateUrl('volleyball_passel_type_index'));
        }

        return array('type' => $type);
    }
}
