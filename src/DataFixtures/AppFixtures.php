<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 0; $i <= 10; $i++) {
            $onePost = new Post();
            $onePost->setTitle($faker->word());
            $onePost->setDuration($faker->word());
            $onePost->setDirector($faker->text(255));
            $onePost->setActors($faker->text(255));
            $onePost->setCountry($faker->text(255));
            $onePost->setType($faker->text(255));
            $onePost->setReview($faker->text(255));
            $onePost->setImage($faker->text(255));
            $onePost->setYear($faker->text(255));

            $manager->persist($onePost);
        }
        $manager->flush();
    }
}
