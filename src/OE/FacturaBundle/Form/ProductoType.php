<?php

namespace OE\FacturaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('productocodigo', null, ['label' => 'Código', 'attr' => ['class' => 'form-control form-control-user']])
            ->add('productodescripcion', null, ['label' => 'Nombre', 'attr' => ['class' => 'form-control form-control-user']])
            ->add('productoprecio', null, ['label' => 'Precio', 'attr' => ['class' => 'form-control form-control-user']])
            ->add('productoobservaciones', null, ['label' => 'Observaciones', 'attr' => ['class' => 'form-control form-control-user']])
            ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'OE\FacturaBundle\Entity\Producto'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'oe_facturabundle_producto';
    }


}
