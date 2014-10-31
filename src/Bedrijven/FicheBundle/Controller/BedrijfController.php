<?php

namespace Bedrijven\FicheBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Bedrijven\FicheBundle\Entity\Bedrijf;
use Bedrijven\FicheBundle\Form\BedrijfType;

/**
 * Bedrijf controller.
 */
class BedrijfController extends Controller {

    /**
     * Show a Bedrijf entry
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getEntityManager();

        $bedrijf = $em->getRepository('BedrijvenFicheBundle:Bedrijf')->find($id);

        if (!$bedrijf) {
            throw $this->createNotFoundException('Unable to find post.');
        }

        $contactpersonen = $em->getRepository('BedrijvenFicheBundle:Contactpersoon')
                ->getContactpersonenForBedrijf($bedrijf->getId());

        return $this->render('BedrijvenFicheBundle:Bedrijf:show.html.twig', array(
                    'bedrijf' => $bedrijf,
                    'contactpersonen' => $contactpersonen
        ));
    }
    
    public function createAction() {
        
        $bedrijf = new Bedrijf();
        $form = $this->createForm(new BedrijfType(), $bedrijf);

        $request = $this->getRequest();
        if ($request->getMethod() == 'POST') {
            $form->submit($request);

            if ($form->isValid()) {
            $em = $this->getDoctrine()
                       ->getEntityManager();
            $em->persist($bedrijf);
            $em->flush();

            return $this->redirect($this->generateUrl('BedrijvenFicheBundle_bedrijf_create'));
        }
        }

        return $this->render('BedrijvenFicheBundle:Page:createbedrijf.html.twig', array(
                    'form' => $form->createView()
        ));
    }
    
    

}
