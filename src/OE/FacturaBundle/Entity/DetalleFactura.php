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
     * @ORM\Column(name="iddetalle", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iddetalle;

    /**
     * @var int
     *
     * @ORM\Column(name="detalleCantidad", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $detallecantidad;

    /**
     * @var float
     *
     * @ORM\Column(name="detalleTotal", type="float", precision=10, scale=0, nullable=false, unique=false)
     */
    private $detalletotal;

    /**
     * @var \OE\FacturaBundle\Entity\Factura
     *
     * @ORM\ManyToOne(targetEntity="OE\FacturaBundle\Entity\Factura", inversedBy="productos", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="factura_idfactura", referencedColumnName="idfactura", nullable=true)
     * })
     */
    private $facturaIdfactura;

    /**
     * @var \OE\FacturaBundle\Entity\Producto
     *
     * @ORM\ManyToOne(targetEntity="OE\FacturaBundle\Entity\Producto", inversedBy="facturas", cascade={"persist"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="producto_idproducto", referencedColumnName="idproducto", nullable=true)
     * })
     */
    private $productoIdproducto;



    /**
     * Get iddetalle.
     *
     * @return int
     */
    public function getIddetalle()
    {
        return $this->iddetalle;
    }

    /**
     * Set detallecantidad.
     *
     * @param int $detallecantidad
     *
     * @return DetalleFactura
     */
    public function setDetallecantidad($detallecantidad)
    {
        $this->detallecantidad = $detallecantidad;

        return $this;
    }

    /**
     * Get detallecantidad.
     *
     * @return int
     */
    public function getDetallecantidad()
    {
        return $this->detallecantidad;
    }

    /**
     * Set detalletotal.
     *
     * @param float $detalletotal
     *
     * @return DetalleFactura
     */
    public function setDetalletotal($detalletotal)
    {
        $this->detalletotal = $detalletotal;

        return $this;
    }

    /**
     * Get detalletotal.
     *
     * @return float
     */
    public function getDetalletotal()
    {
        return $this->detalletotal;
    }

    /**
     * Set facturaIdfactura.
     *
     * @param \OE\FacturaBundle\Entity\Factura|null $facturaIdfactura
     *
     * @return DetalleFactura
     */
    public function setFacturaIdfactura(\OE\FacturaBundle\Entity\Factura $facturaIdfactura = null)
    {
        $this->facturaIdfactura = $facturaIdfactura;

        return $this;
    }

    /**
     * Get facturaIdfactura.
     *
     * @return \OE\FacturaBundle\Entity\Factura|null
     */
    public function getFacturaIdfactura()
    {
        return $this->facturaIdfactura;
    }

    /**
     * Set productoIdproducto.
     *
     * @param \OE\FacturaBundle\Entity\Producto|null $productoIdproducto
     *
     * @return DetalleFactura
     */
    public function setProductoIdproducto(\OE\FacturaBundle\Entity\Producto $productoIdproducto = null)
    {
        $this->productoIdproducto = $productoIdproducto;

        return $this;
    }

    /**
     * Get productoIdproducto.
     *
     * @return \OE\FacturaBundle\Entity\Producto|null
     */
    public function getProductoIdproducto()
    {
        return $this->productoIdproducto;
    }
}
