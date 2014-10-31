<?php

namespace Bedrijven\FicheBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Bedrijven\FicheBundle\Entity\Bedrijf;

class BedrijfFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        //Eerste bedrijf
        $bedrijf1 = new Bedrijf();
        $bedrijf1->setName('Bedrijf A');
        $bedrijf1->setAdress('Straatlaan 123, 8000 Brugge');
        $bedrijf1->setTags('symfony2, php, developer, html');
        $bedrijf1->setCreated(new \DateTime());
        $bedrijf1->setUpdated($bedrijf1->getCreated());
        $manager->persist($bedrijf1);
        
        //Tweede bedrijf
        $bedrijf2 = new Bedrijf();
        $bedrijf2->setName('Bedrijf B');
        $bedrijf2->setAdress('Laanstraat 321, 8400 Oostende');
        $bedrijf2->setTags('schoenen, sleutels, leerbewerking');
        $bedrijf2->setCreated(new \DateTime());
        $bedrijf2->setUpdated($bedrijf2->getCreated());
        $manager->persist($bedrijf2);

        $manager->flush();
        
        $this->addReference('bedrijf-1', $bedrijf1);
        $this->addReference('bedrijf-2', $bedrijf2);
    }
    
    public function getOrder()
    {
        return 1;
    }

}