<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

use App\Entity\Program;
use App\Entity\Season;
use App\Entity\Episode;
use App\Entity\Comment;
use App\Entity\User;
use App\Form\ProgramType;
use App\Form\CommentType;
use App\Service\Slugify;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @Route("/program", name="program_")
 */

class ProgramController extends AbstractController
{
    /**
     * @Route("/", name="index")
     * @return Response
     */
    public function index(): Response
    {
        $programs = $this->getDoctrine()
            ->getRepository(Program::class)
            ->findAll();

        return $this->render('program/index.html.twig', [
            'programs' => $programs
        ]);
    }

    /**
     * The controler for the program add form
     * 
     * @Route("/new", name="new")
     */
    public function new(Request $request, Slugify $slugify, MailerInterface $mailer) : Response
    {
        //Create a new program Object
        $program = new program();
        // Create the associated Form
        $form = $this->createForm(ProgramType::class, $program);
        //Get data from HTTP request
        $form->handleRequest($request);
        // Was the form submitted ?
        if ($form->isSubmitted() && $form->isValid()) {
            // Deal with the submitted data
            // Get the Entity Manager
            $entityManager = $this->getDoctrine()->getManager();
            // Set the slug
            $slug = $slugify->generate($program->getTitle());
            $program->setSlug($slug);
            // Persist program Object
            $entityManager->persist($program);
            // Flush the persisted object
            $entityManager->flush();
            // Send an email
            $email = (new Email())
                ->from($this->getParameter('mailer_from'))
                ->to('ff7e6553d0-4a8169@inbox.mailtrap.io')
                ->subject('New program added')
                ->html($this->renderView('program/newProgramEmail.html.twig', [
                    'program' => $program
                ]));
            $mailer->send($email);
            // Redirect to programs list
            return $this->redirectToRoute('program_index');
        }
        // Render the form
        return $this->render('program/new.html.twig', [
            "form" => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}", methods={"GET"}, name="show")
     * @return Response
     */
    public function show(Program $program): Response
    {
        return $this->render('program/show.html.twig', [
            'program' => $program,
        ]);
    }

    /**
     * @Route("/{programId}/season/{seasonId}", methods={"GET"}, name="season_show")
     * @ParamConverter("program", class="App\Entity\Program", options={"mapping": {"programId": "slug"}})
     * @ParamConverter("season", class="App\Entity\Season", options={"mapping": {"seasonId": "slug"}})
     * @return Response
     */
    public function showSeason(Program $program, Season $season): Response
    {

        return $this->render('program/season_show.html.twig', [
            'program' => $program,
            'season' => $season,
        ]);
    }

    /**
     * @Route("/{programId}/season/{seasonId}/episode/{episodeId}", methods={"GET", "POST"}, name="episode_show")
     * @ParamConverter("program", class="App\Entity\Program", options={"mapping": {"programId": "slug"}})
     * @ParamConverter("season", class="App\Entity\Season", options={"mapping": {"seasonId": "slug"}})
     * @ParamConverter("episode", class="App\Entity\Episode", options={"mapping": {"episodeId": "slug"}})
     * @return Response
     */
    public function showEpisode(Program $program, Season $season, Episode $episode, Request $request, EntityManagerInterface $em): Response
    {
        // Create form for comment
        $comment = new Comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);
        
        /** @var \App\Entity\User $user */
        $user = $this->getUser();

        if ($form->isSubmitted() && $form->isValid()) {
            
            $comment->setAuthor($user);
            $comment->setEpisode($episode);

            $em->persist($comment);
            $em->flush();

            return $this->redirectToRoute('program_episode_show', [
                'programId' => $program->getSlug(),
                'seasonId' => $season->getSlug(),
                'episodeId' => $episode->getSlug(),
            ]);
        }

        return $this->render('program/episode_show.html.twig', [
            'program' => $program,
            'season' => $season,
            'episode' => $episode,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{slug}/edit", methods={"GET", "POST"}, name="edit")
     * @return Response
     */
    public function edit(Program $program, Request $request, Slugify $slugify, EntityManagerInterface $em) : Response
    {
            $form = $this->createForm(ProgramType::class, $program);
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid()) {
                $em->flush();
    
                return $this->redirectToRoute('program_index', [], Response::HTTP_SEE_OTHER);
            }
    
            return $this->renderForm('program/edit.html.twig', [
                'program' => $program,
                'form' => $form,
            ]);
    }
}
