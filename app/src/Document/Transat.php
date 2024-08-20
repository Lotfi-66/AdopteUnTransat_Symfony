<?php 

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/**
 * @MongoDB\Document
 */
class Transat
{
    /**
     * @MongoDB\Id
     */
    private $id;

    /**
     * @MongoDB\Field(type="int")
     */
    private $ligne;

    /**
     * @MongoDB\Field(type="int")
     */
    private $colonne;

    /**
     * @MongoDB\Field(type="bool")
     */
    private $disponible;

    /**
     * @MongoDB\Field(type="date", nullable=true)
     */
    private $heureDeLocation;

    // Ajoutez les getters et setters ici
}