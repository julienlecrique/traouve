<?php

namespace App\Controller;

use App\Entity\State;
use App\Entity\Traobject;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage()
    {
        $lost = $this->getDoctrine()->getRepository(State::class)->findOneBy(['label'=>State::LOST]);
        $find = $this->getDoctrine()->getRepository(State::class)->findOneBy(['label'=>State::FIND]);
        $traobjectsLost = $this->getDoctrine()->getRepository(Traobject::class)->findLastTraobjectByState($lost, 8);
        $traobjectsFound =$this->getDoctrine()->getRepository(Traobject::class)->findLastTraobjectByState($find, 8);

        return $this->render('default/homepage.html.twig', ['traobjectsLost' => $traobjectsLost, 'traobjectsFound' => $traobjectsFound ]);
    }
}
