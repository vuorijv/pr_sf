<?php

namespace Mybets\ResultBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Mybets\ResultBundle\Entity\PowerType
 *
 * @ORM\Table(name="power_type")
 * @ORM\Entity(repositoryClass="Mybets\ResultBundle\Entity\PowerTypeRepository")
 *
 */
class PowerType
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
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $description;

    /**
     * @ORM\ManyToOne(targetEntity="Sport", inversedBy="power_types")
     * @ORM\JoinColumn(name="sport_id", referencedColumnName="id", nullable=true)
     */
    protected $sport;
    
    /**
     * @ORM\OneToMany(targetEntity="UserTeamPower", mappedBy="power_type", cascade={"all"}, orphanRemoval=true)
     */
    protected $user_team_powers;
    

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
        ##$this->tournaments = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return PowerType
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return PowerType
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return PowerType
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
     * @return PowerType
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
     * Set sport
     *
     * @param \Mybets\ResultBundle\Entity\Sport $sport
     * @return PowerType
     */
    public function setSport(\Mybets\ResultBundle\Entity\Sport $sport = null)
    {
        $this->sport = $sport;
    
        return $this;
    }

    /**
     * Get sport
     *
     * @return \Mybets\ResultBundle\Entity\Sport 
     */
    public function getSport()
    {
        return $this->sport;
    }

    /**
     * Add user_team_powers
     *
     * @param \Mybets\ResultBundle\Entity\UserTeamPower $userTeamPowers
     * @return PowerType
     */
    public function addUserTeamPower(\Mybets\ResultBundle\Entity\UserTeamPower $userTeamPowers)
    {
        $this->user_team_powers[] = $userTeamPowers;
    
        return $this;
    }

    /**
     * Remove user_team_powers
     *
     * @param \Mybets\ResultBundle\Entity\UserTeamPower $userTeamPowers
     */
    public function removeUserTeamPower(\Mybets\ResultBundle\Entity\UserTeamPower $userTeamPowers)
    {
        $this->user_team_powers->removeElement($userTeamPowers);
    }

    /**
     * Get user_team_powers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserTeamPowers()
    {
        return $this->user_team_powers;
    }
}