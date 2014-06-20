<?php

namespace Clown\ClownBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClownType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('noseSqueakFrequency')
            ->add('laughsGenerated')
            ->add('childrenEaten')
            ->add('clownType')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Clown\ClownBundle\Entity\Clown'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'clown_clownbundle_clown';
    }
}
