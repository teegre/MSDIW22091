<?php

namespace App\Entity;

use App\Entity\Record;
use App\Repository\SongRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SongRepository::class)]
class Song
{
    #[ORM\Id]
    // #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $song_id;

    #[ORM\Id]
    #[ORM\ManyToOne(targetEntity: Record::class, inversedBy: 'songs')]
    #[ORM\JoinColumn(name: 'record_id', referencedColumnName: 'record_id', nullable: false)]
    private $record_id;

    #[ORM\Column(type: 'string', length: 255)]
    private $song_title;

    public function setSongId(?int $song_id): self
    {
      $this->song_id = $song_id;

      return $this;
    }

    public function getSongId(): ?int
    {
        return $this->song_id;
    }

    public function getRecordId(): ?Record
    {
        return $this->record_id;
    }

    public function setRecordId(?Record $record_id): self
    {
        $this->record_id = $record_id;

        return $this;
    }

    public function getSongTitle(): ?string
    {
        return $this->song_title;
    }

    public function setSongTitle(string $song_title): self
    {
        $this->song_title = $song_title;

        return $this;
    }
}
