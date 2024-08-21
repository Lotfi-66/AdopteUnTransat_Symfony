<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    #[Route('/', name: 'reservation_index')]
    public function index(): Response
    {
        // Logique pour récupérer les transats disponibles
        $transats = $this->getTransats();

        return $this->render('reservation/index.html.twig', [
            'transats' => $transats,
        ]);
    }

    #[Route('/login', name: 'reservation_login')]
    public function login(Request $request): Response
    {
        // Logique pour la connexion
        return $this->render('reservation/login.html.twig');
    }

    #[Route('/transats', name: 'reservation_transats')]
    public function transats(): Response
    {
        // Logique pour afficher les transats
        $transats = $this->getTransats();

        return $this->render('reservation/transats.html.twig', [
            'transats' => $transats,
        ]);
    }

    private function getTransats()
    {
        // Simuler des transats pour l'exemple
        return array_fill(0, 4, array_fill(0, 4, 'Disponible'));
    }
}