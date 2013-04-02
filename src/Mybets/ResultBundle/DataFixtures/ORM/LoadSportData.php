<?php

namespace Mybets\ResultBundle\DataFixtures\ORM;

use Mybets\ResultBundle\Entity\Sport;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class LoadSportData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $sports = array("ice-hockey"    => "Ice hockey",
                        "soccer"        => "Soccer");
        foreach($sports as $ref => $s)
        {
            $sport = new Sport();
            $sport->setName($s);
            $manager->persist($sport);
            $this->addReference($ref, $sport);
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
        return 1;
    }
}