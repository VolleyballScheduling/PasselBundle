VolleyballPasselBundle
================
Leader Controller
===================
Routes
-----
name | path | parameters | template
===|===|===|===
volleyball_leader_index | /passels/leaders | | VolleyballResourceBundle:Leader:index.html.twig
volleyball_leader_show | /passels/leaders/{slug} | $slug | VolleyballResourceBundle:Leader:show.html.twig
volleyball_leader_new | /passels/leaders/add | | VolleyballResourceBundle:Leader:new.html.twig
volleyball_leader_search | /passels/leaders/search | | VolleyballResourceBundle:Leader:search.html.twig
volleyball_leader_search_q | /passels/leaders/search/{query} | $query | VolleyballResourceBundle:Leader:search.html.twig
volleyball_leader_edit | /passels/leaders/{slug}/edit | $slug | VolleyballResourceBundle:Leader:new.html.twig
volleyball_leader_remove | /passels/leaders/{slug}/remove | $slug | VolleyballResourceBundle:Leader:remove.html.twig
volleyball_leader_remove_confirm | /passels/leaders/{slug}/remove/confirmed | $slug | VolleyballResourceBundle:Leader:remove.html.twig

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
        - ArrayCollection leaders 
        - Pagerfanta\Pagerfanta pager

###showAction
- Parameters
    - Symfony\Component\HttpFoundation\Request $request
- Return
    - array 
        - Volleyball\Bundle\PasselBundle\Entity\Leader leader

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