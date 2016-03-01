<?php
namespace Volleyball\Bundle\PasselBundle\Entity;

use \Doctrine\Common\Collections\ArrayCollection;

use \Volleyball\Bundle\AttendeeBundle\Traits\HasAttendeesTrait;
use \Volleyball\Bundle\CoreBundle\Traits\SluggableTrait;
use \Volleyball\Bundle\CoreBundle\Traits\TimestampableTrait;

class Type
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
     * Description
     * @var string
     */
    protected $description;
    
    /**
     * Organizations
     * @var \Doctrine\Common\Collections\ArrayCollection
     */
    protected $organizations;
    
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
     * @return \Volleyball\Bundle\PasselBundle\Entity\Type
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get description
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description
     * @param string $description
     * @return \Volleyball\Bundle\PasselBundle\Entity\Type
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get organization
     * @param type $organization
     * @return \Volleyball\Bundle\OrganizationBundle\Entity\Organization
     */
    public function getOrganization($organization)
    {
        return $this->organizations->get($organization);
    }
    
    /**
     * Get organizations
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getOrganizations()
    {
        return $this->organizations;
    }
    
    /**
     * Set organizations
     * @param array $organizations
     * @return \Volleyball\Bundle\PasselBundle\Entity\Type
     */
    public function setOrganizations(array $organizations)
    {
        if (!$organizations instanceof ArrayCollection) {
            $organizations = new ArrayCollection($organizations);
        }
        
        $this->organizations = $organizations;
        
        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function addOrganization(\Volleyball\Bundle\OrganizationBundle\Entity\Organization $organization)
    {
        if (!$this->organizations->contains($organization)) {
            $this->organizations->add($organization);
        }
        
        return $this;
    }
    
    /**
     * Has organization
     * @param mixed $organization
     * @return boolean
     */
    public function hasOrganization($organization)
    {
        return $this->organizations->contains($organization);
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->attendees = new ArrayCollection();
        $this->organizations = new ArrayCollection();
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
