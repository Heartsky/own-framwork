<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Sources
 *
 * @ORM\Table(name="sources")
 * @ORM\Entity
 */
class Sources
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
     * @var string|null
     *
     * @ORM\Column(name="name", type="string", length=191, nullable=true)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="url", type="string", length=191, nullable=true)
     */
    private $url;

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
