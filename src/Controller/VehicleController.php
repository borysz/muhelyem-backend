<?php
// src/Controller/VehicleController.php
namespace App\Controller;

use App\Entity\Vehicle;
use App\Repository\VehicleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/vehicle')]
class VehicleController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('', methods: ['GET'])]
    public function index(VehicleRepository $vehicleRepository): JsonResponse
    {
        $vehicles = $vehicleRepository->findAll();

        // Az objektumok asszociatív tömbbé alakítása
        $data = array_map(function (Vehicle $vehicle) {
            return [
                'id' => $vehicle->getId(),
                'licensePlate' => $vehicle->getLicensePlate(),
                'brandModel' => $vehicle->getBrandModel(),
                'chassisNumber' => $vehicle->getChassisNumber(),
                'engineCode' => $vehicle->getEngineCode(),
                'manufactureYear' => $vehicle->getManufactureYear(),
                'engineCapacity' => $vehicle->getEngineCapacity(),
                'fuelType' => $vehicle->getFuelType(),
                'technicalValidity' => $vehicle->getTechnicalValidity()?->format('Y-m-d'),
                'notes' => $vehicle->getNotes(),
                'contact' => $vehicle->getContact()?->getId(),
            ];
        }, $vehicles);

        return $this->json($data);
    }

    #[Route('/{id}', methods: ['GET'])]
    public function show(int $id, VehicleRepository $vehicleRepository): JsonResponse
    {
        $vehicle = $vehicleRepository->find($id);
        if (!$vehicle) {
            return $this->json(['message' => 'Vehicle not found'], Response::HTTP_NOT_FOUND);
        }

        $data = [
            'id' => $vehicle->getId(),
            'licensePlate' => $vehicle->getLicensePlate(),
            'brandModel' => $vehicle->getBrandModel(),
            'chassisNumber' => $vehicle->getChassisNumber(),
            'engineCode' => $vehicle->getEngineCode(),
            'manufactureYear' => $vehicle->getManufactureYear(),
            'engineCapacity' => $vehicle->getEngineCapacity(),
            'fuelType' => $vehicle->getFuelType(),
            'technicalValidity' => $vehicle->getTechnicalValidity()?->format('Y-m-d'),
            'notes' => $vehicle->getNotes(),
            'contact' => $vehicle->getContact()?->getId(),
        ];

        return $this->json($data);
    }

    #[Route('', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $vehicle = new Vehicle();
        $vehicle->setLicensePlate($data['licensePlate']);
        $vehicle->setBrandModel($data['brandModel']);
        $vehicle->setChassisNumber($data['chassisNumber']);
        $vehicle->setEngineCode($data['engineCode']);
        $vehicle->setManufactureYear($data['manufactureYear']);
        $vehicle->setEngineCapacity($data['engineCapacity']);
        $vehicle->setFuelType($data['fuelType']);
        $vehicle->setTechnicalValidity(new \DateTime($data['technicalValidity']));
        $vehicle->setNotes($data['notes']);

        $this->entityManager->persist($vehicle);
        $this->entityManager->flush();

        return $this->json(['message' => 'Vehicle created', 'id' => $vehicle->getId()], Response::HTTP_CREATED);
    }

    #[Route('/{id}', methods: ['PUT'])]
    public function update(int $id, Request $request): JsonResponse
    {
        $vehicle = $this->entityManager->getRepository(Vehicle::class)->find($id);
        if (!$vehicle) {
            return $this->json(['message' => 'Vehicle not found'], Response::HTTP_NOT_FOUND);
        }

        $data = json_decode($request->getContent(), true);

        $vehicle->setLicensePlate($data['licensePlate']);
        $vehicle->setBrandModel($data['brandModel']);
        $vehicle->setChassisNumber($data['chassisNumber']);
        $vehicle->setEngineCode($data['engineCode']);
        $vehicle->setManufactureYear($data['manufactureYear']);
        $vehicle->setEngineCapacity($data['engineCapacity']);
        $vehicle->setFuelType($data['fuelType']);
        $vehicle->setTechnicalValidity(new \DateTime($data['technicalValidity']));
        $vehicle->setNotes($data['notes']);

        $this->entityManager->flush();

        return $this->json(['message' => 'Vehicle updated']);
    }

    #[Route('/{id}', methods: ['DELETE'])]
    public function delete(int $id): JsonResponse
    {
        $vehicle = $this->entityManager->getRepository(Vehicle::class)->find($id);
        if (!$vehicle) {
            return $this->json(['message' => 'Vehicle not found'], Response::HTTP_NOT_FOUND);
        }

        $this->entityManager->remove($vehicle);
        $this->entityManager->flush();

        return $this->json(['message' => 'Vehicle deleted']);
    }
}
