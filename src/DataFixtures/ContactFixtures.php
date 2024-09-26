<?php

namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $contact = new Contact();
        $contact->setLastname('Cruise')
                ->setFirstname('Tom')
                ->setEmail('tom.cruise@gmail.com')
                ->setCity('Los Angeles');

        $manager->persist($contact);

        $trainer = new Contact();
        $trainer->setLastname('Aldaitz')
                ->setFirstname('Thomas')
                ->setEmail('thomas.aldaitz@gmail.com')
                ->setCity('Lyon');

        $manager->persist($trainer);


        $faker = Factory::create();

        for($i = 0 ; $i < 100; $i++)
        {
            $fakeContact = new Contact();
            $fakeContact->setLastname($faker->lastName())
                    ->setFirstname($faker->firstName())
                    ->setEmail($faker->email())
                    ->setCity($faker->city());
    
            $manager->persist($fakeContact);
        }

        $manager->flush();
    }
}
