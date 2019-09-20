<?php

namespace App\DataFixtures;

use App\Entity\Addresses;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

class AddressesFixtures extends Fixture implements DependentFixtureInterface
{

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 100; $i++) {
            $adress = new Addresses();
            $adress
                ->setNumber($faker->numberBetween(1, 200))
                ->setStreet($faker->streetName)
                ->setPostalcode(92160)
                ->setCity($faker->city)
                ->setCountry($faker->country)
                ->setIdcontact($this->getReference(ContactsFixtures::CONTACT_REFERENCE))
            ;

            $manager->persist($adress);
            $manager->flush();
        }
    }

    /**
     * @return array
     */
    public function getDependencies()
    {
        return array(
            ContactsFixtures::class,
        );
    }

}