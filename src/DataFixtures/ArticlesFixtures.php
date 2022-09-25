<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Articles;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticlesFixtures extends Fixture
{
    private Generator $faker; 

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }
    public function load(ObjectManager $manager): void
    {
        for($i=1; $i<=50; $i++) {
            $articles = new Articles();
            $articles->setTitle($this->faker->title())
                ->setContent($this->faker->text())
                ->setDateArticle($this->faker->datetime());

            $manager->persist($articles);
        }

        $manager->flush();
    }
}
