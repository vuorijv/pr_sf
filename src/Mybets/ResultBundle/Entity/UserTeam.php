<?php

namespace Mybets\ResultBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Mybets\ResultBundle\Entity\UserTeam
 *
 * @ORM\Table(name="user_team")
 * @ORM\Entity(repositoryClass="Mybets\ResultBundle\Entity\UserTeamRepository")
 *
 */
class UserTeam
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
     * @ORM\ManyToOne(targetEntity="Team", inversedBy="user_teams")
     * @ORM\JoinColumn(name="team_id", referencedColumnName="id", nullable=true)
     */
    protected $team;

    /**
     * @ORM\ManyToOne(targetEntity="\Mybets\UserBundle\Entity\User", inversedBy="user_teams")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     */
    protected $user;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $notes;

    /**
     * @ORM\ManyToOne(targetEntity="FormIcon", inversedBy="user_teams")
     * @ORM\JoinColumn(name="from_icon_id", referencedColumnName="id", nullable=true)
     */
    protected $form_icon;
    
    /**
     * @ORM\OneToMany(targetEntity="UserTeamPower", mappedBy="user_team", cascade={"all"}, orphanRemoval=true)
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
     * Set notes
     *
     * @param string $notes
     * @return UserTeam
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    
        return $this;
    }

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return UserTeam
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
     * @return UserTeam
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
     * Set team
     *
     * @param \Mybets\ResultBundle\Entity\Team $team
     * @return UserTeam
     */
    public function setTeam(\Mybets\ResultBundle\Entity\Team $team = null)
    {
        $this->team = $team;
    
        return $this;
    }

    /**
     * Get team
     *
     * @return \Mybets\ResultBundle\Entity\Team 
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Set user
     *
     * @param \Mybets\UserBundle\Entity\User $user
     * @return UserTeam
     */
    public function setUser(\Mybets\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Mybets\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set form_icon
     *
     * @param \Mybets\ResultBundle\Entity\FormIcon $formIcon
     * @return UserTeam
     */
    public function setFormIcon(\Mybets\ResultBundle\Entity\FormIcon $formIcon = null)
    {
        $this->form_icon = $formIcon;
    
        return $this;
    }

    /**
     * Get form_icon
     *
     * @return \Mybets\ResultBundle\Entity\FormIcon 
     */
    public function getFormIcon()
    {
        return $this->form_icon;
    }

    /**
     * Add user_team_powers
     *
     * @param \Mybets\ResultBundle\Entity\UserTeamPower $userTeamPowers
     * @return UserTeam
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