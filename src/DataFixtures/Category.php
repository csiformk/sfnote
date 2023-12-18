<?php

namespace App\DataFixtures;

use App\Entity\Category as EntityCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class Category extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        for ($i=0 ; $i < 10 ; $i++)
        {
            $catecory = new EntityCategory();
            $catecory->setLibelle($faker->word());
            $manager->persist($catecory);
        }

        $manager->flush();
    }
}
