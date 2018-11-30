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
        $cle->setState($this->getReference('state-found'));
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
        $walkman->setState($this->getReference('state-found'));
        $walkman->setUser($this->getReference('user-3'));
        $walkman->setCategory($this->getReference('category-5'));
        $manager->persist($walkman);


        $wallet = new Traobject();
        $wallet->setTitle('Perte de portefeuille');
        $wallet->setPicture('wallet.jpg');
        $wallet->setAddress('rue Mitterand');
        $wallet->setEventAt(new \DateTime('2000-10-11'));
        $wallet->setCity('Saint Malo');
        $wallet->setCreatedAt(new \DateTime('2018-11-12'));
        $wallet->setCounty($this->getReference('county-3'));
        $wallet->setState($this->getReference('state-lost'));
        $wallet->setUser($this->getReference('user-1'));
        $wallet->setCategory($this->getReference('category-2'));
        $manager->persist($wallet);

        $short = new Traobject();
        $short->setTitle('Perte de gant');
        $short->setPicture('gant.jpg');
        $short->setAddress('rue Sarkozy');
        $short->setEventAt(new \DateTime('2012-10-11'));
        $short->setCity('Saint Gilles');
        $short->setCreatedAt(new \DateTime('2018-11-12'));
        $short->setCounty($this->getReference('county-1'));
        $short->setState($this->getReference('state-lost'));
        $short->setUser($this->getReference('user-2'));
        $short->setCategory($this->getReference('category-6'));
        $manager->persist($short);

        $game = new Traobject();
        $game->setTitle('Perte de gameboy');
        $game->setPicture('gameboy.jpg');
        $game->setAddress('rue Macron');
        $game->setEventAt(new \DateTime('1994-10-11'));
        $game->setCity('Fougères');
        $game->setCreatedAt(new \DateTime('1994-11-12'));
        $game->setCounty($this->getReference('county-3'));
        $game->setState($this->getReference('state-lost'));
        $game->setUser($this->getReference('user-1'));
        $game->setCategory($this->getReference('category-5'));
        $manager->persist($game);

        $game2 = new Traobject();
        $game2->setTitle('Perte de telephone');
        $game2->setPicture('');
        $game2->setAddress('rue Macron');
        $game2->setEventAt(new \DateTime('1994-10-11'));
        $game2->setCity('Fougères');
        $game2->setCreatedAt(new \DateTime('1994-11-12'));
        $game2->setCounty($this->getReference('county-3'));
        $game2->setState($this->getReference('state-lost'));
        $game2->setDescription('important pour le travail');
        $game2->setUser($this->getReference('user-1'));
        $game2->setCategory($this->getReference('category-5'));
        $manager->persist($game2);


        $cat = new Traobject();
        $cat->setTitle('Perte de chat');
        $cat->setPicture('cat.jpg');
        $cat->setAddress('rue Fleury Michon');
        $cat->setEventAt(new \DateTime('2004-10-11'));
        $cat->setCity('Fougères');
        $cat->setCreatedAt(new \DateTime('1994-11-12'));
        $cat->setCounty($this->getReference('county-3'));
        $cat->setState($this->getReference('state-lost'));
        $cat->setUser($this->getReference('user-2'));
        $cat->setCategory($this->getReference('category-4'));
        $manager->persist($cat);

        $cle2 = new Traobject();
        $cle2->setTitle('Perte de clé');
        $cle2->setPicture('cle-2.jpg');
        $cle2->setAddress('rue Diderot');
        $cle2->setEventAt(new \DateTime('2006-10-11'));
        $cle2->setCity('Lamballe');
        $cle2->setCreatedAt(new \DateTime('2007-11-12'));
        $cle2->setCounty($this->getReference('county-2'));
        $cle2->setState($this->getReference('state-found'));
        $cle2->setDescription('je les cherche');
        $cle2->setUser($this->getReference('user-2'));
        $cle2->setCategory($this->getReference('category-1'));
        $manager->persist($cle2);


        $cle3 = new Traobject();
        $cle3->setTitle('Perte de clé');
        $cle3->setPicture('');
        $cle3->setAddress('rue Diderot');
        $cle3->setEventAt(new \DateTime('2006-10-11'));
        $cle3->setCity('rennes');
        $cle3->setCreatedAt(new \DateTime('2007-11-12'));
        $cle3->setCounty($this->getReference('county-2'));
        $cle3->setState($this->getReference('state-found'));
        $cle3->setUser($this->getReference('user-2'));
        $cle3->setCategory($this->getReference('category-1'));
        $manager->persist($cle3);

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
