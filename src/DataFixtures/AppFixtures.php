<?php

namespace App\DataFixtures;

use App\Entity\Propriete;
use App\Entity\User;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $password = $this->hasher->hashPassword($user, 'demo');
        $user->setUsername("demo")
            ->setRoles(["ROLE_ADMIN"])
            ->setPassword($password);

        $manager->persist($user);

        $faker = \Faker\Factory::create('fr_FR');
        for ($i=0; $i < 30; $i++) {
            $propriete = new Propriete();
            $propriete->setAdresse($faker->address())
                ->setPiece($faker->numberBetween(2,5))
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
