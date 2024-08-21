<?php
namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\Document]
class Transat
{
    #[ODM\Id]
    private $id;

    #[ODM\Field(type: "string")]
    private $nom;

    #[ODM\Field(type: "boolean")]
    private $disponible;

    #[ODM\Field(type: "date", nullable: true)]
    private $heureDeLocation;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function isDisponible(): ?bool
    {
        return $this->disponible;
    }

    public function setDisponible(bool $disponible): self
    {
        $this->disponible = $disponible;

        return $this;
    }

    public function getHeureDeLocation(): ?\DateTime
    {
        return $this->heureDeLocation;
    }

    public function setHeureDeLocation(?\DateTime $heureDeLocation): self
    {
        $this->heureDeLocation = $heureDeLocation;

        return $this;
    }
}