<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * SlideImages
 *
 * @ORM\Table(name="slide_images", indexes={@ORM\Index(name="slide_images_source_id_foreign", columns={"source_id"}), @ORM\Index(name="slide_images_slide_id_foreign", columns={"slide_id"})})
 * @ORM\Entity
 */
class SlideImages
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
     * @var \Slides
     *
     * @ORM\ManyToOne(targetEntity="Slides")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="slide_id", referencedColumnName="id")
     * })
     */
    private $slide;

    /**
     * @var \Sources
     *
     * @ORM\ManyToOne(targetEntity="Sources")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="source_id", referencedColumnName="id")
     * })
     */
    private $source;


}
