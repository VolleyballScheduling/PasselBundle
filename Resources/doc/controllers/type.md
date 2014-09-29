VolleyballPasselBundle
================
Type Controller
===================
Routes
-----
name | path | parameters | template
===|===|===|===
volleyball_passel_type_index | /passels/types | | VolleyballResourceBundle:Type:index.html.twig
volleyball_passel_type_show | /passels/types/{slug} | $slug | VolleyballResourceBundle:Type:show.html.twig
volleyball_passel_type_new | /passels/types/add | | VolleyballResourceBundle:Type:new.html.twig
volleyball_passel_type_search | /passels/types/search | | VolleyballResourceBundle:Type:search.html.twig
volleyball_passel_type_search_q | /passels/types/search/{query} | $query | VolleyballResourceBundle:Type:search.html.twig
volleyball_passel_type_edit | /passels/types/{slug}/edit | $slug | VolleyballResourceBundle:Type:new.html.twig
volleyball_passel_type_remove | /passels/types/{slug}/remove | $slug | VolleyballResourceBundle:Type:remove.html.twig
volleyball_passel_type_remove_confirm | /passels/types/{slug}/remove/confirmed | $slug | VolleyballResourceBundle:Type:remove.html.twig

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
        - ArrayCollection types 
        - Pagerfanta\Pagerfanta pager

###showAction
- Parameters
    - Symfony\Component\HttpFoundation\Request $request
- Return
    - array 
        - Volleyball\Bundle\PasselBundle\Entity\Type type

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