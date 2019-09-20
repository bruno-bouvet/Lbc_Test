<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Faker\Factory;

class UserFixtures extends Fixture
{

    const USER_REFERENCE = 'user-id';

    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder, ObjectManager $manager)
    {
        $this->encoder = $encoder;
    }

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 100; $i++) {
            $user = new Users();
            $user
                ->setLogin($faker->name())
                ->setEmail($faker->email)
                ->setPassword($faker->password(10, 20));

            $manager->persist($user);
            $manager->flush();

            $user->setId($faker->numberBetween(0, $i));
            $this->setReference(self::USER_REFERENCE, $user);
        }

        /**
         *  Set up admin account
         */
        $user = new Users();
        $user
            ->setLogin('root')
            ->setPassword($this->encoder->encodePassword($user, 'root'))
            ->setEmail('root@root.com');

        $manager->persist($user);
        $manager->flush();

    }
}
