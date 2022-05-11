<?php

namespace App\Entity;

use App\Repository\ArtistRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArtistRepository::class)]
class Artist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $artist_id;

    #[ORM\Column(type: 'string', length: 255)]
    private $artist_name;

    #[ORM\OneToMany(mappedBy: 'artist_id', targetEntity: Record::class)]
    private $records;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $artist_img;

    public function __construct()
    {
        $this->records = new ArrayCollection();
    }

    public function getArtistId(): ?int
    {
        return $this->artist_id;
    }

    public function getArtistName(): ?string
    {
        return $this->artist_name;
    }

    public function setArtistName(string $artist_name): self
    {
        $this->artist_name = $artist_name;

        return $this;
    }

    /**
     * @return Collection<int, Record>
     */
    public function getRecords(): Collection
    {
        return $this->records;
    }

    public function addRecord(Record $record): self
    {
        if (!$this->records->contains($record)) {
            $this->records[] = $record;
            $record->setArtistId($this);
        }

        return $this;
    }

    public function removeRecord(Record $record): self
    {
        if ($this->records->removeElement($record)) {
            // set the owning side to null (unless already changed)
            if ($record->getArtistId() === $this) {
                $record->setArtistId(null);
            }
        }

        return $this;
    }

    public function getArtistImg(): ?string
    {
        return $this->artist_img;
    }

    public function setArtistImg(?string $artist_img): self
    {
        $this->artist_img = $artist_img;

        return $this;
    }
}
