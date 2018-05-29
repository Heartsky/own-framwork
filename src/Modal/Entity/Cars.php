<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Cars
 *
 * @ORM\Table(name="cars")
 * @ORM\Entity
 */
class Cars
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
     * @ORM\Column(name="fleet", type="string", length=191, nullable=false)
     */
    private $fleet;

    /**
     * @var string
     *
     * @ORM\Column(name="capability", type="string", length=191, nullable=false)
     */
    private $capability;

    /**
     * @var int
     *
     * @ORM\Column(name="price", type="integer", nullable=false)
     */
    private $price;

    /**
     * @var int
     *
     * @ORM\Column(name="baggage", type="integer", nullable=false)
     */
    private $baggage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="car_image", type="string", length=191, nullable=true)
     */
    private $carImage;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_active", type="boolean", nullable=false, options={"default"="1"})
     */
    private $isActive = '1';

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


}
