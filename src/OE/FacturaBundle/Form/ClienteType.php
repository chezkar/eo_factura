<?php

namespace OE\FacturaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ClienteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('clientenit', null, ['label' => 'NIT', 'attr' => ['class' => 'form-control form-control-user']])
            ->add('clientenombre', null, ['label' => 'Nombres', 'attr' => ['class' => 'form-control form-control-user']])
            ->add('clienteapellido', null, ['label' => 'Apellidos', 'attr' => ['class' => 'form-control form-control-user']])
            ->add('clientedireccion', null, ['label' => 'Dirección', 'attr' => ['class' => 'form-control form-control-user']])
            ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'OE\FacturaBundle\Entity\Cliente'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'oe_facturabundle_cliente';
    }


}
