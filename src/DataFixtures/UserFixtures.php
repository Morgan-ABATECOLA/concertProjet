<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    /**
     * @var UserPasswordHasherInterface
     */
    private $hasher;

    /**
     * @param UserPasswordHasherInterface $hasher
     */
    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $a1 = new User();

        $a1->setEmail("abatecola.morgan@gmail.com")
            ->setFirstName("Morgan")
            ->setLastName("ABATECOLA")
            ->setPassword($this->hasher->hashPassword($a1, "azerazer"))
            ->setRoles(["ROLE_USER", "ROLE_ADMIN"]);
        $manager->persist($a1);

        $a2 = new User();
        $a2->setEmail("oui@oui.oui")
            ->setPassword($this->hasher->hashPassword($a2, "1245623"))
            ->setFirstName("OuiLeGrandOui")
            ->setLastName("OUIOUI")
            ->setRoles(["ROLE_USER"]);
        $manager->persist($a2);

        $manager->flush();
    }
}
