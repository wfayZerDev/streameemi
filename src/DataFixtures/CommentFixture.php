<?php

namespace App\DataFixtures;

use App\Enum\CommentStatusEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Comment;

class CommentFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $comments = [
            ["content" => "Alexandre Pumpalovic est trop beau", "status" => CommentStatusEnum::ACTIVE],
            ["content" => "Alexandre Pumpalovic est trop beau", "status" => CommentStatusEnum::ACTIVE],
            ["content" => "Alexandre Pumpalovic est trop beau", "status" => CommentStatusEnum::WAITING],
            ["content" => "Alexandre Pumpalovic est trop beau", "status" => CommentStatusEnum::WAITING],
            ["content" => "Alexandre Pumpalovic est trop beau", "status" => CommentStatusEnum::REJECTED],
        ];

        foreach($comments as $comment){
            $entity = new Comment();
            $entity->setContent($comment["content"]);
            $entity->setStatus($comment["status"]);
            $manager->persist($entity);
        }

        $manager->flush();
    }
}