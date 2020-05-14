<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="guid", unique=true)
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity="Content", inversedBy="comments")
     */
    private $parent;

    public function __construct()
    {
        $this->id = uuid_create(UUID_TYPE_RANDOM);
    }

    // for now return a string because uuid is not a real type
    public function getId(): ?string
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getParent(): ?Content
    {
        return $this->parent;
    }

    public function setParent(?Content $target): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function __toString()
    {
      return substr($this->getContent(),1,20);
    }
}
