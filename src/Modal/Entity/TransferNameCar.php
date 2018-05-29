<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * TransferNameCar
 *
 * @ORM\Table(name="transfer_name_car")
 * @ORM\Entity
 */
class TransferNameCar
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
     * @ORM\Column(name="transfer_name_id", type="integer", nullable=false)
     */
    private $transferNameId;

    /**
     * @var int
     *
     * @ORM\Column(name="car_id", type="integer", nullable=false)
     */
    private $carId;

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
