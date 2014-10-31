<?php

namespace Bedrijven\FicheBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Bedrijven\FicheBundle\Entity\Contactpersoon;
use Bedrijven\FicheBundle\Entity\Bedrijf;

class ContactpersoonFixtures extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $contactpersoon = new Contactpersoon();
        $contactpersoon->setUser('Abraham Braems');
        $contactpersoon->setTelnumber('050 33 22 11');
        $contactpersoon->setBedrijf($manager->merge($this->getReference('bedrijf-1')));
        $manager->persist($contactpersoon);

        $contactpersoon = new Contactpersoon();
        $contactpersoon->setUser('Charlotte Desmet');
        $contactpersoon->setTelnumber('050 44 55 66');
        $contactpersoon->setBedrijf($manager->merge($this->getReference('bedrijf-1')));
        $manager->persist($contactpersoon);

        $contactpersoon = new Contactpersoon();
        $contactpersoon->setUser('Evelien Flyghers');
        $contactpersoon->setTelnumber('050 77 88 99');
        $contactpersoon->setBedrijf($manager->merge($this->getReference('bedrijf-2')));
        $manager->persist($contactpersoon);

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}