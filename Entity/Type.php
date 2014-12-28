<?php
namespace Volleyball\Bundle\PasselBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;
use \Gedmo\Mapping\Annotation as Gedmo;
use \Symfony\Component\Validator\Constraints as Assert;
use \Doctrine\Common\Collections\ArrayCollection;

use \Volleyball\Bundle\PasselBundle\Traits\HasAttendeesTrait;
use \Volleyball\Bundle\UtilityBundle\Traits\SluggableTrait;
use \Volleyball\Bundle\UtilityBundle\Traits\TimestampableTrait;

/**
 * @ORM\Table(name="passel_type")
 * @ORM\Entity(repositoryClass="Volleyball\Bundle\PasselBundle\Repository\TypeRepository")
 */
class Type
{
    use HasAttendeesTrait;
    use SluggableTrait;
    use TimestampableTrait;
    
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * Name
     * @var  string name
     * @ORM\Column(name="name", type="string")
     */
    protected $name;
    
    /**
     * Description
     * @var string
     */
    protected $description;
    
    /**
     * @ORM\ManyToMany(targetEntity="Volleyball\Bundle\OrganizationBundle\Entity\Organization", inversedBy="types")
     * @ORM\JoinTable(name="passel_types_organizations")
     */
    protected $organizations;
    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @{inheritdocs}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @{inheritdocs}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @{inheritdocs}
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function getOrganization($organization)
    {
        return $this->organizations->get($organization);
    }
    
    /**
     * @{inheritdocs}
     */
    public function getOrganizations()
    {
        return $this->organizations;
    }
    
    public function setOrganizations(array $organizations)
    {
        if (!$organizations instanceof ArrayCollection) {
            $organizations = new ArrayCollection($organizations);
        }
        
        $this->organizations = $organizations;
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
