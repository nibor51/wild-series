<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Form\SearchProgramFormType;

class EmbeddingController extends AbstractController
{
    public function searchProgram(Request $request)
    {
        $form = $this->createForm(SearchProgramFormType::class);
        $form->handleRequest($request);

        return [
            'form' => $form->createView(),
        ];
    }
}