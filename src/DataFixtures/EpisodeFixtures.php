<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use App\DataFixtures\SeasonFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class EpisodeFixtures extends Fixture implements DependentFixtureInterface
{
    public const EPISODES = [
        [
            'title' => 'Episode 1',
            'number' => 1,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ],

        [
            'title' => 'Episode 2',
            'number' => 1,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ],

        [
            'title' => 'Episode 3',
            'number' => 1,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ],

        [
            'title' => 'Episode 4',
            'number' => 1,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ],

        [
            'title' => 'Episode 5',
            'number' => 1,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ],

        [
            'title' => 'Episode 6',
            'number' => 1,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ],

        [
            'title' => 'Episode 7',
            'number' => 1,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ],

        [
            'title' => 'Episode 8',
            'number' => 1,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ],

        [
            'title' => 'Episode 9',
            'number' => 1,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ],

        [
            'title' => 'Episode 10',
            'number' => 1,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ],

        [
            'title' => 'Episode 11',
            'number' => 1,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ],

        [
            'title' => 'Episode 12',
            'number' => 1,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ],

        [
            'title' => 'Episode 13',
            'number' => 1,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ],

        [
            'title' => 'Episode 1',
            'number' => 2,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ],

        [
            'title' => 'Episode 2',
            'number' => 2,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ],

        [
            'title' => 'Episode 3',
            'number' => 2,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ],

        [
            'title' => 'Episode 4',
            'number' => 2,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ],

        [
            'title' => 'Episode 5',
            'number' => 2,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ],

        [
            'title' => 'Episode 6',
            'number' => 2,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ],

        [
            'title' => 'Episode 7',
            'number' => 2,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ],

        [
            'title' => 'Episode 8',
            'number' => 2,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ],

        [
            'title' => 'Episode 9',
            'number' => 2,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ],

        [
            'title' => 'Episode 10',
            'number' => 2,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ],

        [
            'title' => 'Episode 11',
            'number' => 2,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ],

        [
            'title' => 'Episode 12',
            'number' => 2,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ],

        [
            'title' => 'Episode 13',
            'number' => 2,
            'synopsis' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora, blanditiis sint. Odio, eveniet quisquam debitis asperiores deserunt a facere quo, optio accusantium adipisci officia officiis aliquam similique eligendi voluptas quas!',
            'seasonReference' => 'season_0'
        ]

    ];
    public function load(ObjectManager $manager): void
    {
        foreach (self::EPISODES as $key => $episodeData) {
            $episode = new Episode();
            $episode->setTitle($episodeData['title']);
            $episode->setNumber($episodeData['number']);
            $episode->setSynopsis($episodeData['synopsis']);

            $episode->setSeason($this->getReference($episodeData['seasonReference']));

            $manager->persist($episode);

            $this->addReference('episode_' . $key, $episode);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            SeasonFixtures::class
        ];
    }
}
