<?php

namespace Bedrijven\FicheBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Bedrijven\FicheBundle\Entity\Contact;
use Bedrijven\FicheBundle\Form\ContactType;

class PageController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()
                ->getEntityManager();

        $bedrijven = $em->getRepository('BedrijvenFicheBundle:Bedrijf')
                ->getLatestBedrijven();

        return $this->render('BedrijvenFicheBundle:Page:index.html.twig', array(
                    'bedrijven' => $bedrijven
        ));
    }

    public function createbedrijfAction() {
        $bedrijf = new Bedrijf();
        $form = $this->createForm(new BedrijfType(), $bedrijf);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                // Perform some action, such as sending an email
                // Redirect - This is important to prevent users re-posting
                // the form if they refresh the page
                return $this->redirect($this->generateUrl('BedrijvenFicheBundle_bedrijf_create'));
            }
        }

        return $this->render('BedrijvenFicheBundle:Page:createbedrijf.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    public function aboutAction() {
        return $this->render('BedrijvenFicheBundle:Page:about.html.twig');
    }

    public function contactAction() {
        $contact = new Contact();
        $form = $this->createForm(new ContactType(), $contact);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                // Perform some action, such as sending an email
                // Redirect - This is important to prevent users re-posting
                // the form if they refresh the page
                return $this->redirect($this->generateUrl('BedrijvenFicheBundle_contact'));
            }
        }

        return $this->render('BedrijvenFicheBundle:Page:contact.html.twig', array(
                    'form' => $form->createView()
        ));
    }

}
