<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Actor;

class ActorFixtures extends Fixture
{
    public const ACTORS = [
        [
            'firstname' => 'John',
            'lastname' => 'Doe',
            'birth_date' => '1970-01-01'
        ],
        [
            'firstname' => 'Jane',
            'lastname' => 'Doe',
            'birth_date' => '1980-01-01'
        ],
        [
            'firstname' => 'Jack',
            'lastname' => 'Doe',
            'birth_date' => '1990-01-01'
        ],
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::ACTORS as $key => $actorData) {
            $actor = new Actor();
            $actor->setFirstname($actorData['firstname']);
            $actor->setLastname($actorData['lastname']);
            $actor->setBirthDate(new \DateTime($actorData['birth_date']));

            $manager->persist($actor);

            // $this->addReference('actor_' . $key, $actor);
        }

        $manager->flush();
    }
}
