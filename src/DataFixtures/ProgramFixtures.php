<?php

namespace App\DataFixtures;

use App\Entity\Program;
use App\DataFixtures\CategoryFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public const SHOW = [
        [
            'poster' => 'https://fr.web.img5.acsta.net/c_310_420/pictures/21/11/02/11/12/2878509.jpg',
            'title' => 'Arcane',
            'summary' => 'Championnes de leurs villes jumelles et rivales (la huppée Piltover et la sous-terraine Zaun), deux sœurs Vi et Powder se battent dans une guerre où font rage des technologies magiques et des perspectives diamétralement opposées.',
            'categorieReference' => 'category_1'

        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::SHOW as $key => $showData) {
            $show = new Program();
            $show->setPoster($showData['poster']);
            $show->setTitle($showData['title']);
            $show->setsummary($showData['summary']);

            $show->setCategory($this->getReference($showData['categorieReference']));
            
            $manager->persist($show);

            $this->addReference('program_' . $key, $show);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
            CategoryFixtures::class,
        ];
    }
}
