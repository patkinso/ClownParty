<?php

namespace Clown\PartyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PartyType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('time', 'datetime')
            ->add('location')
            ->add('clowns')
            ->add('events')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Clown\PartyBundle\Entity\Party'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'clown_partybundle_party';
    }
}
