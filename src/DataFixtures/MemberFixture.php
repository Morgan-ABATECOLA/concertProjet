<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MemberFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        // ----------- Guns & Roses ----------- //
        $a1 = new Artist();
        $a1->setFirstNameArtist('Axl')
           ->setLastNameArtist('Rose')
           ->setJob('Chanteur');
        $manager->persist($a1);

        $a2 = new Artist();
        $a2->setFirstNameArtist('Duff')
            ->setLastNameArtist('McKagan')
            ->setJob('Bassiste / Choriste');
        $manager->persist($a2);

        $a3 = new Artist();
        $a3->setFirstNameArtist('The one and only')
            ->setLastNameArtist('Slash')
            ->setJob('Guitariste');
        $manager->persist($a3);


        $a4 = new Artist();
        $a4->setFirstNameArtist('Dizzy')
            ->setLastNameArtist('Reed')
            ->setJob('Pianiste / Percussionniste / Choriste');
        $manager->persist($a4);

        $a5 = new Artist();
        $a5->setFirstNameArtist('Richard')
            ->setLastNameArtist('Fortus')
            ->setJob('Guitariste rythme / Choriste');
        $manager->persist($a5);

        $a6 = new Artist();
        $a6->setFirstNameArtist('Frank')
            ->setLastNameArtist('Ferrer')
            ->setJob('Batteur / Percussionniste');
        $manager->persist($a6);

        $a7 = new Artist();
        $a7->setFirstNameArtist('Melissa')
            ->setLastNameArtist('Reese')
            ->setJob('Chanteur');
        $manager->persist($a7);
        // ----------- ----------- ----------- //



        // ----------- <3 Led Zeppelin <3 ----------- //
        $a8 = new Artist();
        $a8->setFirstNameArtist("Robert")
            ->setLastNameArtist("Plant")
            ->setJob('Chanteur');
        $manager->persist($a8);

        $a9 = new Artist();
        $a9->setFirstNameArtist("Jimmy")
            ->setLastNameArtist("Page")
            ->setJob('Guitariste solo');
        $manager->persist($a9);

        $a10 = new Artist();
        $a10->setFirstNameArtist("John")
            ->setLastNameArtist("Bonham")
            ->setJob('Batteur');
        $manager->persist($a10);

        $a11 = new Artist();
        $a11->setFirstNameArtist("John Paul")
            ->setLastNameArtist("Jones")
            ->setJob('Bassiste');
        $manager->persist($a11);
        // ----------- ----------- ----------- //


        // ----------- SLIPKNOT ----------- //
        $a12 = new Artist();
        $a12->setFirstNameArtist("Corey")
            ->setLastNameArtist("Taylor")
            ->setJob('Chanteur');
        $manager->persist($a12);

        $a13 = new Artist();
        $a13->setFirstNameArtist("Shawn")
            ->setLastNameArtist("Crahan")
            ->setJob('Percussionniste');
        $manager->persist($a13);

        $a14 = new Artist();
        $a14->setFirstNameArtist("Joey")
            ->setLastNameArtist("Jordison")
            ->setJob('Batteur');
        $manager->persist($a14);

        $a15 = new Artist();
        $a15->setFirstNameArtist("Paul")
            ->setLastNameArtist("Gray")
            ->setJob('Bassiste');
        $manager->persist($a15);

        $a16 = new Artist();
        $a16->setFirstNameArtist("Kun")
            ->setLastNameArtist("Nong")
            ->setJob('Guitariste');
        $manager->persist($a16);

        $a17 = new Artist();
        $a17->setFirstNameArtist("Donnie")
            ->setLastNameArtist("Steele")
            ->setJob('Guitariste');
        $manager->persist($a17);
        //  ----------- ----------- ----------- //



        //  ----------- DIRE STRAITS  ----------- //
        $a30 = new Artist();
        $a30->setFirstNameArtist("Mark")
            ->setLastNameArtist("Knopfler")
            ->setJob('Chanteur / Guitariste solo');
        $manager->persist($a30);

        $a31 = new Artist();
        $a31->setFirstNameArtist("John")
            ->setLastNameArtist("Illsley")
            ->setJob('Bassiste / Choriste');
        $manager->persist($a31);

        $a32 = new Artist();
        $a32->setFirstNameArtist("David")
            ->setLastNameArtist("Withers")
            ->setJob('Batteur / Percussionniste');
        $manager->persist($a32);

        $a33 = new Artist();
        $a33->setFirstNameArtist("David")
            ->setLastNameArtist("Knopfler")
            ->setJob('Guitariste rythme / Choriste');
        $manager->persist($a33);

        $a34 = new Artist();
        $a34->setFirstNameArtist("Alan")
            ->setLastNameArtist("Clark")
            ->setJob('Pianiste');
        $manager->persist($a34);
        // ----------- ----------- ----------- //

        $this->addReference('GnR1', $a1);
        $this->addReference('GnR2', $a2);
        $this->addReference('GnR3', $a3);
        $this->addReference('GnR4', $a4);
        $this->addReference('GnR5', $a5);
        $this->addReference('GnR6', $a6);
        $this->addReference('GnR7', $a7);

        $this->addReference('LZ1', $a8);
        $this->addReference('LZ2', $a9);
        $this->addReference('LZ3', $a10);
        $this->addReference('LZ4', $a11);

        $this->addReference('Slip1', $a12);
        $this->addReference('Slip2', $a13);
        $this->addReference('Slip3', $a14);
        $this->addReference('Slip4', $a15);
        $this->addReference('Slip5', $a16);
        $this->addReference('Slip6', $a17);

        $this->addReference('DS1', $a30);
        $this->addReference('DS2', $a31);
        $this->addReference('DS3', $a32);
        $this->addReference('DS4', $a33);
        $this->addReference('DS5', $a34);




        $manager->flush();
    }
}