<?php

namespace Mybets\ResultBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Mybets\ResultBundle\Entity\Tournament
 *
 * @ORM\Table(name="tournament")
 * @ORM\Entity(repositoryClass="Mybets\ResultBundle\Entity\TournamentRepository")
 *
 */
class Tournament
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
     * @ORM\ManyToOne(targetEntity="League", inversedBy="tournaments")
     * @ORM\JoinColumn(name="league_id", referencedColumnName="id", nullable=true)
     */
    protected $league;

    /**
    * @ORM\OneToMany(targetEntity="Team", mappedBy="tournament", cascade={"all"}, orphanRemoval=true)
    */
    protected $teams;

	/**
    * @ORM\OneToMany(targetEntity="Match", mappedBy="tournament", cascade={"all"}, orphanRemoval=true)
    */
    protected $matches;

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
     */
    public function setName($name)
    {
        $this->name = $name;
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
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set created
     *
     * @param datetime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * Get created
     *
     * @return datetime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param datetime $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * Get updated
     *
     * @return datetime
     */
    public function getUpdated()
    {
        return $this->updated;
    }


    /**
     * Get league
     *
     * @return Mybets\ResultBundle\Entity\League
     */
    public function getLeague()
    {
        return $this->league;
    }

    /**
     * Set league
     *
     * @param Mybets\ResultBundle\Entity\League $league
     */
    public function setLeague($league)
    {
        $this->league = $league;
    }

    /**
     * Add teams
     *
     * @param \Mybets\ResultBundle\Entity\Team $teams
     * @return Tournament
     */
    public function addTeam(\Mybets\ResultBundle\Entity\Team $teams)
    {
        $this->teams[] = $teams;
    
        return $this;
    }

    /**
     * Remove teams
     *
     * @param \Mybets\ResultBundle\Entity\Team $teams
     */
    public function removeTeam(\Mybets\ResultBundle\Entity\Team $teams)
    {
        $this->teams->removeElement($teams);
    }

    /**
     * Get teams
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTeams()
    {
        return $this->teams;
    }

    /**
     * Add matches
     *
     * @param \Mybets\ResultBundle\Entity\Match $matches
     * @return Tournament
     */
    public function addMatche(\Mybets\ResultBundle\Entity\Match $matches)
    {
        $this->matches[] = $matches;
    
        return $this;
    }

    /**
     * Remove matches
     *
     * @param \Mybets\ResultBundle\Entity\Match $matches
     */
    public function removeMatche(\Mybets\ResultBundle\Entity\Match $matches)
    {
        $this->matches->removeElement($matches);
    }

    /**
     * Get matches
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMatches()
    {
        return $this->matches;
    }
}