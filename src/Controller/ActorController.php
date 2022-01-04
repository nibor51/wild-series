<?php

namespace App\Controller;

use App\Entity\Actor;
use App\Entity\Program;
use App\Repository\ActorRepository;
use App\Repository\ProgramRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/actor", name="actor_")
 */

class ActorController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @return Response
     */
    public function index(): Response
    {
        $actors = $this->getDoctrine()
            ->getRepository(Actor::class)
            ->findAll();

        return $this->render('actor/index.html.twig', [
            'actors' => $actors
        ]);
    }

    /**
     * @Route("/{id}", name="show")
     * @param Actor $actor
     * @return Response
     */
    public function show(Actor $actor): Response
    {
        return $this->render('actor/show.html.twig', [
            'actor' => $actor
        ]);
    }

    /**
     * @Route("/{id}/programs", name="programs")
     * @param Actor $actor
     * @param ProgramRepository $programRepository
     * @return Response
     */
    public function programs(Actor $actor, ProgramRepository $programRepository): Response
    {
        $programs = $programRepository->findByActor($actor);

        return $this->render('actor/programs.html.twig', [
            'actor' => $actor,
            'programs' => $programs
        ]);
    }

}
