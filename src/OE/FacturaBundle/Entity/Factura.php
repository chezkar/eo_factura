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
     * @ORM\Column(name="idfactura", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfactura;

    /**
     * @var string
     *
     * @ORM\Column(name="facturaNumero", type="string", length=20, nullable=false)
     */
    private $facturanumero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="facturaFecha", type="date", nullable=false)
     */
    private $facturafecha;

    /**
     * @var \Cliente
     *
     * @ORM\ManyToOne(targetEntity="Cliente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cliente_idcliente", referencedColumnName="idcliente")
     * })
     */
    private $clienteIdcliente;


}
