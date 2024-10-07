<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Media;

class MediaFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
