<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
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
        $a1->setEmail("testAdmin@gmail.com")
            ->setLastName("Istrateur")
            ->setFirstName("Amin")
            ->setRoles(["ROLE_ADMIN"])
            ->setPassword($this->hasher->hashPassword($a1,"1245623"));
        $manager->persist($a1);
        $manager->flush();
    }
}
