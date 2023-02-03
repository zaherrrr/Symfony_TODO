<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class StudentController extends AbstractController {

    // #[Rooute('/welcome')]
    // public function index(){
    //     return new Response("Bonjour 3A19/3A20");
    // }

    #[Route('/',name:'zaher')]
    public function index(){
            $var = "<script>alert(\"Bonjours mes etudiants \")</script>";

        return new Response($var);
    }
    
    #[Route('/index')]
    public function index_deux() : Response
    {
        return $this->index();
    }
    
    #[Route('/welcome/{name}/{para2}')]
    public function indexPara($name,$para2){
        return new Response("Bonjour ".$name.' '.$para2);
    }

}
?>