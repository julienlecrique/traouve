<?php

namespace App\DataFixtures;

use App\Entity\County;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CountyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $counties = [
            ['Côtes d\'Armor', '22'],
            ['Ile et Vilaine', '35'],
            ['Finistère', '29'],
            ['Morbihan', '56']
        ];

        foreach ($counties as $key => $county) {
            $count = new County();
            $count->setLabel($county[0]);
            $count->setZipcode($county[1]);
            $manager->persist($count);
            $this->setReference('county-' . ($key + 1), $count );
        }

        $manager->flush();


    }
}



