<?php

namespace Mybets\ResultBundle\DataFixtures\ORM;

use Mybets\ResultBundle\Entity\Tournament;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadTournamentData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
         $tournaments = array("nhl"         => array("nhl13"        => "NHL 12-13"),
                              "sm-liiga"    => array("sm-liiga13"   => "SM-Liiga 12-13"),
                              "epl"         => array("epl13"        => "Premier League 12-13"),
                              "la-liga"     => array("laliga13"     => "La Liga 12-13"),
                              "ucl"         => array("ucl13"        => "Champions League 12-13"));
        foreach($tournaments as $ref => $l)
        {
            foreach($l as $new_ref => $s)
            {
                $tournament = new Tournament();
                $tournament->setName($s);
                $tournament->setLeague($this->getReference($ref));
                $manager->persist($tournament);
                $this->addReference($new_ref, $tournament);
            }

        }
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 3;
    }
}