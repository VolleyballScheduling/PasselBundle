Installation
============

Step 1: Download the Bundle
---------------------------

<<<<<<< HEAD
##Documentation
- [Passel](Resources/doc/passel.md)
- [Passel Type](Resources/doc/type.md)
- [Faction](Resources/doc/faction.md)
- [Leader](Resources/doc/leader.md)
- [Leader Position](Resources/doc/position.md)

##Overview
###Controllers
- PasselController
- PasselTypeController
- FactionController
- LeaderController
- PositionController


###Entities
- Passel
- Passel Type
- Faction
- Leader
- Position

###Form Types
- PasselFormType
- PasselSearchFormType
- PasselTypeFormType
- PasselTypeSearchFormType
- FactionFormType
- FactionSearchFormType
- LeaderFormType
- LeaderSearchFormType
- PositionFormType
- PositionSearchFormType

###Repositories
- PasselRepository
- PasselTypeRepository
- FactionRepository
- LeaderRepository
- PositionRepository

###Routes
Route Name | Route Path
---|---
volleyball_passel_index | passels.%domain%
volleyball_passel_show | passels.%domain%/{slug}
volleyball_passel_new | passels.%domain%/new
volleyball_passel_type_index | passels.%domain%/types
volleyball_passel_type_show | passels.%domain%/types/{slug}
volleyball_passel_type_new | passels.%domain%/types/new
volleyball_faction_index | factions.%domain%
volleyball_faction_show | factions.%domain%/{slug}
volleyball_faction_new | factions.%domain%/new
volleyball_leader_index | leaders.%domain%
volleyball_leader_show | leaders.%domain%/{slug}
volleyball_leader_new | leaders.%domain%/new
volleyball_leader_position_index | leaders.%domain/positions
volleyball_leader_position_show | leaders.%domain/positions/{slug}
volleyball_leader_position_new | leaders.%domain/positions/new
=======
Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```bash
$ composer require VolleyballScheduling/PasselBundle "~1"
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding the following line in the `app/AppKernel.php`
file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...

            new \Volleyball\Bundle\PasselBundle\VolleyballPasselBundle(),
        );

        // ...
    }

    // ...
}
```
>>>>>>> ff2f37d31572826bdc2e2ac573211f03ff1fc602
