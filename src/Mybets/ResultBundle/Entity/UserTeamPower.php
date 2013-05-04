<?php

namespace Mybets\ResultBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Mybets\ResultBundle\Entity\UserTeamPower
 *
 * @ORM\Table(name="user_team_power")
 * @ORM\Entity(repositoryClass="Mybets\ResultBundle\Entity\UserTeamPowerRepository")
 *
 */
class UserTeamPower
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
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $power_value;

    /**
     * @ORM\ManyToOne(targetEntity="UserTeam", inversedBy="user_team_powers")
     * @ORM\JoinColumn(name="user_team_id", referencedColumnName="id", nullable=true)
     */
    protected $user_team;

    /**
     * @ORM\ManyToOne(targetEntity="PowerType", inversedBy="user_team_powers")
     * @ORM\JoinColumn(name="power_type_id", referencedColumnName="id", nullable=true)
     */
    protected $power_type;

    /**
     * @var datetime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    protected $created;

    /**
     * @var datetime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    protected $updated;



    public function __construct()
    {
    }


    public function __toString()
    {
        if($this->getName() !== null) return $this->getName();
        else return "";
    }
 
    

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
     * Set power_value
     *
     * @param integer $powerValue
     * @return UserTeamPower
     */
    public function setPowerValue($powerValue)
    {
        $this->power_value = $powerValue;
    
        return $this;
    }

    /**
     * Get power_value
     *
     * @return integer 
     */
    public function getPowerValue()
    {
        return $this->power_value;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return UserTeamPower
     */
    public function setCreated($created)
    {
        $this->created = $created;
    
        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return UserTeamPower
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    
        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set user_team
     *
     * @param \Mybets\ResultBundle\Entity\UserTeam $userTeam
     * @return UserTeamPower
     */
    public function setUserTeam(\Mybets\ResultBundle\Entity\UserTeam $userTeam = null)
    {
        $this->user_team = $userTeam;
    
        return $this;
    }

    /**
     * Get user_team
     *
     * @return \Mybets\ResultBundle\Entity\UserTeam 
     */
    public function getUserTeam()
    {
        return $this->user_team;
    }

    /**
     * Set power_type
     *
     * @param \Mybets\ResultBundle\Entity\PowerType $powerType
     * @return UserTeamPower
     */
    public function setPowerType(\Mybets\ResultBundle\Entity\PowerType $powerType = null)
    {
        $this->power_type = $powerType;
    
        return $this;
    }

    /**
     * Get power_type
     *
     * @return \Mybets\ResultBundle\Entity\PowerType 
     */
    public function getPowerType()
    {
        return $this->power_type;
    }
}