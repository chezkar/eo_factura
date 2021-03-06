<?php

namespace OE\FacturaBundle\Entity;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producto
 *
 * @ORM\Table(name="producto", uniqueConstraints={@ORM\UniqueConstraint(name="productoCodigo_UNIQUE", columns={"productoCodigo"})})
 * @ORM\Entity
 * @UniqueEntity(fields="productocodigo", message="El código de producto ya existe")
 */
class Producto
{
    /**
     * @var int
     *
     * @ORM\Column(name="idproducto", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idproducto;

    /**
     * @var string
     *
     * @ORM\Column(name="productoCodigo", type="string", length=45, precision=0, scale=0, nullable=false, unique=true)
     */
    private $productocodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="productoDescripcion", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $productodescripcion;

    /**
     * @var float
     *
     * @ORM\Column(name="productoPrecio", type="float", precision=10, scale=0, nullable=false, unique=false)
     */
    private $productoprecio;

    /**
     * @var string|null
     *
     * @ORM\Column(name="productoObservaciones", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $productoobservaciones;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createAt", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $createat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateAt", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $updateat;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="OE\FacturaBundle\Entity\DetalleFactura", mappedBy="productoIdproducto", cascade={"persist"})
     */
    private $facturas;


    public function __construct() {
        $this->setCreateat(new \DateTime());
        $this->setUpdateAt(new \DateTime());
    }



    /**
     * Get idproducto.
     *
     * @return int
     */
    public function getIdproducto()
    {
        return $this->idproducto;
    }

    /**
     * Set productocodigo.
     *
     * @param string $productocodigo
     *
     * @return Producto
     */
    public function setProductocodigo($productocodigo)
    {
        $this->productocodigo = $productocodigo;

        return $this;
    }

    /**
     * Get productocodigo.
     *
     * @return string
     */
    public function getProductocodigo()
    {
        return $this->productocodigo;
    }

    /**
     * Set productodescripcion.
     *
     * @param string $productodescripcion
     *
     * @return Producto
     */
    public function setProductodescripcion($productodescripcion)
    {
        $this->productodescripcion = $productodescripcion;

        return $this;
    }

    /**
     * Get productodescripcion.
     *
     * @return string
     */
    public function getProductodescripcion()
    {
        return $this->productodescripcion;
    }

    /**
     * Set productoprecio.
     *
     * @param float $productoprecio
     *
     * @return Producto
     */
    public function setProductoprecio($productoprecio)
    {
        $this->productoprecio = $productoprecio;

        return $this;
    }

    /**
     * Get productoprecio.
     *
     * @return float
     */
    public function getProductoprecio()
    {
        return $this->productoprecio;
    }

    /**
     * Set productoobservaciones.
     *
     * @param string|null $productoobservaciones
     *
     * @return Producto
     */
    public function setProductoobservaciones($productoobservaciones = null)
    {
        $this->productoobservaciones = $productoobservaciones;

        return $this;
    }

    /**
     * Get productoobservaciones.
     *
     * @return string|null
     */
    public function getProductoobservaciones()
    {
        return $this->productoobservaciones;
    }

    /**
     * Set createat.
     *
     * @param \DateTime $createat
     *
     * @return Producto
     */
    public function setCreateat($createat)
    {
        $this->createat = $createat;

        return $this;
    }

    /**
     * Get createat.
     *
     * @return \DateTime
     */
    public function getCreateat()
    {
        return $this->createat;
    }

    /**
     * Set updateat.
     *
     * @param \DateTime $updateat
     *
     * @return Producto
     */
    public function setUpdateat($updateat)
    {
        $this->updateat = $updateat;

        return $this;
    }

    /**
     * Get updateat.
     *
     * @return \DateTime
     */
    public function getUpdateat()
    {
        return $this->updateat;
    }

    /**
     * Add facturas
     *
     * @param \OE\FacturaBundle\Entity\DetalleFactura $facturas
     * @return Producto
     */
    public function addFactura(\OE\FacturaBundle\Entity\DetalleFactura $facturas)
    {
        $this->facturas[] = $facturas;

        return $this;
    }

    /**
     * Remove facturas
     *
     * @param \OE\FacturaBundle\Entity\DetalleFactura $facturas
     */
    public function removeFactura(\OE\FacturaBundle\Entity\DetalleFactura $facturas)
    {
        $this->facturas->removeElement($facturas);
    }

    /**
     * Get facturas
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getFacturas()
    {
        return $this->facturas;
    }

    public function __toString()
    {
        return $this->productocodigo.' '.$this->productodescripcion;
    }
}
