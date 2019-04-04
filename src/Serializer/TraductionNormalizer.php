<?php

namespace App\Serializer;

use App\Entity\Traduction;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class TraductionNormalizer implements NormalizerInterface
{
    /**
     * @param Traduction $object
     * @param null $format
     * @param array $context
     * @return array
     */
    public function normalize($object, $format = null, array $context = [])
    {
        return [
            'en' => $object->getEnGB(),
            'fr' => $object->getFrFR(),
        ];
    }
    public function supportsNormalization($data, $format = null){
        return $data instanceof Traduction and $format === 'truncate';
    }
}