<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * TransferNames
 *
 * @ORM\Table(name="transfer_names", indexes={@ORM\Index(name="transfer_names_transfer_id_foreign", columns={"transfer_id"})})
 * @ORM\Entity
 */
class TransferNames
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
     * @var int
     *
     * @ORM\Column(name="pick_up", type="integer", nullable=false)
     */
    private $pickUp;

    /**
     * @var int
     *
     * @ORM\Column(name="drop_off", type="integer", nullable=false)
     */
    private $dropOff;

    /**
     * @var string|null
     *
     * @ORM\Column(name="transfer_code", type="string", length=191, nullable=true)
     */
    private $transferCode;

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
     * @ORM\Column(name="duration", type="string", length=191, nullable=false)
     */
    private $duration;

    /**
     * @var string|null
     *
     * @ORM\Column(name="thumbnail", type="string", length=191, nullable=true)
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
     * @ORM\Column(name="blog", type="text", length=0, nullable=false)
     */
    private $blog;

    /**
     * @var string|null
     *
     * @ORM\Column(name="discount", type="string", length=191, nullable=true)
     */
    private $discount;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_hot", type="boolean", nullable=false)
     */
    private $isHot = '0';

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
