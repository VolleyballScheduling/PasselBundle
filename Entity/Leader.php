<?php
namespace Volleyball\Bundle\PasselBundle\Entity;

class Leader extends \Volleyball\Bundle\UserBundle\Entity\User
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * To string
     * @return string
     */
    public function __toString()
    {
        return $this->firstName.' '.$this->lastName;
    }
}
