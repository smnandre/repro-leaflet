<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\UX\Map\Bridge\Leaflet\LeafletOptions;
use Symfony\UX\Map\Bridge\Leaflet\Option\TileLayer;
use Symfony\UX\Map\Map;
use Symfony\UX\Map\Point;

class MapController extends AbstractController
{
    #[Route('/')]
    #[Route('/map', name: 'app_map')]
    public function index(): Response
    {
        $map = (new Map('default'))
            ->center(new Point(45.7500, 4.8500))
            ->zoom(8);

        $map->options(new LeafletOptions(
            tileLayer: new TileLayer(
                'https://tile.openstreetmap.org/{z}/{x}/{y}.png',
                '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
            )));

        return $this->render('map/index.html.twig', [
            'map' => $map,
        ]);
    }
}
