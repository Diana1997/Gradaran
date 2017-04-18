<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\BrowserKit\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AdminBundle\Entity\Category;
use AdminBundle\Entity\Book;

class DefaultController extends Controller
{
    /**
    * @Route("/index/{slug}", defaults={"slug"="1"}, name="index")
    * @Template()
    */
    public function indexAction($slug, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $fakultets = $em->getRepository("AdminBundle:Fakultet")->findAll();

        $ambionner = $em->getRepository("AdminBundle:Ambion")->findAmbionByFakultetId($slug);

        $mId = $em->getRepository("AdminBundle:Ambion")->getIdByAmbionName($slug);
        $masnagitutyun = $em->getRepository("AdminBundle:Masnagitutyun")->findMasnagitutyunByAmbionId($mId);


        $bId = $em->getRepository("AdminBundle:Masnagitutyun")->getIdByMasnagitutyunName($slug);
        $books = $em->getRepository("AdminBundle:Book")->findBookByMasnagitutyunId($bId);
        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate($books, $this->get('request')->query->get('page', 1), 2);

        $facts = $em->getRepository("AdminBundle:Fact")->findAll();
        return $this->render("AppBundle:Page:index.html.twig", array(
           // "categories" => $categories,
            "fakultets" => $fakultets,
            "ambionner" => $ambionner,
            "masnagitutyunner" => $masnagitutyun,
           // "slug" => $slug,
            "books" => $pagination,
            "facts" => $facts,
        ));
    }

    /**
     * @Route("/show/{slugBook}", name="show")
     */
    public function showAction($slugBook)
    {
        $em = $this->getDoctrine()->getManager();
        $path = $em->getRepository("AdminBundle:Book")->findPathByBookId($slugBook);
       //print_r($path);
       // exit;
        return $this->render("AppBundle:Page:show.html.twig", array(
            "paths" => $path,
        ));

    }


}
