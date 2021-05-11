<?php

namespace OE\FacturaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class FacturaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('facturanumero', null, ['label' => 'Correlativo','attr' => ['class' => 'form-control']])
            ->add('facturafecha', DateType::class, [
                'label' => 'Fecha',
                'data' => new \DateTime(),
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'required' => true,
                'attr' => ['class' => 'form-control', 'readonly' => true]
                ])
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
            ->add('facturatotal', null, ['attr' => ['class' => 'form-control', 'readonly' => true]])
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
