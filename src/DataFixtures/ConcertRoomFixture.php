<?php

namespace App\DataFixtures;

use App\Entity\ConcertRoom;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ConcertRoomFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $a1 = new ConcertRoom();

        $a1->setNameConcertRoom('La première salle pour les tests')
            ->setAddress('3 rue du 2, Paris')
            ->setCapacity(300);
        $manager->persist($a1);

        $this->addReference('room1', $a1);


        $manager->flush();
    }
}
