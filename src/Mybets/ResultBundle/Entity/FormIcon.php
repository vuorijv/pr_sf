<?php

namespace Mybets\ResultBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Mybets\ResultBundle\Entity\FormIcon
 *
 * @ORM\Table(name="form_icon")
 * @ORM\Entity(repositoryClass="Mybets\ResultBundle\Entity\FormIconRepository")
 *
 */
class FormIcon
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $city;

    /**
     * @ORM\OneToMany(targetEntity="UserTeam", mappedBy="form_icon", cascade={"all"}, orphanRemoval=true)
     */
    protected $user_teams;

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
        $this->leagues = new ArrayCollection();
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
     * @return FormIcon
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
     * Set city
     *
     * @param string $city
     * @return FormIcon
     */
    public function setCity($city)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return FormIcon
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
     * @return FormIcon
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
     * Add user_teams
     *
     * @param \Mybets\ResultBundle\Entity\UserTeam $userTeams
     * @return FormIcon
     */
    public function addUserTeam(\Mybets\ResultBundle\Entity\UserTeam $userTeams)
    {
        $this->user_teams[] = $userTeams;
    
        return $this;
    }

    /**
     * Remove user_teams
     *
     * @param \Mybets\ResultBundle\Entity\UserTeam $userTeams
     */
    public function removeUserTeam(\Mybets\ResultBundle\Entity\UserTeam $userTeams)
    {
        $this->user_teams->removeElement($userTeams);
    }

    /**
     * Get user_teams
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserTeams()
    {
        return $this->user_teams;
    }
}