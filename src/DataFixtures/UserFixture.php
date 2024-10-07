<?php

namespace App\DataFixtures;

use App\Enum\UserStatusEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;

class UserFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $users = [
            ["username" => "Fayzer", "status" => UserStatusEnum::ACTIVE, "email" => "fayzer@gmail.com", "password" => "printemps"],
            ["username" => "FayzerTest", "status" => UserStatusEnum::INACTIVE, "email" => "fayzerTest@gmail.com", "password" => "printemps"],
            ["username" => "FayzerProd", "status" => UserStatusEnum::DELETED, "email" => "FayzerProd@gmail.com", "password" => "printemps"],
            ["username" => "FayzerDev", "status" => UserStatusEnum::PENDING, "email" => "FayzerDev@gmail.com", "password" => "printemps"],
            ["username" => "FayzerHack", "status" => UserStatusEnum::SUSPENDED, "email" => "FayzerHack@gmail.com", "password" => "printemps"],
            ["username" => "FayzerNoob", "status" => UserStatusEnum::BANNED, "email" => "FayzerNoob@gmail.com", "password" => "printemps"],
        ];

        foreach($users as $user){
            $entity = new User();
            $entity->setUsername($user["username"]);
            $entity->setAccountStatus($user["status"]);
            $entity->setEmail($user["email"]);
            $entity->setPassword($user["password"]);
            $manager->persist($entity);
        }
        // $product = new Product();
        // $manager->persist($product);
        
        $manager->flush();
    }
}