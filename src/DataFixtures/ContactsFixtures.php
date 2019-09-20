<?php

namespace App\DataFixtures;

use App\Entity\Contacts;
use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class ContactsFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 100; $i++) {
            $contact = new Contacts();
            $contact
                ->setNom($faker->name())
                ->setPrenom($faker->lastName)
                ->setEmail($faker->email)
                ->setUserid($this->getReference(UserFixtures::USER_REFERENCE))
            ;

            $manager->persist($contact);
            $manager->flush();
        }
    }

    /**
     * @return array
     */
    public function getDependencies()
    {
        return array(
            UserFixtures::class,
        );
    }

}