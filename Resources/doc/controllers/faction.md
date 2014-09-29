VolleyballPasselBundle
================
Faction Controller
===================
Routes
-----
name | path | parameters | template
===|===|===|===
volleyball_faction_index | /factions | | VolleyballResourceBundle:Faction:index.html.twig
volleyball_faction_show | /factions/{slug} | $slug | VolleyballResourceBundle:Faction:show.html.twig
volleyball_faction_new | /factions/add | | VolleyballResourceBundle:Faction:new.html.twig
volleyball_faction_search | /factions/search | | VolleyballResourceBundle:Faction:search.html.twig
volleyball_faction_search_q | /factions/search/{query} | $query | VolleyballResourceBundle:Faction:search.html.twig
volleyball_faction_edit | /factions/{slug}/edit | $slug | VolleyballResourceBundle:Faction:new.html.twig
volleyball_faction_remove | /factions/{slug}/remove | $slug | VolleyballResourceBundle:Faction:remove.html.twig
volleyball_faction_remove_confirm | /factions/{slug}/remove/confirmed | $slug | VolleyballResourceBundle:Faction:remove.html.twig

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
        - ArrayCollection factions 
        - Pagerfanta\Pagerfanta pager

###showAction
- Parameters
    - Symfony\Component\HttpFoundation\Request $request
- Return
    - array 
        - Volleyball\Bundle\PasselBundle\Entity\Faction faction

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