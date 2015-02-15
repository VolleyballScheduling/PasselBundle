<?php
namespace Volleyball\Bundle\PasselBundle\Entity;

use \Volleyball\Bundle\PasselBundle\Traits\HasAttendeesTrait;
use \Volleyball\Bundle\UtilityBundle\Traits\SluggableTrait;
use \Volleyball\Bundle\UtilityBundle\Traits\TimestampableTrait;

class Faction
{
    use HasAttendeesTrait;
    use SluggableTrait;
    use TimestampableTrait;

    /**
     * Id
     * @var integer
     */
    protected $id;
    
    /**
     * Name
     * @var string
     */
    protected $name;
    
    /**
     * Avatar
     * @var string
     */
    protected $avatar;
    
    /**
     * Passel
     * @var \Volleyball\Bundle\PasselBundle\Entity\Passel
     */
    protected $passel;

    /**
     * Get id
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get name
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     * @param string $name
     * @return \Volleyball\Bundle\PasselBundle\Entity\Faction
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get avatar
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * Set avatar
     * @param string $avatar
     * @return \Volleyball\Bundle\PasselBundle\Entity\Faction
     */
    public function setAvatar($avatar = '')
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get passel
     * @return type
     */
    public function getPassel()
    {
        return $this->passel;
    }

    /**
     * Set passel
     * @param \Volleyball\Bundle\PasselBundle\Entity\Passel $passel
     * @return \Volleyball\Bundle\PasselBundle\Entity\Faction
     */
    public function setPassel(\Volleyball\Bundle\PasselBundle\Entity\Passel $passel)
    {
        $this->passel = $passel;

        return $this;
    }
    
    /**
     * To string
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
