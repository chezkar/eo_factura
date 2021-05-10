<?php

namespace OE\FacturaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producto
 *
 * @ORM\Table(name="producto", uniqueConstraints={@ORM\UniqueConstraint(name="productoCodigo_UNIQUE", columns={"productoCodigo"})})
 * @ORM\Entity
 */
class Producto
{
    /**
     * @var int
     *
     * @ORM\Column(name="idproducto", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idproducto;

    /**
     * @var string
     *
     * @ORM\Column(name="productoCodigo", type="string", length=45, nullable=false)
     */
    private $productocodigo;

    /**
     * @var string
     *
     * @ORM\Column(name="productoDescripcion", type="string", length=100, nullable=false)
     */
    private $productodescripcion;

    /**
     * @var float
     *
     * @ORM\Column(name="productoPrecio", type="float", precision=10, scale=0, nullable=false)
     */
    private $productoprecio;

    /**
     * @var string|null
     *
     * @ORM\Column(name="productoObservaciones", type="text", length=65535, nullable=true)
     */
    private $productoobservaciones;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createAt", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createat = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateAt", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $updateat = 'CURRENT_TIMESTAMP';


}
