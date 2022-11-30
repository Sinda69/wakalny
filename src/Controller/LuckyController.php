<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController extends AbstractController 
{
    #[Route('/lucky/number', name: 'app_index')]
    public function number(): Response
    {
        return $this->render('lucky/index.html.twig', [
            
        ]);
    }
}
