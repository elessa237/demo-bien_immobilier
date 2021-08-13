<?php

namespace App\DataFixtures;

use App\Entity\Propriete;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        for ($i=0; $i < 10; $i++) {
            $propriete = new Propriete();
            $propriete->setAdresse($faker->address())
                ->setChambre($faker->numberBetween(2,5))
                ->setChauffage($faker->randomElement(['oui', 'non']))
                ->setCodePostal($faker->postcode())
                ->setDescription($faker->sentence(15))
                ->setCreatedAt($faker->dateTimeBetween('-2 week'))
                ->setEtage($faker->randomDigit())
                ->setPrix($faker->numberBetween(50000, 250000))
                ->setVendu($faker->randomElement(['0','1','0']))
                ->setTitre($faker->word(5))
                ->setSurface($faker->numberBetween(100, 400))
                ->setVille($faker->city());
            $manager->persist($propriete);
        }

        $manager->flush();
    }
}
