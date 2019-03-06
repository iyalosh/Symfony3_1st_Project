<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Armoires;
use AppBundle\Entity\Etageres;
use AppBundle\Form\ArmoiresType;
use AppBundle\Form\EtageresType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/etageres/new", name="etageres_new")
     */
    public function newEtageresAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(EtageresType::class, $etageres = new Etageres());

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em->persist($etageres);
            $em->flush();
        }

        return $this->render('form.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/armoires/new", name="armoires_new")
     */
    public function newArmoiresAction(Request $request){

        $form = $this->createForm(ArmoiresType::class, $armoires = new Armoires());

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($armoires);
            $em->flush();
        }

        return $this->render('form.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/livres/{auteur}", name="livres_autheur")
     */
    public function testAction($auteur, Request $request){

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('AppBundle:Armoires');

        return $this->render('results.html.twig', array('armoires' => $repository->getArmoireByName($auteur)));
    }
}
