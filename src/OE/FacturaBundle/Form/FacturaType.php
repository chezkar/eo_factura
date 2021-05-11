<?php

namespace OE\FacturaBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

class FacturaType extends AbstractType
{
    private $data;
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('facturanumero', null, ['label' => 'Correlativo','label_attr' => ['class' => 'form-label'], 'attr' => ['class' => 'form-control form-control-user']])
            ->add('facturafecha', DateType::class, [
                'label' => 'Fecha',
                'data' => new \DateTime(),
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy',
                'required' => true,
                'attr' => ['class' => 'form-control form-control-user', 'readonly' => true]
                ])
            ->add('clienteIdcliente', HiddenType::class)
            ->add('cliente', ClienteType::class, ['label' => false, 'mapped' => false])
            ->add('productos', CollectionType::class, [
                'label'          => false,
                'entry_type'     => DetalleFacturaType::class,
                'by_reference'   => false,
                'prototype'      => true,
                'prototype_data' => new \OE\FacturaBundle\Entity\DetalleFactura(),
                'allow_delete'   => true,
                'allow_add'      => true
            ])
            ->add('facturatotal', null, ['label' => 'Total', 'attr' => ['class' => 'form-control form-control-user', 'readonly' => true]])
            ;

        
        $builder->addEventListener(
            FormEvents::PRE_SUBMIT,
            function(FormEvent $event){
                // Get the parent form
                $form = $event->getForm();
                
                // Get the data for the choice field
                $this->data = $event->getData()['clienteIdcliente'];
                
                // Add the field again, with the new choices :
                $form->add('clienteIdcliente', EntityType::class, [
                    'class' => 'FacturaBundle:Cliente',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('u')
                            ->where('u.idcliente = ?1')
                            ->setParameter(1, $this->data);
                    }
                ]);
            }
        );

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
