<?php

namespace App\DataFixtures;

use App\Entity\Artist;
use App\Entity\Band;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class BandFixturePhp extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {

        $a1 = new Band();
        $a2 = new Band();
        $a3 = new Band();
        $a4 = new Band();

        $repArtist  = $manager->getRepository(Artist::class);

        $a1->setNameBand("Guns and Roses");
             $a1->addMember($this->getReference('GnR1'))
                ->addMember($this->getReference('GnR2'))
                ->addMember($this->getReference('GnR3'))
                ->addMember($this->getReference('GnR4'))
                ->addMember($this->getReference('GnR5'))
                ->addMember($this->getReference('GnR6'))
                ->addMember($this->getReference('GnR7'));
        $manager->persist($a1);

        $a2->setNameBand("Led Zeppelin");
        $a2->addMember($this->getReference('LZ1'))
            ->addMember($this->getReference('LZ2'))
            ->addMember($this->getReference('LZ3'))
            ->addMember($this->getReference('LZ4'));
        $manager->persist($a2);

        $a3->setNameBand("Slipknot");
        $a3->addMember($this->getReference('Slip1'))
            ->addMember($this->getReference('Slip2'))
            ->addMember($this->getReference('Slip3'))
            ->addMember($this->getReference('Slip4'))
            ->addMember($this->getReference('Slip5'))
            ->addMember($this->getReference('Slip6'));
        $manager->persist($a3);

        $a4->setNameBand("Dire Straits");
        $a4->addMember($this->getReference('DS1'))
            ->addMember($this->getReference('DS2'))
            ->addMember($this->getReference('DS3'))
            ->addMember($this->getReference('DS4'))
            ->addMember($this->getReference('DS5'));
        $manager->persist($a4);


        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            MemberFixture::class,
        ];
    }
}
