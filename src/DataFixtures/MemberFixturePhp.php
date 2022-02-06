<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MemberFixturePhp extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $a1 = new Artist(); $a2 = new Artist();$a3 = new Artist();$a4 = new Artist();$a5 = new Artist();$a6 = new Artist();

        $a1->setFirstNameArtist('Axel')
           ->setLastNameArtist('Rose');

        $a2->setFirstNameArtist("John")
            ->setLastNameArtist("Mayer");

        $a3->setFirstNameArtist("B.B")
            ->setLastNameArtist("King");

        $a4->setFirstNameArtist("Robert")
            ->setLastNameArtist("Plant");

        $a5->setFirstNameArtist("Corey")
            ->setLastNameArtist("Taylor");

        $a6->setFirstNameArtist("Mark")
            ->setLastNameArtist("Knopfler");


        $manager->persist($a1);
        $manager->persist($a2);
        $manager->persist($a3);
        $manager->persist($a4);
        $manager->persist($a5);
        $manager->persist($a6);

        $manager->flush();
    }
}