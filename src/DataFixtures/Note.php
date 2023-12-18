<?php

namespace App\DataFixtures;

use App\Entity\Note as EntityNote;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;


class Note extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        
        for ($i=0 ; $i < 50 ; $i++)
        {
            $note = new EntityNote();
            $note->setTitle($faker->sentence());
            $note->setContent($faker->text());
            $manager->persist($note);
        }

        $manager->flush();
    }
}
