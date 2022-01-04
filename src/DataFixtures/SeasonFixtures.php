<?php

namespace App\DataFixtures;

use App\Entity\Season;
use App\DataFixtures\ProgramFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class SeasonFixtures extends Fixture implements DependentFixtureInterface
{
    public const SEASONS = [
        [
            'number' => 1,
            'year' => '2019',
            'description' => 'Saison 1',
            'program' => 'program_0'
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::SEASONS as $key => $seasonData) {
            $season = new Season();
            $season->setNumber($seasonData['number']);
            $season->setYear($seasonData['year']);
            $season->setDescription($seasonData['description']);
            $season->setProgram($this->getReference($seasonData['program']));
            $manager->persist($season);
            $this->addReference('season_' . $key, $season);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ProgramFixtures::class
        ];
    }
}
