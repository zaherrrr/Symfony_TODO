<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeacherController extends AbstractController
{
    #[Route('/show/{name}', name: 'show_name')]
    public function showTeacher($name): Response
    {
        // return new Response("Bonjour ".$name);
        return $this->render('teacher/showTeacher.html.twig', ['name' => $name,]);
    }

}
