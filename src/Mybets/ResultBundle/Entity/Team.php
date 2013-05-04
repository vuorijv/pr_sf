<?php

namespace Mybets\ResultBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Mybets\ResultBundle\Entity\Team
 *
 * @ORM\Table(name="team")
 * @ORM\Entity(repositoryClass="Mybets\ResultBundle\Entity\TeamRepository")
 *
 */
class Team
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
    * @Gedmo\Slug(fields={"name"}, unique=true)
    * @ORM\Column(type="string", length=128, unique=true)
    */
    private $slug;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $description;

    /**
     * @ORM\ManyToOne(targetEntity="Tournament", inversedBy="teams")
     * @ORM\JoinColumn(name="tournament_id", referencedColumnName="id", nullable=true)
     */
    protected $tournament;

    /**
     * @ORM\ManyToOne(targetEntity="Club", inversedBy="teams")
     * @ORM\JoinColumn(name="club_id", referencedColumnName="id", nullable=true)
     */
    protected $club;
    
    /**
     * @ORM\OneToMany(targetEntity="Match", mappedBy="team_home", cascade={"all"}, orphanRemoval=true)
     */
    protected $matches_home;
    
    /**
     * @ORM\OneToMany(targetEntity="Match", mappedBy="team_away", cascade={"all"}, orphanRemoval=true)
     */
    protected $matches_away;
    

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
     * @return Team
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
     * Set slug
     *
     * @param string $slug
     * @return Team
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Team
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
     * @return Team
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
     * @return Team
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
     * Set tournament
     *
     * @param \Mybets\ResultBundle\Entity\Tournament $tournament
     * @return Team
     */
    public function setTournament(\Mybets\ResultBundle\Entity\Tournament $tournament = null)
    {
        $this->tournament = $tournament;
    
        return $this;
    }

    /**
     * Get tournament
     *
     * @return \Mybets\ResultBundle\Entity\Tournament 
     */
    public function getTournament()
    {
        return $this->tournament;
    }

    /**
     * Set club
     *
     * @param \Mybets\ResultBundle\Entity\Club $club
     * @return Team
     */
    public function setClub(\Mybets\ResultBundle\Entity\Club $club = null)
    {
        $this->club = $club;
    
        return $this;
    }

    /**
     * Get club
     *
     * @return \Mybets\ResultBundle\Entity\Club 
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * Add matches_home
     *
     * @param \Mybets\ResultBundle\Entity\Match $matchesHome
     * @return Team
     */
    public function addMatchesHome(\Mybets\ResultBundle\Entity\Match $matchesHome)
    {
        $this->matches_home[] = $matchesHome;
    
        return $this;
    }

    /**
     * Remove matches_home
     *
     * @param \Mybets\ResultBundle\Entity\Match $matchesHome
     */
    public function removeMatchesHome(\Mybets\ResultBundle\Entity\Match $matchesHome)
    {
        $this->matches_home->removeElement($matchesHome);
    }

    /**
     * Get matches_home
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMatchesHome()
    {
        return $this->matches_home;
    }

    /**
     * Add matches_away
     *
     * @param \Mybets\ResultBundle\Entity\Match $matchesAway
     * @return Team
     */
    public function addMatchesAway(\Mybets\ResultBundle\Entity\Match $matchesAway)
    {
        $this->matches_away[] = $matchesAway;
    
        return $this;
    }

    /**
     * Remove matches_away
     *
     * @param \Mybets\ResultBundle\Entity\Match $matchesAway
     */
    public function removeMatchesAway(\Mybets\ResultBundle\Entity\Match $matchesAway)
    {
        $this->matches_away->removeElement($matchesAway);
    }

    /**
     * Get matches_away
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMatchesAway()
    {
        return $this->matches_away;
    }
}