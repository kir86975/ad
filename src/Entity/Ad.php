<?php


namespace App\Entity;



use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Ad
 * @package App\Entity
 * @ORM\Entity()
 * @ORM\Table(name="main.ad")
 */
class Ad {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var integer
     */
    protected $id;

    /**
     * @ORM\Column(name="title", type="string")
     * @var string
     */
    protected $title;

    /**
     * @ORM\Column(name="content", type="string")
     * @var string
     */
    protected $content;

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void {
        $this->content = $content;
    }
}