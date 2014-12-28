<?php
namespace Volleyball\Bundle\PasselBundle\Entity;

use \Doctrine\ORM\Mapping as ORM;
use \Gedmo\Mapping\Annotation as Gedmo;
use \Symfony\Component\Validator\Constraints as Assert;

use \Volleyball\Bundle\PasselBundle\Traits\HasAttendeesTrait;
use \Volleyball\Bundle\UtilityBundle\Traits\SluggableTrait;
use \Volleyball\Bundle\UtilityBundle\Traits\TimestampableTrait;

/**
 * @ORM\Entity(repositoryClass="Volleyball\Bundle\PasselBundle\Repository\FactionRepository")
 * @ORM\Table(name="faction")
 */
class Faction
{
    use HasAttendeesTrait;
    use SluggableTrait;
    use TimestampableTrait;

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var  string name
     * @ORM\Column(name="name", type="string")
     */
    protected $name;
    
    /**
     * @var string avatar
     * @ORM\Column(name="avatar", type="text")
     */
    protected $avatar;
    
    /**
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\PasselBundle\Entity\Passel", inversedBy="faction")
     * @ORM\JoinColumn(name="passel_id", referencedColumnName="id")
     */
    protected $passel;

    /**
     * Get id
     * @return integer Id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * {@inheritdoc}
     */
    public function setAvatar($avatar = '')
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getPassel()
    {
        return $this->passel;
    }

    /**
     * {@inheritdoc}
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
