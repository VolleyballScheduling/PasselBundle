<?php
namespace Volleyball\Bundle\PasselBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

use Volleyball\Bundle\PasselBundle\Traits\HasAttendeesTrait;
use Volleyball\Bundle\UtilityBundle\Traits\SluggableTrait;
use Volleyball\Bundle\UtilityBundle\Traits\TimestampableTrait;

/**
 * @ORM\Table(name="passel_type")
 * @ORM\Entity(repositoryClass="Volleyball\Bundle\PasselBundle\Repository\TypeRepository")
 */
class Type extends \Volleyball\Component\Passel\Model\Type
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
    protected $name = '';
    
    /**
     * Description
     * @var string
     */
    protected $description = '';
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\OrganizationBundle\Entity\Organization", inversedBy="passel_type")
     * @ORM\JoinColumn(name="organization_id", referencedColumnName="id")
     */
    protected $organization = '';
    
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
        return $this->organizations[$organization];
    }

    /**
     * @{inheritdocs}
     */
    public function addOrganization(\Volleyball\Component\Organization\Model\Organization $organization)
    {
        $this->organizations[$organization] = $organization;

        return $this;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->attendees = new ArrayCollection();
    }
}
