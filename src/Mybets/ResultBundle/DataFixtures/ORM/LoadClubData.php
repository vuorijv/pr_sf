<?php

namespace Mybets\ResultBundle\DataFixtures\ORM;

use Mybets\ResultBundle\Entity\Club;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadClubData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $clubs = array("club-tottenham"      => array('name' => "Tottenham Hotspur Football Club", 'city' => "London"),
                       "club-arsenal"       => array('name' => "Arsenal Football Club", 'city' => "London"),
                       "club-fcbarcelona"   => array('name' => "Futbol Club Barcelona", 'city' => "Barcelona"),
                       "club-realmadrid"    => array('name' => "Real Madrid Club de Fútbol", 'city' => "Madrid"));
        foreach($clubs as $ref => $s)
        {
	    $club = new Club();
            $club->setName($s['name']);
            $club->setCity($s['city']);
            $manager->persist($club);
            $this->addReference($ref, $club);
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
        return 4;
    }
}