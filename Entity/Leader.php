<?php
namespace Volleyball\Bundle\PasselBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use PUGX\MultiUserBundle\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="passel_leader")
 * @UniqueEntity(fields = "username", targetClass = "Volleyball\Bundle\UserBundle\Entity\User", message="fos_user.username_already")
 * @UniqueEntity(fields = "email", targetClass = "Volleyball\Bundle\UserBundle\Entity\User", message="fos_user.email_already")
 */
class Leader extends \Volleyball\Bundle\UserBundle\Entity\User implements \Volleyball\Component\Passel\Interfaces\LeaderInterface
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

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
     * @ORM\ManyToOne(targetEntity="Volleyball\Bundle\PasselBundle\Entity\Passel", inversedBy="leader")
     * @ORM\JoinColumn(name="passel_id", referencedColumnName="id")
     */
    protected $passel = '';

    /**
     * Admin - if true, user can make limited changes to the passel
     * @var boolean
     */
    protected $admin = false;

    /**
     * Primary
     * @var boolean
     */
    protected $primary = false;
    
    /**
     * @{inheritdocs}
     */
    public function getPassel()
    {
        return $this->passel;
    }

    /**
     * @{inheritdocs}
     */
    public function setPassel(\Volleyball\Bundle\PasselBundle\Entity\Passel $passel)
    {
        $this->passel = $passel;

        return $this;
    }

    /**
     * @{inheritdocs}
     */
    public function isAdmin($admin = null)
    {
        if (null != $admin && is_bool($admin)) {
            $this->admin = $admin;

            return $this;
        }

        return $this->admin;
    }

    /**
     * @{inheritdocs}
     */
    public function isPrimary($primary = null)
    {
        if (null != $primary) {
            $this->primary = $primary;

            return $this;
        }

        return $this->primary;
    }
}
