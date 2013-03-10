<?php

namespace Mybets\ResultBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Mybets\ResultBundle\Entity\League
 *
 * @ORM\Table(name="league")
 * @ORM\Entity(repositoryClass="Mybets\ResultBundle\Entity\LeagueRepository")
 *
 */
class League
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
    * @ORM\OneToMany(targetEntity="Tournament", mappedBy="league", cascade={"all"}, orphanRemoval=true)
    */
    protected $tournaments;

    /**
     * @ORM\ManyToOne(targetEntity="Sport", inversedBy="leagues")
     * @ORM\JoinColumn(name="sport_id", referencedColumnName="id", nullable=true)
     */
    protected $sport;

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
     * Add tournament
     *
     * @param Mybets\ResultBundle\Entity\Tournament $tournament
     */
    public function addLeague(\Mybets\ResultBundle\Entity\Tournament $tournament)
    {
        $this->tournaments[] = $league;
    }

    /**
     * Remove tournament
     *
     * @param Mybets\ResultBundle\Entity\Tournament $tournament
     */
    public function removeBookCharacter(\Mybets\ResultBundle\Entity\Tournament $tournament)
    {
       $this->leagues->removeElement($tournament);
    }

    /**
     * Get tournaments
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getTournaments()
    {
        return $this->tournaments;
    }

    /**
     * Get sport
     *
     * @return Mybets\ResultBundle\Entity\Sport
     */
    public function getSport()
    {
        return $this->sport;
    }

    /**
     * Set sport
     *
     * @param Mybets\ResultBundle\Entity\Sport $sport
     */
    public function setSport($sport)
    {
        $this->sport = $sport;
    }

    /**
     * toString
     *
     * @return text
     */
    public function __toString()
    {
        return $this->getName();
    }
}