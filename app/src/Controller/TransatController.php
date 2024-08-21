<?php

namespace App\Controller;

use App\Document\Transat;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class TransatController extends AbstractController
{
    #[Route("/transats", name: "transat_index")]
    public function index(DocumentManager $dm): Response
    {
        $transats = $dm->getRepository(Transat::class)->findAll();
        return $this->render('transat/index.html.twig', ['transats' => $transats]);
    }

    #[Route("/transats/reserver/{id}", name: "transat_reserver")]
    public function reserver(DocumentManager $dm, string $id): Response
    {
        $transat = $dm->getRepository(Transat::class)->find($id);

        if (!$transat) {
            throw $this->createNotFoundException('Transat non trouvé.');
        }

        if ($transat->isDisponible()) {
            $transat->setDisponible(false);
            $transat->setHeureDeLocation(new \DateTime());
            $dm->flush();
            $this->addFlash('success', 'Transat réservé avec succès!');
        } else {
            $this->addFlash('error', 'Transat non disponible.');
        }

        return $this->redirectToRoute('transat_index');
    }
}