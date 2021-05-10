<?php

namespace OE\FacturaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 *
 * @ORM\Table(name="cliente", uniqueConstraints={@ORM\UniqueConstraint(name="clienteNit_UNIQUE", columns={"clienteNit"})})
 * @ORM\Entity
 */
class Cliente
{
    /**
     * @var int
     *
     * @ORM\Column(name="idcliente", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcliente;

    /**
     * @var string
     *
     * @ORM\Column(name="clienteNit", type="string", length=12, nullable=false)
     */
    private $clientenit;

    /**
     * @var string
     *
     * @ORM\Column(name="clienteNombre", type="string", length=100, nullable=false)
     */
    private $clientenombre;

    /**
     * @var string
     *
     * @ORM\Column(name="clienteApellido", type="string", length=100, nullable=false)
     */
    private $clienteapellido;

    /**
     * @var string
     *
     * @ORM\Column(name="clienteDireccion", type="text", length=65535, nullable=false)
     */
    private $clientedireccion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateAt", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $updateat = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createAt", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $createat = 'CURRENT_TIMESTAMP';


}
