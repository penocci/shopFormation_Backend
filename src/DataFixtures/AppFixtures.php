<?php

namespace App\DataFixtures;



use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');
        $articles = [];
        for ($k = 0; $k < 50; $k++) {
            $articles[$k] = new Article();
            $articles[$k]->setDesignation($faker->userName)
                ->setDescription($faker->text)
                ->setPrixUnitaire($faker->biasedNumberBetween($min = 10, $max = 2000, $function = 'sqrt'))
                ->setImageArticle($faker->imageUrl($width = 640, $height = 480, 'cats', true, 'Faker'))
                ->setQteEnStock($faker->biasedNumberBetween($min = 0, $max = 200, $function = 'sqrt'));  
            $manager->persist($articles[$k]);
        }
        $manager->flush();
    }
}
