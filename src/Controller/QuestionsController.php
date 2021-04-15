<?php

namespace App\Controller;

use App\Entity\Questions;
use App\Entity\Quizz;
use App\Form\QuestionsType;
use App\Repository\QuestionsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\QuizzRepository;

/**
 * @Route("/questions")
 */
class QuestionsController extends AbstractController
{
    /**
     * @Route("/", name="questions_index", methods={"GET"})
     */
    public function index(QuestionsRepository $questionsRepository): Response
    {
        return $this->render('questions/index.html.twig', [
            'questions' => $questionsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="questions_new", methods={"GET","POST"})
     */
    public function new(Request $request,QuizzRepository $QuizzRepository): Response{
        
        $question = new Questions();
        if  ($request->isMethod('POST'))
        
        {

            $choix1=$request->request->get('choix1');
            $choix2=$request->request->get('choix2');
            $choix3=$request->request->get('choix3');
            $choix = $choix1.";".$choix2.";".$choix3;
    $titre = $request ->request->get('titre');

    $reponse = $request ->request->get('reponse');
    $quizzid = $request ->request->get('quizz');
    $quizz = $this->getDoctrine()
    ->getRepository(Quizz::class)
    ->find($quizzid);
   
        
        $question -> setTitre( $titre);
        $question ->setChoix($choix);
        $question ->setReponse($reponse);
        $question ->setQuizz($quizz);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($question);
        

            // actually executes the queries (i.e. the INSERT query)
            
            $entityManager->flush();
    
            return $this->redirectToRoute('questions_index');

        }
        $form=$this->createForm(QuestionsType::class ,$question);
        $form->handleRequest ( $request);
        return $this->render('questions/new.html.twig', [
            'question' => $question,
            'Quizzs' => $QuizzRepository->findAll(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="questions_show", methods={"GET"})
     */
    public function show(Questions $question): Response
    {
        return $this->render('questions/show.html.twig', [
            'question' => $question,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="questions_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Questions $question): Response
    {
        $form = $this->createForm(QuestionsType::class, $question);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('questions_index');
        }

        return $this->render('questions/edit.html.twig', [
            'question' => $question,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="questions_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Questions $question): Response
    {
        if ($this->isCsrfTokenValid('delete'.$question->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($question);
            $entityManager->flush();
        }

        return $this->redirectToRoute('questions_index');
    }

}
