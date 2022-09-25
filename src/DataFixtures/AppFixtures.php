<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    private Generator $faker; 

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }
    public function load(ObjectManager $manager): void
    {
        for($i=1; $i<=50; $i++) {
            $users = new Users();
            $users->setUsername($this->faker->lastName().$i)
                ->setPassword('user');

            $manager->persist($users);
        }
       
        $manager->flush();
    }
}
