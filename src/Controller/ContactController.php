<?php

// src/Controller/ContactController.php
namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/api/contact')]
class ContactController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('', methods: ['GET'])]
    public function index(ContactRepository $contactRepository): JsonResponse
    {
        $contacts = $contactRepository->findAll();

        // Az objektumok asszociatív tömbbé alakítása
        $data = array_map(function (Contact $contact) {
            return [
                'id' => $contact->getId(),
                'name' => $contact->getName(),
                'phoneNumber' => $contact->getPhoneNumber(),
                'email' => $contact->getEmail(),
                'taxNumber' => $contact->getTaxNumber(),
                'companyName' => $contact->getCompanyName(),
                'postalCode' => $contact->getPostalCode(),
                'city' => $contact->getCity(),
                'street' => $contact->getStreet(),
                'houseNumber' => $contact->getHouseNumber(),
            ];
        }, $contacts);

        return $this->json($data);
    }

    #[Route('/{id}', methods: ['GET'])]
    public function show(int $id, ContactRepository $contactRepository): JsonResponse
    {
        $contact = $contactRepository->find($id);
        if (!$contact) {
            return $this->json(['message' => 'Contact not found'], Response::HTTP_NOT_FOUND);
        }

        $data = [
            'id' => $contact->getId(),
            'name' => $contact->getName(),
            'phoneNumber' => $contact->getPhoneNumber(),
            'email' => $contact->getEmail(),
            'taxNumber' => $contact->getTaxNumber(),
            'companyName' => $contact->getCompanyName(),
            'postalCode' => $contact->getPostalCode(),
            'city' => $contact->getCity(),
            'street' => $contact->getStreet(),
            'houseNumber' => $contact->getHouseNumber(),
        ];

        return $this->json($data);
    }

    #[Route('', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $contact = new Contact();
        $contact->setName($data['name']);
        $contact->setPhoneNumber($data['phoneNumber']);
        $contact->setEmail($data['email']);
        $contact->setTaxNumber($data['taxNumber']);
        $contact->setCompanyName($data['companyName']);
        $contact->setPostalCode($data['postalCode']);
        $contact->setCity($data['city']);
        $contact->setStreet($data['street']);
        $contact->setHouseNumber($data['houseNumber']);

        $this->entityManager->persist($contact);
        $this->entityManager->flush();

        return $this->json(['message' => 'Contact created', 'id' => $contact->getId()], Response::HTTP_CREATED);
    }

    #[Route('/{id}', methods: ['PUT'])]
    public function update(int $id, Request $request): JsonResponse
    {
        $contact = $this->entityManager->getRepository(Contact::class)->find($id);
        if (!$contact) {
            return $this->json(['message' => 'Contact not found'], Response::HTTP_NOT_FOUND);
        }

        $data = json_decode($request->getContent(), true);

        $contact->setName($data['name']);
        $contact->setPhoneNumber($data['phoneNumber']);
        $contact->setEmail($data['email']);
        $contact->setTaxNumber($data['taxNumber']);
        $contact->setCompanyName($data['companyName']);
        $contact->setPostalCode($data['postalCode']);
        $contact->setCity($data['city']);
        $contact->setStreet($data['street']);
        $contact->setHouseNumber($data['houseNumber']);

        $this->entityManager->flush();

        return $this->json(['message' => 'Contact updated']);
    }

    #[Route('/{id}', methods: ['DELETE'])]
    public function delete(int $id): JsonResponse
    {
        $contact = $this->entityManager->getRepository(Contact::class)->find($id);
        if (!$contact) {
            return $this->json(['message' => 'Contact not found'], Response::HTTP_NOT_FOUND);
        }

        $this->entityManager->remove($contact);
        $this->entityManager->flush();

        return $this->json(['message' => 'Contact deleted']);
    }
}
