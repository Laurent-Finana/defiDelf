<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
#[Vich\Uploadable()]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank([], 'Merci de renseigner le titre de l\'article')]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank([], 'Merci d\'écrire le contenu de l\'article')]
    private ?string $content = null;

    #[ORM\Column]
    private ?bool $press = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $thumbnail = null;

    #[Vich\UploadableField(mapping: 'articles', fileNameProperty: 'thumbnail')]
    #[Assert\Image()]
    private ?File $thumbnailFile = null;

    #[ORM\Column(length: 2048, nullable: true)]
    private ?string $external_link = null;

    #[Vich\UploadableField(mapping: 'articles', fileNameProperty: 'thumbnailPress')]
    #[Assert\Image()]
    private ?File $thumbnailPressFile = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $thumbnailPress = null;

    public function __construct()
    {
        $this->created_at = new \DateTimeImmutable('now');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function isPress(): ?bool
    {
        return $this->press;
    }

    public function setPress(bool $press): static
    {
        $this->press = $press;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updatedAt
     */ 
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set the value of updatedAt
     *
     * @return  self
     */ 
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    public function setThumbnail(?string $thumbnail): static
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * Get the value of thumbnailFile
     */ 
    public function getThumbnailFile()
    {
        return $this->thumbnailFile;
    }

    /**
     * Set the value of thumbnailFile
     *
     * @return  self
     */ 
    public function setThumbnailFile($thumbnailFile): static
    {
        $this->thumbnailFile = $thumbnailFile;

        if (null !== $thumbnailFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    public function getExternalLink(): ?string
    {
        return $this->external_link;
    }

    public function setExternalLink(?string $external_link): static
    {
        $this->external_link = $external_link;

        return $this;
    }

    /**
     * Get the value of thumbnailPressFile
     */ 
    public function getThumbnailPressFile()
    {
        return $this->thumbnailPressFile;
    }

    /**
     * Set the value of thumbnailPressFile
     *
     * @return  self
     */ 
    public function setThumbnailPressFile($thumbnailPressFile): static
    {
        $this->thumbnailPressFile = $thumbnailPressFile;

        if (null !== $thumbnailPressFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

    public function getThumbnailPress(): ?string
    {
        return $this->thumbnailPress;
    }

    public function setThumbnailPress(?string $thumbnailPress): static
    {
        $this->thumbnailPress = $thumbnailPress;

        return $this;
    }
}
