<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * TaggableTaggables
 *
 * @ORM\Table(name="taggable_taggables", indexes={@ORM\Index(name="i_taggable_fwd", columns={"tag_id", "taggable_id"}), @ORM\Index(name="i_taggable_rev", columns={"taggable_id", "tag_id"}), @ORM\Index(name="i_taggable_type", columns={"taggable_type"})})
 * @ORM\Entity
 */
class TaggableTaggables
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
     * @var int
     *
     * @ORM\Column(name="taggable_id", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $taggableId;

    /**
     * @var string
     *
     * @ORM\Column(name="taggable_type", type="string", length=191, nullable=false)
     */
    private $taggableType;

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
