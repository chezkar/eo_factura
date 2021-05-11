<?php

namespace OE\FacturaBundle\Entity;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cliente
 *
 * @ORM\Table(name="cliente", uniqueConstraints={@ORM\UniqueConstraint(name="clienteNit_UNIQUE", columns={"clienteNit"})})
 * @ORM\Entity
 * @UniqueEntity(fields="clientenit", message="El número de NIT ya existe")
 */
class Cliente
{
    /**
     * @var int
     *
     * @ORM\Column(name="idcliente", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcliente;

    /**
     * @var string
     *
     * @ORM\Column(name="clienteNit", type="string", length=12, precision=0, scale=0, nullable=false, unique=false)
     */
    private $clientenit;

    /**
     * @var string
     *
     * @ORM\Column(name="clienteNombre", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $clientenombre;

    /**
     * @var string
     *
     * @ORM\Column(name="clienteApellido", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $clienteapellido;

    /**
     * @var string
     *
     * @ORM\Column(name="clienteDireccion", type="text", length=65535, precision=0, scale=0, nullable=false, unique=false)
     */
    private $clientedireccion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updateAt", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $updateat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createAt", type="datetime", precision=0, scale=0, nullable=false, options={"default"="CURRENT_TIMESTAMP"}, unique=false)
     */
    private $createat;


    public function __construct() {
        $this->setCreateat(new \DateTime());
        $this->setUpdateAt(new \DateTime());
    }




    /**
     * Get idcliente.
     *
     * @return int
     */
    public function getIdcliente()
    {
        return $this->idcliente;
    }

    /**
     * Set clientenit.
     *
     * @param string $clientenit
     *
     * @return Cliente
     */
    public function setClientenit($clientenit)
    {
        $this->clientenit = $clientenit;

        return $this;
    }

    /**
     * Get clientenit.
     *
     * @return string
     */
    public function getClientenit()
    {
        return $this->clientenit;
    }

    /**
     * Set clientenombre.
     *
     * @param string $clientenombre
     *
     * @return Cliente
     */
    public function setClientenombre($clientenombre)
    {
        $this->clientenombre = $clientenombre;

        return $this;
    }

    /**
     * Get clientenombre.
     *
     * @return string
     */
    public function getClientenombre()
    {
        return $this->clientenombre;
    }

    /**
     * Set clienteapellido.
     *
     * @param string $clienteapellido
     *
     * @return Cliente
     */
    public function setClienteapellido($clienteapellido)
    {
        $this->clienteapellido = $clienteapellido;

        return $this;
    }

    /**
     * Get clienteapellido.
     *
     * @return string
     */
    public function getClienteapellido()
    {
        return $this->clienteapellido;
    }

    /**
     * Set clientedireccion.
     *
     * @param string $clientedireccion
     *
     * @return Cliente
     */
    public function setClientedireccion($clientedireccion)
    {
        $this->clientedireccion = $clientedireccion;

        return $this;
    }

    /**
     * Get clientedireccion.
     *
     * @return string
     */
    public function getClientedireccion()
    {
        return $this->clientedireccion;
    }

    /**
     * Set updateat.
     *
     * @param \DateTime $updateat
     *
     * @return Cliente
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
     * Set createat.
     *
     * @param \DateTime $createat
     *
     * @return Cliente
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

    public function __toString()
    {
        return $this->clientenombre.' '.$this->clienteapellido;
    }
}
