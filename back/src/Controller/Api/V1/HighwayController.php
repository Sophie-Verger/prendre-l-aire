<?php

namespace App\Controller\Api\V1;

use App\Entity\Destination;
use App\Repository\DestinationRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/api/v1/highways", name="api_v1_highways_")
 */
class HighwayController extends AbstractController
{
    /**
     * @Route("/", name="list", methods={"GET"})
     */
    public function list(DestinationRepository $destinationRepository, SerializerInterface $serializer)
    {
        $highways = $destinationRepository->findAll();
        $data = $serializer->normalize($highways, null, ['groups' => 'api_v1_highways']);
        return $this->json($data);
    }

    /**
     * @Route("/{id}", name="show", requirements={"id": "\d+"}, methods={"GET"})
     */
    public function show(Destination $destination, SerializerInterface $serializer)
    {
        $data = $serializer->normalize($destination, null, ['groups' => 'api_v1_highways']);
        return $this->json($data);
    }
}
