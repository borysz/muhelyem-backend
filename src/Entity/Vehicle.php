<?php
// src/Entity/Vehicle.php
namespace App\Entity;

use App\Repository\VehicleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VehicleRepository::class)]
#[ORM\Table(name: 'vehicles')]
class Vehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 10)]
    private $licensePlate; // Rendszám

    #[ORM\Column(type: 'string', length: 100)]
    private $brandModel; // Márka/Típus

    #[ORM\Column(type: 'string', length: 50)]
    private $chassisNumber; // Alvázszám

    #[ORM\Column(type: 'string', length: 50)]
    private $engineCode; // Motorkód

    #[ORM\Column(type: 'integer')]
    private $manufactureYear; // Gyártási év

    #[ORM\Column(type: 'integer', nullable: true)]
    private $engineCapacity; // Hengerűrtartalom (köbcenti)

    #[ORM\Column(type: 'string', length: 20, nullable: true)]
    private $fuelType; // Üzemanyag típus

    #[ORM\Column(type: 'date', nullable: true)]
    private $technicalValidity; // Műszaki érvényessége

    #[ORM\Column(type: 'text', nullable: true)]
    private $notes; // Megjegyzés

    #[ORM\ManyToOne(targetEntity: Contact::class)]
    #[ORM\JoinColumn(name: "contact_id", referencedColumnName: "id", onDelete: "SET NULL", nullable: true)]
    private $contact; // Hozzákapcsolt kapcsolattartó

    // Getters and Setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLicensePlate(): ?string
    {
        return $this->licensePlate;
    }

    public function setLicensePlate(string $licensePlate): self
    {
        $this->licensePlate = $licensePlate;
        return $this;
    }

    public function getBrandModel(): ?string
    {
        return $this->brandModel;
    }

    public function setBrandModel(string $brandModel): self
    {
        $this->brandModel = $brandModel;
        return $this;
    }

    public function getChassisNumber(): ?string
    {
        return $this->chassisNumber;
    }

    public function setChassisNumber(string $chassisNumber): self
    {
        $this->chassisNumber = $chassisNumber;
        return $this;
    }

    public function getEngineCode(): ?string
    {
        return $this->engineCode;
    }

    public function setEngineCode(string $engineCode): self
    {
        $this->engineCode = $engineCode;
        return $this;
    }

    public function getManufactureYear(): ?int
    {
        return $this->manufactureYear;
    }

    public function setManufactureYear(int $manufactureYear): self
    {
        $this->manufactureYear = $manufactureYear;
        return $this;
    }

    public function getEngineCapacity(): ?int
    {
        return $this->engineCapacity;
    }

    public function setEngineCapacity(?int $engineCapacity): self
    {
        $this->engineCapacity = $engineCapacity;
        return $this;
    }

    public function getFuelType(): ?string
    {
        return $this->fuelType;
    }

    public function setFuelType(?string $fuelType): self
    {
        $this->fuelType = $fuelType;
        return $this;
    }

    public function getTechnicalValidity(): ?\DateTimeInterface
    {
        return $this->technicalValidity;
    }

    public function setTechnicalValidity(?\DateTimeInterface $technicalValidity): self
    {
        $this->technicalValidity = $technicalValidity;
        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;
        return $this;
    }

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): self
    {
        $this->contact = $contact;
        return $this;
    }
}
