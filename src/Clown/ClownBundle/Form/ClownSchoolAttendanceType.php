<?php

namespace Clown\ClownBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClownSchoolAttendanceType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('years')
            ->add('school')
            ->add('clown')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Clown\ClownBundle\Entity\ClownSchoolAttendance'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'clown_clownbundle_clownschoolattendance';
    }
}
