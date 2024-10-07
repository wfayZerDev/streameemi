<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Language;

class LanguageFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $languages = [
            ["name" => "French", "code" => "fr"],
            ["name" => "English", "code" => "en"],
            ["name" => "Spanish", "code" => "es"],
            ["name" => "German", "code" => "de"],
            ["name" => "Italian", "code" => "it"],
            ["name" => "Portuguese", "code" => "pt"],
            ["name" => "Dutch", "code" => "nl"],
            ["name" => "Russian", "code" => "ru"],
            ["name" => "Chinese", "code" => "zh"],
            ["name" => "Japanese", "code" => "ja"],
            ["name" => "Korean", "code" => "ko"],
            ["name" => "Arabic", "code" => "ar"],
            ["name" => "Turkish", "code" => "tr"],
            ["name" => "Hindi", "code" => "hi"],
            ["name" => "Bengali", "code" => "bn"],
            ["name" => "Urdu", "code" => "ur"],
            ["name" => "Vietnamese", "code" => "vi"],
            ["name" => "Thai", "code" => "th"],
            ["name" => "Swedish", "code" => "sv"],
            ["name" => "Danish", "code" => "da"],
            ["name" => "Finnish", "code" => "fi"],
            ["name" => "Norwegian", "code" => "no"],
            ["name" => "Polish", "code" => "pl"],
            ["name" => "Greek", "code" => "el"],
            ["name" => "Czech", "code" => "cs"],
            ["name" => "Slovak", "code" => "sk"],
            ["name" => "Romanian", "code" => "ro"],
            ["name" => "Hungarian", "code" => "hu"],
            ["name" => "Bulgarian", "code" => "bg"],
            ["name" => "Serbian", "code" => "sr"],
            ["name" => "Croatian", "code" => "hr"],
            ["name" => "Bosnian", "code" => "bs"],
            ["name" => "Albanian", "code" => "sq"],
            ["name" => "Macedonian", "code" => "mk"],
            ["name" => "Slovenian", "code" => "sl"],
            ["name" => "Estonian", "code" => "et"]
        ];

        foreach($languages as $language){
            $entity = new Language();
            $entity->setName($language["name"]);
            $entity->setCode($language["code"]);
            $manager->persist($entity);
        }


        $manager->flush();
    }
}
