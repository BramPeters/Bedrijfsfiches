<?php

namespace Bedrijven\FicheBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class BedrijfType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('adress');
        $builder->add('tags');
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return 'bedrijven_fichebundle_bedrijf';
    }

}