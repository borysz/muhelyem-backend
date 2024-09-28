<?php
namespace App\DataFixtures;

use App\Entity\Vehicle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VehicleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $vehicles = [
            ['license_plate' => 'ABC123', 'brand_model' => 'Toyota Corolla', 'chassis_number' => '1HGBH41JXMN109186', 'engine_code' => '1NZ-FE', 'manufacture_year' => 2020, 'engine_capacity' => 1800, 'fuel_type' => 'Gasoline', 'technical_validity' => '2025-12-31', 'notes' => 'Well maintained', 'contact_id' => 1],
            ['license_plate' => 'XYZ789', 'brand_model' => 'Ford Focus', 'chassis_number' => '1FMCU9J99DUB22451', 'engine_code' => '1.6L', 'manufacture_year' => 2019, 'engine_capacity' => 1600, 'fuel_type' => 'Gasoline', 'technical_validity' => '2024-06-30', 'notes' => 'New tires', 'contact_id' => 2],
            ['license_plate' => 'LMN456', 'brand_model' => 'Honda Civic', 'chassis_number' => '2HGFG3B53GH201456', 'engine_code' => 'K20Z3', 'manufacture_year' => 2018, 'engine_capacity' => 2000, 'fuel_type' => 'Gasoline', 'technical_validity' => '2023-09-15', 'notes' => 'Accident-free', 'contact_id' => 3],
            ['license_plate' => 'QWE321', 'brand_model' => 'BMW X5', 'chassis_number' => '5UXKR0C53E0D42588', 'engine_code' => 'N55B30', 'manufacture_year' => 2021, 'engine_capacity' => 3000, 'fuel_type' => 'Diesel', 'technical_validity' => '2026-05-20', 'notes' => 'Luxury SUV', 'contact_id' => 1],
            ['license_plate' => 'RTY654', 'brand_model' => 'Audi A4', 'chassis_number' => 'WAUFFAFL0AN123456', 'engine_code' => '2.0 TFSI', 'manufacture_year' => 2020, 'engine_capacity' => 2000, 'fuel_type' => 'Gasoline', 'technical_validity' => '2025-01-01', 'notes' => 'Sporty design', 'contact_id' => 2],
            ['license_plate' => 'UYT987', 'brand_model' => 'Mercedes C-Class', 'chassis_number' => 'WDDGF8AB8DA123456', 'engine_code' => 'M274', 'manufacture_year' => 2022, 'engine_capacity' => 2500, 'fuel_type' => 'Gasoline', 'technical_validity' => '2026-07-12', 'notes' => 'Excellent condition', 'contact_id' => 3],
            ['license_plate' => 'FGH543', 'brand_model' => 'Nissan Altima', 'chassis_number' => '1N4AL3AP1EC123456', 'engine_code' => 'QR25DE', 'manufacture_year' => 2019, 'engine_capacity' => 2500, 'fuel_type' => 'Gasoline', 'technical_validity' => '2024-03-15', 'notes' => 'Good mileage', 'contact_id' => 1],
            ['license_plate' => 'JKL012', 'brand_model' => 'Chevrolet Malibu', 'chassis_number' => '1G1ZB5ST6BF123456', 'engine_code' => 'LAF', 'manufacture_year' => 2018, 'engine_capacity' => 2000, 'fuel_type' => 'Gasoline', 'technical_validity' => '2023-11-01', 'notes' => 'Clean title', 'contact_id' => 2],
            ['license_plate' => 'OPQ678', 'brand_model' => 'Kia Optima', 'chassis_number' => '5XXGT4L39EG123456', 'engine_code' => 'G4KJ', 'manufacture_year' => 2020, 'engine_capacity' => 2400, 'fuel_type' => 'Gasoline', 'technical_validity' => '2025-04-20', 'notes' => 'Great fuel economy', 'contact_id' => 3],
            ['license_plate' => 'ZXC234', 'brand_model' => 'Hyundai Sonata', 'chassis_number' => '5NPE34AF8FH123456', 'engine_code' => 'G4NC', 'manufacture_year' => 2021, 'engine_capacity' => 2300, 'fuel_type' => 'Gasoline', 'technical_validity' => '2026-09-30', 'notes' => 'Family-friendly', 'contact_id' => 1],
            // 20 more entries...
            ['license_plate' => 'SDF123', 'brand_model' => 'Subaru Outback', 'chassis_number' => '4S4BSALC8F1234567', 'engine_code' => 'FB25', 'manufacture_year' => 2017, 'engine_capacity' => 2500, 'fuel_type' => 'Gasoline', 'technical_validity' => '2023-10-10', 'notes' => 'All-wheel drive', 'contact_id' => 2],
            ['license_plate' => 'GHJ456', 'brand_model' => 'Mazda 3', 'chassis_number' => 'JM1BN1L75F1234567', 'engine_code' => 'SKYACTIV-G', 'manufacture_year' => 2020, 'engine_capacity' => 2000, 'fuel_type' => 'Gasoline', 'technical_validity' => '2025-12-01', 'notes' => 'Compact and efficient', 'contact_id' => 3],
            ['license_plate' => 'VBN789', 'brand_model' => 'Volvo XC60', 'chassis_number' => 'YV4902CZ5F1234567', 'engine_code' => 'D4204T', 'manufacture_year' => 2019, 'engine_capacity' => 2000, 'fuel_type' => 'Diesel', 'technical_validity' => '2024-08-20', 'notes' => 'Safe and reliable', 'contact_id' => 1],
            ['license_plate' => 'XCV321', 'brand_model' => 'Porsche 911', 'chassis_number' => 'WP0AA2A96LS123456', 'engine_code' => 'H6', 'manufacture_year' => 2021, 'engine_capacity' => 3000, 'fuel_type' => 'Gasoline', 'technical_validity' => '2026-05-15', 'notes' => 'Luxury sports car', 'contact_id' => 2],
            ['license_plate' => 'QAZ654', 'brand_model' => 'Jaguar F-Type', 'chassis_number' => 'SAJWA6EF3J8Z12345', 'engine_code' => 'AJ133', 'manufacture_year' => 2020, 'engine_capacity' => 5000, 'fuel_type' => 'Gasoline', 'technical_validity' => '2025-11-30', 'notes' => 'High performance', 'contact_id' => 3],
            ['license_plate' => 'WSX987', 'brand_model' => 'Chrysler Pacifica', 'chassis_number' => '2C4RC1EG7HR123456', 'engine_code' => 'PENTASTAR', 'manufacture_year' => 2018, 'engine_capacity' => 3600, 'fuel_type' => 'Gasoline', 'technical_validity' => '2023-07-22', 'notes' => 'Family van', 'contact_id' => 1],
            ['license_plate' => 'EDC432', 'brand_model' => 'Dodge Ram 1500', 'chassis_number' => '1C6RR7LT6HS123456', 'engine_code' => 'HEMI', 'manufacture_year' => 2019, 'engine_capacity' => 5700, 'fuel_type' => 'Gasoline', 'technical_validity' => '2024-01-05', 'notes' => 'Powerful truck', 'contact_id' => 2],
            ['license_plate' => 'RFV098', 'brand_model' => 'Toyota RAV4', 'chassis_number' => '2T3BFREV2HW123456', 'engine_code' => '2AR-FE', 'manufacture_year' => 2021, 'engine_capacity' => 2500, 'fuel_type' => 'Gasoline', 'technical_validity' => '2026-08-10', 'notes' => 'Compact SUV', 'contact_id' => 3],
            ['license_plate' => 'TGB654', 'brand_model' => 'Kia Soul', 'chassis_number' => 'KNDJP3A55H7012345', 'engine_code' => 'G4KJ', 'manufacture_year' => 2020, 'engine_capacity' => 2000, 'fuel_type' => 'Gasoline', 'technical_validity' => '2025-09-12', 'notes' => 'Unique design', 'contact_id' => 1],
            ['license_plate' => 'HJK321', 'brand_model' => 'Hyundai Tucson', 'chassis_number' => '5NMZU3LB7KH123456', 'engine_code' => 'G4FD', 'manufacture_year' => 2019, 'engine_capacity' => 2000, 'fuel_type' => 'Gasoline', 'technical_validity' => '2024-12-20', 'notes' => 'Reliable SUV', 'contact_id' => 2],
            ['license_plate' => 'ZXC098', 'brand_model' => 'Nissan Rogue', 'chassis_number' => '5N1AT2MV7HC123456', 'engine_code' => 'MR20DE', 'manufacture_year' => 2020, 'engine_capacity' => 2500, 'fuel_type' => 'Gasoline', 'technical_validity' => '2025-04-15', 'notes' => 'Comfortable ride', 'contact_id' => 3],
            ['license_plate' => 'RTY567', 'brand_model' => 'Chevrolet Tahoe', 'chassis_number' => '1GNSK2CK3GR123456', 'engine_code' => 'L83', 'manufacture_year' => 2021, 'engine_capacity' => 5300, 'fuel_type' => 'Gasoline', 'technical_validity' => '2026-11-30', 'notes' => 'Spacious SUV', 'contact_id' => 1],
            ['license_plate' => 'FDS890', 'brand_model' => 'Ford Explorer', 'chassis_number' => '1FM5K8D89JGB12345', 'engine_code' => '2.3L', 'manufacture_year' => 2020, 'engine_capacity' => 2300, 'fuel_type' => 'Gasoline', 'technical_validity' => '2025-08-10', 'notes' => 'Versatile SUV', 'contact_id' => 2],
            ['license_plate' => 'GHJ456', 'brand_model' => 'Subaru Forester', 'chassis_number' => 'JF2SJADC4F1234567', 'engine_code' => 'FB25', 'manufacture_year' => 2019, 'engine_capacity' => 2500, 'fuel_type' => 'Gasoline', 'technical_validity' => '2024-03-10', 'notes' => 'Good for off-road', 'contact_id' => 3],
            ['license_plate' => 'MNB123', 'brand_model' => 'Volkswagen Jetta', 'chassis_number' => '3VWD17AJ7KM123456', 'engine_code' => 'EA888', 'manufacture_year' => 2018, 'engine_capacity' => 2000, 'fuel_type' => 'Gasoline', 'technical_validity' => '2023-05-20', 'notes' => 'Compact sedan', 'contact_id' => 1],
            ['license_plate' => 'QWE789', 'brand_model' => 'Mazda CX-5', 'chassis_number' => 'JM3KFBCY6J1234567', 'engine_code' => 'SKYACTIV-G', 'manufacture_year' => 2020, 'engine_capacity' => 2000, 'fuel_type' => 'Gasoline', 'technical_validity' => '2025-07-25', 'notes' => 'Stylish SUV', 'contact_id' => 2],
            ['license_plate' => 'ZXCVBN', 'brand_model' => 'Kia Sportage', 'chassis_number' => 'KNDPM3AC2H7134567', 'engine_code' => 'G4KD', 'manufacture_year' => 2021, 'engine_capacity' => 2400, 'fuel_type' => 'Gasoline', 'technical_validity' => '2026-09-09', 'notes' => 'Great performance', 'contact_id' => 3],
            ['license_plate' => 'ASD123', 'brand_model' => 'Porsche Macan', 'chassis_number' => 'WP1AA2A5XJLA12345', 'engine_code' => '2.0L', 'manufacture_year' => 2020, 'engine_capacity' => 2000, 'fuel_type' => 'Gasoline', 'technical_validity' => '2025-10-11', 'notes' => 'Luxury SUV', 'contact_id' => 1],
        ];

        foreach ($vehicles as $data) {
            $vehicle = new Vehicle();
            $vehicle->setLicensePlate($data['license_plate'])
                ->setBrandModel($data['brand_model'])
                ->setChassisNumber($data['chassis_number'])
                ->setEngineCode($data['engine_code'])
                ->setManufactureYear($data['manufacture_year'])
                ->setEngineCapacity($data['engine_capacity'])
                ->setFuelType($data['fuel_type'])
                ->setTechnicalValidity(new \DateTime($data['technical_validity']))
                ->setNotes($data['notes'])
                ->setContact($this->getReference('contact_'.$data['contact_id'])); // Assuming you have created Contact fixtures

            $manager->persist($vehicle);
        }

        $manager->flush();
    }
}
