<?php

namespace App\DataFixtures;


use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $key = new Category();
        $key->setLabel('Clés');
        $key->setColor('blue');
        $key->setIcon('fa-key');
        $manager->persist($key);
        $this->addReference('category-1', $key);

        $wallet = new Category();
        $wallet->setLabel('Portefeuille');
        $wallet->setColor('red');
        $wallet->setIcon('fa-money');
        $manager->persist($wallet);
        $this->addReference('category-2', $wallet);

        $toy = new Category();
        $toy->setLabel('Jouets');
        $toy->setColor('black');
        $toy->setIcon('fa-gamepad');
        $manager->persist($toy);
        $this->addReference('category-3', $toy);

        $animal = new Category();
        $animal->setLabel('Animaux');
        $animal->setColor('purple');
        $animal->setIcon('fa-paw');
        $manager->persist($animal);
        $this->addReference('category-4', $animal);

        $electronic = new Category();
        $electronic->setLabel('Electroniques');
        $electronic->setColor('grey');
        $electronic->setIcon('fa-camera');
        $manager->persist($electronic);
        $this->addReference('category-5', $electronic);

        $clothe = new Category();
        $clothe->setLabel('Vêtements');
        $clothe->setColor('orange');
        $clothe->setIcon('fa-shirtsinbulk');
        $manager->persist($clothe);
        $this->addReference('category-6', $clothe);


        $manager->flush();
    }
}