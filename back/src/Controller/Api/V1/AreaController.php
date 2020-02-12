<?php

namespace App\Controller\Api\V1;

use App\Entity\Area;
use App\Repository\AreaRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
* @Route("/api/v1/areas", name="api_v1_areas_")
*/
class AreaController extends AbstractController
{
    /**
     * @Route("/", name="list", methods={"GET"})
     */
    public function list(AreaRepository $areaRepository, SerializerInterface $serializer)
    {
        $areas = $areaRepository->findAll();
        $data = $serializer->normalize($areas, null, ['groups' => 'api_v1_areas']);
        return $this->json($data);
    }

    /**
     * @Route("/{id}", name="show", requirements={"id": "\d+"}, methods={"GET"})
     */
    public function show(Area $area, SerializerInterface $serializer)
    {
        $data = $serializer->normalize($area, null, ['groups' => 'api_v1_areas']);
        return $this->json($data);
    }
}

