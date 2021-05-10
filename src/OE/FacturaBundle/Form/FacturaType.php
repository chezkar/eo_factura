<?php

namespace OE\FacturaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class FacturaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('facturanumero', null, [])
            ->add('facturafecha', null, [])
            ->add('clienteIdcliente', EntityType::class, array(
                'class' => 'FacturaBundle:Cliente',
                'required' => true))
            ->add('productos', CollectionType::class, [
                'label'          => false,
                'entry_type'     => DetalleFacturaType::class,
                'by_reference'   => false,
                'prototype'      => true,
                'prototype_data' => new \OE\FacturaBundle\Entity\DetalleFactura(),
                'allow_delete'   => true,
                'allow_add'      => true
            ])
            ->add('facturatotal', null, [])
            ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'OE\FacturaBundle\Entity\Factura'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'oe_facturabundle_factura';
    }


}
