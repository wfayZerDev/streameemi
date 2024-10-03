<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categorie;

class CategoryFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $categories = [
            ["name" => "Action", "label" => "Action"],
            ["name" => "Science-Fiction", "label" => "Science-Fiction"],
            ["name" => "Romance", "label" => "Romance"],
            ["name" => "Suspense", "label" => "Suspense"],
            ["name" => "Horreur", "label" => "Horreur"],
        ];

        foreach($categories as $categorie){
            $entity = new Categorie();
            $entity->setName($categorie["name"]);
            $entity->setLabel($categorie["label"]);
            $manager->persist($entity);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
