<?php

namespace App\DataFixtures;

use App\Entity\Traobject;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TraobjectFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $cle = new Traobject();
        $cle->setTitle('Perte de clé');
        $cle->setPicture('cle-1.jpg');
        $cle->setAddress('rue Gambetta');
        $cle->setEventAt(new \DateTime('2018-10-11'));
        $cle->setCity('Rennes');
        $cle->setCreatedAt(new \DateTime('2018-10-12'));
        $cle->setCounty($this->getReference('county-1'));
        $cle->setState($this->getReference('state-lost'));
        $cle->setUser($this->getReference('user-1'));
        $cle->setCategory($this->getReference('category-1'));
        $manager->persist($cle);

        $doudou = new Traobject();
        $doudou->setTitle('Perte de doudou');
        $doudou->setPicture('doudou-1.jpg');
        $doudou->setAddress('rue Sévigné');
        $doudou->setEventAt(new \DateTime('2018-07-08'));
        $doudou->setCity('Rennes');
        $doudou->setCreatedAt(new \DateTime('2018-07-12'));
        $doudou->setCounty($this->getReference('county-2'));
        $doudou->setState($this->getReference('state-found'));
        $doudou->setUser($this->getReference('user-2'));
        $doudou->setCategory($this->getReference('category-3'));
        $manager->persist($doudou);

        $walkman = new Traobject();
        $walkman->setTitle('Perte de walkman');
        $walkman->setPicture('walkman.jpg');
        $walkman->setAddress('rue Chirac');
        $walkman->setEventAt(new \DateTime('1997-10-11'));
        $walkman->setCity('Brest');
        $walkman->setCreatedAt(new \DateTime('2018-11-12'));
        $walkman->setCounty($this->getReference('county-3'));
        $walkman->setState($this->getReference('state-lost'));
        $walkman->setUser($this->getReference('user-3'));
        $walkman->setCategory($this->getReference('category-5'));
        $manager->persist($walkman);

        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return [UserFixtures::class, StateFixtures::class, CountyFixtures::class, CategoryFixtures::class];
    }
}
