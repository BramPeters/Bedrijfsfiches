<?php

namespace Bedrijven\FicheBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Bedrijven\FicheBundle\Entity\Contactpersoon;
use Bedrijven\FicheBundle\Form\ContactpersoonType;

/**
 * Contactpersoon controller.
 */
class ContactpersoonController extends Controller
{
    public function newAction($bedrijf_id)
    {
        $bedrijf = $this->getBedrijf($bedrijf_id);

        $contactpersoon = new Contactpersoon();
        $contactpersoon->setBedrijf($bedrijf);
        $form   = $this->createForm(new ContactpersoonType(), $contactpersoon);

        return $this->render('BedrijvenFicheBundle:Contactpersoon:form.html.twig', array(
            'contactpersoon' => $contactpersoon,
            'form'   => $form->createView()
        ));
    }

    public function createAction($bedrijf_id)
    {
        $bedrijf = $this->getBedrijf($bedrijf_id);

        $contactpersoon  = new Contactpersoon();
        $contactpersoon->setBedrijf($bedrijf);
        $request = $this->getRequest();
        $form    = $this->createForm(new ContactpersoonType(), $contactpersoon);
        $form->submit($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()
                       ->getEntityManager();
            $em->persist($contactpersoon);
            $em->flush();

            return $this->redirect($this->generateUrl('BedrijvenFicheBundle_bedrijf_show', array(
                'id' => $contactpersoon->getBedrijf()->getId())) .
                '#contactpersoon-' . $contactpersoon->getId()
            );
        }

        return $this->render('BedrijvenFicheBundle:Contactpersoon:create.html.twig', array(
            'contactpersoon' => $contactpersoon,
            'form'    => $form->createView()
        ));
    }

    protected function getBedrijf($bedrijf_id)
    {
        $em = $this->getDoctrine()
                    ->getEntityManager();

        $bedrijf = $em->getRepository('BedrijvenFicheBundle:Bedrijf')->find($bedrijf_id);

        if (!$bedrijf) {
            throw $this->createNotFoundException('Unable to find.');
        }

        return $bedrijf;
    }

}