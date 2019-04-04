<?php

namespace App\Controller;

use App\Entity\Traduction;
use App\Serializer\TraductionNormalizer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route as Route;
use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class TestController extends AbstractController
{

    /**
     *
     * @Route("/serialize")
     */
    public function test(TraductionNormalizer $traductionNormalizer)
    {
        $traduction = new Traduction('english', 'french');
        $traductionNormalize= $traductionNormalizer->normalize($traduction);
        dump($traductionNormalize);
        return new Response();
    }


    /**
     *
     * @Route("/deserialize")
     */
    public function test2(DenormalizerInterface $denormalizer, DecoderInterface $decoder)
    {


        $data = '{
              "en_GB": "ready-to-wear/jackets/leather",
              "fr_FR": "pret-a-porter/vestes/vestes-en-cuir"
            }';
        $array = $decoder->decode($data,'json');
        $traduction = $denormalizer->denormalize($array, Traduction::class);

        dump($traduction);
        return new Response();
    }
}