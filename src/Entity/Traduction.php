<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Traduction
{
    /**
     * @var string
     *
     * @SerializedName("en_GB")
     */
    private $enGB;
    /**
     * @var string
     *
     * @SerializedName("fr_FR")
     */
    private $frFR;
    public function __construct(string $enGB, string $frFR)
    {
        $this->enGB = $enGB;
        $this->frFR = $frFR;
    }
    public function getEnGB(): string
    {
        return $this->enGB;
    }
    public function getFrFR(): string
    {
        return $this->frFR;
    }
}