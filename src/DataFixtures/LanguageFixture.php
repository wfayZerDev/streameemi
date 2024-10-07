<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Categorie;

class CategoryFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $languages = [
            ["name" => "French", "code" => "fr"],
            ["name" => "English", "code" => "en"],
            ["name" => "Spanish", "code" => "es"],
            ["name" => "German", "code" => "de"],
            ["name" => "Italian", "code" => "it"],
        ];

        foreach($languages as $language){
            $entity = new Categorie();
            $entity->setName($language["name"]);
            $entity->setCode($language["code"]);
            $manager->persist($entity);
        }


        $manager->flush();
    }
}
