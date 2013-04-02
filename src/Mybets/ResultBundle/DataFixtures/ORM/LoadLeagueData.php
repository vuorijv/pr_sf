<?php

namespace Mybets\ResultBundle\DataFixtures\ORM;

use Mybets\ResultBundle\Entity\League;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadLeagueData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
         $leagues = array("ice-hockey"    => array("nhl" => "NHL", "sm-liiga" => "SM-Liiga"),
                          "soccer"        => array("epl" => "English Premier League", "la-liga" => "La Liga", "ucl" => "Champions League"));
        foreach($leagues as $ref => $l)
        {
            foreach($l as $new_ref => $s)
            {
                $league = new League();
                $league->setName($s);
                $league->setSport($this->getReference($ref));
                $manager->persist($league);
                $this->addReference($new_ref, $league);
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
        return 2;
    }
}