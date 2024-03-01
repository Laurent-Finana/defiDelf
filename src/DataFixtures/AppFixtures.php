<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        $user = new User();
        $user
            ->setEmail('admin@admin.com')
            ->setPassword('$2y$10$SIp3IcuvZPX8QIo2Wt0KQ.IDu8x1Q/at8oFW8z1BWRnSdnfRreR1G')
            ->setFirstname('admin')
            ->setLastname('admin')
            ->setPhoneNumber('0123456789')
            ->setRoles(["ROLE_ADMIN"]);
        $manager->persist($user);

        $user = new User();
        $user
            ->setEmail('prof@prof.com')
            ->setPassword('$2y$10$n0MgQ3mbp5CIfzNLJ95rJuc1X/VpB1QVvgLP8dtwytAqJOvrBhMWm')
            ->setFirstname('prof')
            ->setLastname('prof')
            ->setPhoneNumber('0123456789')
            ->setRoles(["ROLE_PROF"]);
        $manager->persist($user);

        $user = new User();
        $user
            ->setEmail('apprenant@apprenant.com')
            ->setPassword('$2y$10$3Xc7PGaK54RVW6lUNrlrlOefZw6rHX9jpu.peo2xgnJoD8GNU/moy')
            ->setFirstname('apprenant')
            ->setLastname('apprenant')
            ->setPhoneNumber('0123456789')
            ->setRoles(["ROLE_APPRENANT"]);
        $manager->persist($user);
       
        for ($u = 0; $u < 3; $u++) {
            $user = new User();
            $user
                ->setEmail($faker->email)
                ->setPassword($faker->password)
                ->setFirstname($faker->firstName)
                ->setLastname($faker->lastName)
                ->setPhoneNumber($faker->phoneNumber);
            $manager->persist($user);
        }


        for ($i=0; $i < 5; $i++) { 
            $article = new Article();
            $article->setThumbnail('https://picsum.photos/300/200?random=' . $i);
            $article->setTitle($faker->sentence(4));
            $article->setContent($faker->paragraph(3));
            $article->setPress($faker->boolean());
            $article->setCreatedAt(\DateTimeImmutable::createFromMutable($faker->datetime()));
            
            $manager->persist($article);
        }

        $manager->flush();
    }
}
