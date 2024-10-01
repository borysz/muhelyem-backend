<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/product', name: 'app_product')]
class ProductController extends AbstractCrudController
{
    /*public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ProductController.php',
        ]);
    }*/

    public function __construct(private EntityManagerInterface $entityManager) {}

    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    //#[Route('', methods: ['GET'])]
    //public function index(): JsonResponse
    //{
        /*$products = $this->entityManager
            ->getRepository(Product::class)
            ->createQueryBuilder('p')
            ->getQuery()
            ->getArrayResult();

        return $this->json($products); */

        // Lekérdezzük az összes terméket
       // $products = $this->entityManager->getRepository(Product::class)->findAll();

        /*// Asszociatív tömb létrehozása a termékadatok számára
        $productData = [];
        foreach ($products as $product) {
            // Reflection osztály használata
            $reflect = new \ReflectionClass($product);
            $properties = $reflect->getProperties();

            $item = [];
            foreach ($properties as $property) {
                $property->setAccessible(true); // Készítsük el az elérést a privát mezőkhöz
                $item[$property->getName()] = $property->getValue($product);
            }
            $productData[] = $item; // Hozzáadjuk az asszociatív tömböt a fő tömbhöz
        } */

        // Asszociatív tömb létrehozása a termékadatok számára
       // $productData = [];

       // foreach ($products as $product) {
            // Az asszociatív tömb létrehozása a getter metódusok segítségével
       //     $item = [
       //         'id' => $product->getId(),
       //         'name' => $product->getName(),
       //         'price' => $product->getPrice(),
       //     ];
       //     $productData[] = $item; // Hozzáadjuk az elemet a fő tömbhöz
       // }

        // Visszaadjuk az eredményeket JSON formátumban
        //return new JsonResponse($productData, Response::HTTP_OK);
   // }

    #[Route('/{id}', methods: ['GET'])]
    public function show(int $id): JsonResponse
    {
        // Lekérdezzük az adott ID-jú terméket
        $product = $this->entityManager->getRepository(Product::class)->find($id);

        // Ellenőrizzük, hogy létezik-e a termék
        if (!$product) {
            return new JsonResponse(['message' => 'Product not found'], Response::HTTP_NOT_FOUND);
        }

        // Az entitás mezőinek asszociatív tömbbé alakítása
        $productData = [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'price' => $product->getPrice(),
        ];

        return new JsonResponse($productData, Response::HTTP_OK);
    }

    /*#[Route('', methods: ['GET'])]
    public function index(): Response
    {
        $products = $this->entityManager->getRepository(Product::class)->findAll();
        return $this->json($products); 
        
    } */
}
