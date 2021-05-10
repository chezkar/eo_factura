<?php

namespace OE\FacturaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleFactura
 *
 * @ORM\Table(name="detalle_factura", indexes={@ORM\Index(name="fk_detalle_factura_producto1_idx", columns={"producto_idproducto"}), @ORM\Index(name="fk_detalle_factura_factura1_idx", columns={"factura_idfactura"})})
 * @ORM\Entity
 */
class DetalleFactura
{
    /**
     * @var int
     *
     * @ORM\Column(name="iddetalle", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddetalle;

    /**
     * @var int
     *
     * @ORM\Column(name="detalleCantidad", type="integer", nullable=false)
     */
    private $detallecantidad;

    /**
     * @var float
     *
     * @ORM\Column(name="detalleTotal", type="float", precision=10, scale=0, nullable=false)
     */
    private $detalletotal;

    /**
     * @var \Factura
     *
     * @ORM\ManyToOne(targetEntity="Factura")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="factura_idfactura", referencedColumnName="idfactura")
     * })
     */
    private $facturaIdfactura;

    /**
     * @var \Producto
     *
     * @ORM\ManyToOne(targetEntity="Producto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="producto_idproducto", referencedColumnName="idproducto")
     * })
     */
    private $productoIdproducto;


}
