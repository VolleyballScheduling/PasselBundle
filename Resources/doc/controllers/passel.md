VolleyballPasselBundle
================
Passel Controller
===================
Routes
-----
name | path | parameters | template
===|===|===|===
volleyball_passel_index | /passels | | VolleyballResourceBundle:Passel:index.html.twig
volleyball_passel_show | /passels/{slug} | $slug | VolleyballResourceBundle:Passel:show.html.twig
volleyball_passel_new | /passels/add | | VolleyballResourceBundle:Passel:new.html.twig
volleyball_passel_search | /passels/search | | VolleyballResourceBundle:Passel:search.html.twig
volleyball_passel_search_q | /passels/search/{query} | $query | VolleyballResourceBundle:Passel:search.html.twig
volleyball_passel_edit | /passels/{slug}/edit | $slug | VolleyballResourceBundle:Passel:new.html.twig
volleyball_passel_remove | /passels/{slug}/remove | $slug | VolleyballResourceBundle:Passel:remove.html.twig
volleyball_passel_remove_confirm | /passels/{slug}/remove/confirmed | $slug | VolleyballResourceBundle:Passel:remove.html.twig

Methods
-----
- indexAction
- showAction
- newAction
- searchAction

##Methods

###indexAction
- Parameters
    - \Symfony\Component\HttpFoundation\Request $request
- Return:
    - array
        - ArrayCollection passels 
        - Pagerfanta\Pagerfanta pager

###showAction
- Parameters
    - Symfony\Component\HttpFoundation\Request $request
- Return
    - array 
        - Volleyball\Bundle\PasselBundle\Entity\Passel passel

###newAction
- Parameters
    - Symfony\Component\HttpFoundation\Request $request
- Return
    - array
        - form

###searchAction
Parameters
- Symfony\Component\HttpFoundation\Request $request
Return
- array
    - form