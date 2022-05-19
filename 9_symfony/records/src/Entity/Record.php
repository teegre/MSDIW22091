<?php

namespace App\Entity;

use App\Repository\RecordRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecordRepository::class)]
class Record
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $record_id;

    #[ORM\Column(type: 'string', length: 255)]
    private $record_title;

    #[ORM\Column(type: 'integer')]
    #[ORM\OrderBy(['record_year' => 'ASC', 'record_title' => 'ASC'])]
    private $record_year;

    #[ORM\Column(type: 'string', length: 255)]
    private $record_picture;

    #[ORM\Column(type: 'string', length: 255)]
    private $record_label;

    #[ORM\Column(type: 'string', length: 255)]
    private $record_genre;

    #[ORM\Column(type: 'float')]
    private $record_price;

    #[ORM\ManyToOne(targetEntity: Artist::class, inversedBy: 'records')]
    #[ORM\JoinColumn(name: 'artist_id', referencedColumnName: 'artist_id', nullable: false)]
    private $artist_id;

    #[ORM\OneToMany(mappedBy: 'record_id', targetEntity: Song::class, orphanRemoval: true)]
    #[ORM\JoinColumn(name: 'record_id', referencedColumnName: 'record_id')]
    #[ORM\OrderBy(['song_id' => 'ASC'])]
    private $songs;

    public function __construct()
    {
        $this->songs = new ArrayCollection();
    }

    public function getRecordId(): ?int
    {
        return $this->record_id;
    }

    public function getRecordTitle(): ?string
    {
        return $this->record_title;
    }

    public function setRecordTitle(string $record_title): self
    {
        $this->record_title = $record_title;

        return $this;
    }

    public function getRecordYear(): ?int
    {
        return $this->record_year;
    }

    public function setRecordYear(int $record_year): self
    {
        $this->record_year = $record_year;

        return $this;
    }

    public function getRecordPicture(): ?string
    {
        return $this->record_picture;
    }

    public function setRecordPicture(string $record_picture): self
    {
        $this->record_picture = $record_picture;

        return $this;
    }

    public function getRecordLabel(): ?string
    {
        return $this->record_label;
    }

    public function setRecordLabel(string $record_label): self
    {
        $this->record_label = $record_label;

        return $this;
    }

    public function getRecordGenre(): ?string
    {
        return $this->record_genre;
    }

    public function setRecordGenre(string $record_genre): self
    {
        $this->record_genre = $record_genre;

        return $this;
    }

    public function getRecordPrice(): ?float
    {
        return $this->record_price;
    }

    public function setRecordPrice(float $record_price): self
    {
        $this->record_price = $record_price;

        return $this;
    }

    public function getArtistId(): ?Artist
    {
        return $this->artist_id;
    }

    public function setArtistId(?Artist $artist_id): self
    {
        $this->artist_id = $artist_id;

        return $this;
    }

    /**
     * @return Collection<int, Song>
     */
    public function getSongs(): Collection
    {
        return $this->songs;
    }

    public function addSong(Song $song): self
    {
        if (!$this->songs->contains($song)) {
            $this->songs[] = $song;
            $song->setRecordId($this);
        }

        return $this;
    }

    public function removeSong(Song $song): self
    {
        if ($this->songs->removeElement($song)) {
            // set the owning side to null (unless already changed)
            if ($song->getRecordId() === $this) {
                $song->setRecordId(null);
            }
        }

        return $this;
    }
}
