<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin_dashboard')]
    public function dashboard(): Response
    {
        // Logique pour récupérer les réservations
        $reservations = $this->getReservations();

        return $this->render('admin/dashboard.html.twig', [
            'reservations' => $reservations,
        ]);
    }

    private function getReservations()
    {
        // Simuler des réservations pour l'exemple
        return [
            ['client' => 'John Doe', 'transat' => '1A', 'heure' => '10:00-13:00'],
            ['client' => 'Jane Smith', 'transat' => '2B', 'heure' => '11:00-14:00'],
        ];
    }
}