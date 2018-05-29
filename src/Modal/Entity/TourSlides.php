<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * TourSlides
 *
 * @ORM\Table(name="tour_slides", indexes={@ORM\Index(name="tour_slides_tour_id_foreign", columns={"tour_id"}), @ORM\Index(name="tour_slides_slide_id_foreign", columns={"slide_id"})})
 * @ORM\Entity
 */
class TourSlides
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
     * @var \Tours
     *
     * @ORM\ManyToOne(targetEntity="Tours")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tour_id", referencedColumnName="id")
     * })
     */
    private $tour;


}
