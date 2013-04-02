<?php

namespace Mybets\ResultBundle\DataFixtures\ORM;

use Mybets\ResultBundle\Entity\Team;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadTeamData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
         $teams = array("club-tottenham"      => array('name' => "Tottenham", 'tournaments' => array('epl13')),
                       "club-arsenal"       => array('name' => "Arsenal", 'tournaments' => array('epl13', 'ucl13')),
                       "club-fcbarcelona"   => array('name' => "FC Barcelona", 'tournaments' => array('la-liga13', 'ucl13')),
                       "club-realmadrid"    => array('name' => "Real Madrid", 'tournaments' => array('la-liga13', 'ucl13')));
        foreach($teams as $ref => $l)
        {
            foreach($l as $new_ref => $s)
            {
                $team = new Team();
                $team->setName($s['name']);
                $team->setClub($this->getReference($ref));
                foreach($s['tournaments'] as $tref)
                {
                    $team->setTournament($this->getReference($tref));
                }

                $manager->persist($team);
                $this->addReference($new_ref, $team);
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
        return 5;
    }
}