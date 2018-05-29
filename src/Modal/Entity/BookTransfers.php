<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * BookTransfers
 *
 * @ORM\Table(name="book_transfers", uniqueConstraints={@ORM\UniqueConstraint(name="book_transfers_email_unique", columns={"email"})}, indexes={@ORM\Index(name="book_transfers_transfer_name_id_foreign", columns={"transfer_name_id"})})
 * @ORM\Entity
 */
class BookTransfers
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
     * @ORM\Column(name="trip", type="string", length=191, nullable=false)
     */
    private $trip;

    /**
     * @var string
     *
     * @ORM\Column(name="passenger", type="string", length=191, nullable=false)
     */
    private $passenger;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=191, nullable=false)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="pickup_address", type="string", length=191, nullable=false)
     */
    private $pickupAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="dropoff_address", type="string", length=191, nullable=false)
     */
    private $dropoffAddress;

    /**
     * @var string
     *
     * @ORM\Column(name="departure_date", type="string", length=191, nullable=false)
     */
    private $departureDate;

    /**
     * @var string
     *
     * @ORM\Column(name="departure_time", type="string", length=191, nullable=false)
     */
    private $departureTime;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=191, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=191, nullable=false)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=191, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=191, nullable=false)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="text", length=65535, nullable=false)
     */
    private $note;

    /**
     * @var string
     *
     * @ORM\Column(name="payment_method", type="string", length=191, nullable=false)
     */
    private $paymentMethod;

    /**
     * @var bool
     *
     * @ORM\Column(name="status", type="boolean", nullable=false)
     */
    private $status = '0';

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
     * @var \TransferNames
     *
     * @ORM\ManyToOne(targetEntity="TransferNames")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="transfer_name_id", referencedColumnName="id")
     * })
     */
    private $transferName;


}
