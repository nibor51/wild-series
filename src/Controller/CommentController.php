<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Comment;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class CommentController extends AbstractController
{
    #[Route('/comment/{id}', name: 'comment_delete')]
    public function delete(Request $request, Comment $comment, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$comment->getId(), $request->request->get('_token'))) {
            $em->remove($comment);
            $em->flush();
        }
        return $this->redirectToRoute('program_index', [], Response::HTTP_SEE_OTHER);
    }
}


