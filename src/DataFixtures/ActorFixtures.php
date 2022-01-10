<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use App\Entity\Actor;
use App\Service\Slugify;

class ActorFixtures extends Fixture
{
    public const ACTORS = [
        [
            'firstname' => 'Norman',
            'lastname' => 'Reedus',
            'birth_date' => '1969-01-06'
        ],
        [
            'firstname' => 'Andrew',
            'lastname' => 'Lincoln',
            'birth_date' => '1973-09-14'
        ],
        [
            'firstname' => 'Lauren',
            'lastname' => 'Cohan',
            'birth_date' => '1982-01-07'
        ],
        [
            'firstname' => 'Maggie',
            'lastname' => 'Reedus',
            'birth_date' => '1985-01-07'
        ],
        [
            'firstname' => 'Paul',
            'lastname' => 'Reedus',
            'birth_date' => '1989-01-07'
        ]
    ];

    public function __construct(Slugify $slugify)
    {
        $this->slugify = $slugify;
    }

    public function load(ObjectManager $manager): void
    {
        foreach (self::ACTORS as $key => $actorData) {
            $actor = new Actor();
            $actor->setFirstname($actorData['firstname']);
            $actor->setLastname($actorData['lastname']);
            $actor->setBirthDate(new \DateTime($actorData['birth_date']));

            $actor->setSlug($this->slugify->generate($actor->getFirstname() . ' ' . $actor->getLastname()));

            $manager->persist($actor);

            $this->addReference('actor_' . $key, $actor);
        }

        $manager->flush();
    }
}
