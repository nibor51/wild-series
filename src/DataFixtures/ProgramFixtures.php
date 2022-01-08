<?php

namespace App\DataFixtures;

use App\Entity\Program;
use App\DataFixtures\CategoryFixtures;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ProgramFixtures extends Fixture implements DependentFixtureInterface
{
    public const PROGRAM = [
        [
            'poster' => 'https://fr.web.img5.acsta.net/c_310_420/pictures/21/11/02/11/12/2878509.jpg',
            'title' => 'Arcane',
            'summary' => 'Championnes de leurs villes jumelles et rivales (la huppée Piltover et la sous-terraine Zaun), deux sœurs Vi et Powder se battent dans une guerre où font rage des technologies magiques et des perspectives diamétralement opposées.',
            'categorieReference' => 'category_2'

        ],

        [
            'poster' => 'https://picsum.photos/200/300',
            'title' => 'The Flash',
            'summary' => 'The Flash est un super-héros américain, créé par DC Comics et publié par la société Warner Bros. Comics, qui a été sorti en 1940. Il est le premier personnage de la série de bandes dessinées de la société DC Comics.',
            'categorieReference' => 'category_1'
        ],
        
        [
            'poster' => 'https://picsum.photos/200/300',
            'title' => 'Start wars',
            'summary' => 'Star Wars est un film de science-fiction écrit et réalisé par George Lucas, sorti en 1977. Il est le deuxième film de la saga Star Wars, après le premier film Les Îles perdues.',
            'categorieReference' => 'category_5'

        ],

        [
            'poster' => 'https://picsum.photos/200/300',
            'title' => 'Retour vers le futur',
            'summary' => 'Retour vers le futur est un film américain de science-fiction réalisé par Robert Zemeckis, sorti en 1985. Il est le quatrième film de la saga Star Wars, après Star Wars: Episode III - Revenge of the Sith et Star Wars: A New Hope.',
            'categorieReference' => 'category_5'
        ],

        [
            'poster' => 'https://picsum.photos/200/300',
            'title' => 'The Avengers',
            'summary' => 'The Avengers est un film américain de science-fiction réalisé par la saga Marvel Studios, sorti en 2012. Il est le quatrième film de la saga Star Wars, après Star Wars: Episode III - Revenge of the Sith et Star Wars: A New Hope.',
            'categorieReference' => 'category_5'
        ]
    ];

    public function load(ObjectManager $manager): void
    {
        foreach (self::PROGRAM as $key => $programData) {
            $program = new Program();
            $program->setTitle($programData['title']);
            $program->setsummary($programData['summary']);
            $program->setPoster($programData['poster']);
            $program->setCategory($this->getReference($programData['categorieReference']));
            for ($i=0; $i < count(ActorFixtures::ACTORS); $i++) {
                $program->addActor($this->getReference('actor_' . $i));
            }
            
            $manager->persist($program);

            $this->addReference('program_' . $key, $program);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        // Tu retournes ici toutes les classes de fixtures dont ProgramFixtures dépend
        return [
            ActorFixtures::class,
            CategoryFixtures::class,
        ];
    }
}
