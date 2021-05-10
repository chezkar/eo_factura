<?php

namespace OE\FacturaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Factura
 *
 * @ORM\Table(name="factura", uniqueConstraints={@ORM\UniqueConstraint(name="compraNumero_UNIQUE", columns={"facturaNumero"})}, indexes={@ORM\Index(name="fk_factura_cliente_idx", columns={"cliente_idcliente"})})
 * @ORM\Entity
 */
class Factura
{
    /**
     * @var int
     *
     * @ORM\Column(name="idfactura", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfactura;

    /**
     * @var string
     *
     * @ORM\Column(name="facturaNumero", type="string", length=20, precision=0, scale=0, nullable=false, unique=false)
     */
    private $facturanumero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="facturaFecha", type="date", precision=0, scale=0, nullable=false, unique=false)
     */
    private $facturafecha;

    /**
     * @var \OE\FacturaBundle\Entity\Cliente
     *
     * @ORM\ManyToOne(targetEntity="OE\FacturaBundle\Entity\Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cliente_idcliente", referencedColumnName="idcliente", nullable=true)
     * })
     */
    private $clienteIdcliente;



    /**
     * Get idfactura.
     *
     * @return int
     */
    public function getIdfactura()
    {
        return $this->idfactura;
    }

    /**
     * Set facturanumero.
     *
     * @param string $facturanumero
     *
     * @return Factura
     */
    public function setFacturanumero($facturanumero)
    {
        $this->facturanumero = $facturanumero;

        return $this;
    }

    /**
     * Get facturanumero.
     *
     * @return string
     */
    public function getFacturanumero()
    {
        return $this->facturanumero;
    }

    /**
     * Set facturafecha.
     *
     * @param \DateTime $facturafecha
     *
     * @return Factura
     */
    public function setFacturafecha($facturafecha)
    {
        $this->facturafecha = $facturafecha;

        return $this;
    }

    /**
     * Get facturafecha.
     *
     * @return \DateTime
     */
    public function getFacturafecha()
    {
        return $this->facturafecha;
    }

    /**
     * Set clienteIdcliente.
     *
     * @param \OE\FacturaBundle\Entity\Cliente|null $clienteIdcliente
     *
     * @return Factura
     */
    public function setClienteIdcliente(\OE\FacturaBundle\Entity\Cliente $clienteIdcliente = null)
    {
        $this->clienteIdcliente = $clienteIdcliente;

        return $this;
    }

    /**
     * Get clienteIdcliente.
     *
     * @return \OE\FacturaBundle\Entity\Cliente|null
     */
    public function getClienteIdcliente()
    {
        return $this->clienteIdcliente;
    }
}
