<?php

namespace App\DataFixtures;

use App\Entity\State;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class StateFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $find = new State();
        $find->setLabel('trouve');
        $find->setColor('blue');
        $manager->persist($find);
        $this->setReference('state-found', $find);


        $lost = new State();
        $lost->setLabel('perdu');
        $lost->setColor('red');
        $manager->persist($lost);
        $this->setReference('state-lost', $lost);


        $manager->flush();
    }
}
