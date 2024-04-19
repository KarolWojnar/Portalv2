<?php

namespace App\DataFixtures;

use App\Entity\MicroPost;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $userPasswordHasher
    ) {
    }

    public function load(ObjectManager $manager): void
    {
        $user1 = new User();
        $user1->setEmail("test@wp.pl");
        $user1->setPassword(
            $this->userPasswordHasher
                ->hashPassword($user1, 'passwd123')
        );
        $manager->persist($user1);

        $user2 = new User();
        $user2->setEmail("janek@wp.pl");
        $user2->setPassword(
            $this->userPasswordHasher
                ->hashPassword($user2, 'passwd123')
        );
        $manager->persist($user2);

        $microPost1 = new MicroPost();
        $microPost1->setTitle('Welcome to poland');
        $microPost1->setText('Its beautyfull country');
        $microPost1->setCreated(new DateTime());
        $manager->persist($microPost1);

        $microPost2 = new MicroPost();
        $microPost2->setTitle('Welcome to Spain');
        $microPost2->setText('Its poor country');
        $microPost2->setCreated(new DateTime());
        $manager->persist($microPost2);

        $microPost3 = new MicroPost();
        $microPost3->setTitle('Welcome to Netherland');
        $microPost3->setText('Its rich country');
        $microPost3->setCreated(new DateTime());
        $manager->persist($microPost3);

        $manager->flush();
    }
}
