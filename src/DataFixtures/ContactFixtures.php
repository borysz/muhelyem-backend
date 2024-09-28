<?php
namespace App\DataFixtures;

use App\Entity\Contact;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ContactFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $contacts = [
            [
                'name' => 'John Doe',
                'phone_number' => '+36 30 123 4567',
                'email' => 'john.doe@example.com',
                'tax_number' => '12345678-1-12',
                'company_name' => 'Doe Enterprises',
                'postal_code' => '1234',
                'city' => 'Budapest',
                'street' => 'Main Street',
                'house_number' => '12A',
            ],
            [
                'name' => 'Jane Smith',
                'phone_number' => '+36 30 987 6543',
                'email' => 'jane.smith@example.com',
                'tax_number' => '87654321-1-34',
                'company_name' => 'Smith Solutions',
                'postal_code' => '5678',
                'city' => 'Debrecen',
                'street' => 'Second Avenue',
                'house_number' => '34B',
            ],
            [
                'name' => 'Alice Johnson',
                'phone_number' => '+36 30 555 1234',
                'email' => 'alice.johnson@example.com',
                'tax_number' => '23456789-1-56',
                'company_name' => 'Johnson Consulting',
                'postal_code' => '9101',
                'city' => 'Szeged',
                'street' => 'Third Boulevard',
                'house_number' => '56C',
            ],
        ];

        foreach ($contacts as $key => $data) {
            $contact = new Contact();
            $contact->setName($data['name'])
                ->setPhoneNumber($data['phone_number'])
                ->setEmail($data['email'])
                ->setTaxNumber($data['tax_number'])
                ->setCompanyName($data['company_name'])
                ->setPostalCode($data['postal_code'])
                ->setCity($data['city'])
                ->setStreet($data['street'])
                ->setHouseNumber($data['house_number']);

            // Hivatkozás létrehozása
            $this->setReference('contact_' . ($key + 1), $contact);

            $manager->persist($contact);
        }

        $manager->flush();
    }
}
