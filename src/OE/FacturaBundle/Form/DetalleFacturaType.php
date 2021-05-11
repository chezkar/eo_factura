<?php

namespace OE\FacturaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class DetalleFacturaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('productoIdproducto', EntityType::class, array(
                'label' => 'Producto',
                'placeholder' => 'Seleccione el producto',
                'class' => 'FacturaBundle:Producto',
                'attr' => ['class' => 'form-control']
            ))
            ->add('detallecantidad', null, ['label' => 'Cantidad', 'attr' => ['class' => 'form-control']])
            ->add('detalletotal', null, ['label' => 'SubTotal', 'attr' => ['class' => 'form-control', 'readonly' => true]])
            ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'OE\FacturaBundle\Entity\DetalleFactura'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'oe_facturabundle_detallefactura';
    }


}
