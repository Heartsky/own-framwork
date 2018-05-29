<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Destinations
 *
 * @ORM\Table(name="destinations", indexes={@ORM\Index(name="destinations_transfer_id_foreign", columns={"transfer_id"})})
 * @ORM\Entity
 */
class Destinations
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=191, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=191, nullable=false)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(name="thumbnail", type="string", length=191, nullable=false)
     */
    private $thumbnail;

    /**
     * @var string|null
     *
     * @ORM\Column(name="slide", type="text", length=65535, nullable=true)
     */
    private $slide;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", length=0, nullable=false)
     */
    private $content;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="deleted_at", type="datetime", nullable=true)
     */
    private $deletedAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $createdAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \Transfers
     *
     * @ORM\ManyToOne(targetEntity="Transfers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="transfer_id", referencedColumnName="id")
     * })
     */
    private $transfer;


}
