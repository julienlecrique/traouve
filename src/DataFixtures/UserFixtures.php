<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class UserFixtures extends Fixture
{
    private $passwordEncoder;

    /**
     * UserFixtures constructor.
     * @param UserPasswordEncoderInterface $passwordEncoder
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder =$passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setFirstname('Thibault');
        $user1->setLastname('Tregret');
        $user1->setEmail('ttregret@gmail.com');
        $user1->setPassword($this->passwordEncoder->encodePassword($user1, '1234'));
        $user1->setRoles(["ROLE_USER"]);
        $manager->persist($user1);
        $this->addReference('user-1', $user1);

        $user2 = new User();
        $user2->setFirstname('Pierre');
        $user2->setLastname('Jehan');
        $user2->setEmail('pjehan@gmail.com');
        $user2->setPassword($this->passwordEncoder->encodePassword($user2, '1234'));
        $user2->setRoles(["ROLE_USER"]);
        $user2->setPhone('0607080905');
        $user2->setPicture('user-2.jpg');
        $manager->persist($user2);
        $this->addReference('user-2', $user2);

        $admin = new User();
        $admin->setFirstname('Lecrique');
        $admin->setLastname('Julien');
        $admin->setEmail('jlecrique@gmail.com');
        $admin->setPassword($this->passwordEncoder->encodePassword($admin, '1234'));
        $admin->setRoles(["ROLE_ADMIN"]);
        $admin->setPicture('user-3.jpg');
        $manager->persist($admin);
        $this->addReference('user-3', $admin);

        $manager->flush();
    }

}