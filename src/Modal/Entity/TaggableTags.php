<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * TaggableTags
 *
 * @ORM\Table(name="taggable_tags", indexes={@ORM\Index(name="taggable_tags_normalized_index", columns={"normalized"})})
 * @ORM\Entity
 */
class TaggableTags
{
    /**
     * @var int
     *
     * @ORM\Column(name="tag_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $tagId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=191, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="normalized", type="string", length=191, nullable=false)
     */
    private $normalized;

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
