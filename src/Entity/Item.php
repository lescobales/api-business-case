<?php

namespace App\Entity;

use App\Repository\ItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ItemRepository::class)]
class Item
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $designation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $soldDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $representation = null;

    #[ORM\ManyToOne(inversedBy: 'items')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Nft $nft = null;

    #[ORM\ManyToMany(targetEntity: PreOrderItem::class, mappedBy: 'items')]
    private Collection $preOrderItems;

    public function __construct()
    {
        $this->preOrderItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): static
    {
        $this->designation = $designation;

        return $this;
    }

    public function getSoldDate(): ?\DateTimeInterface
    {
        return $this->soldDate;
    }

    public function setSoldDate(?\DateTimeInterface $soldDate): static
    {
        $this->soldDate = $soldDate;

        return $this;
    }

    public function getRepresentation(): ?string
    {
        return $this->representation;
    }

    public function setRepresentation(?string $representation): static
    {
        $this->representation = $representation;

        return $this;
    }

    public function getNft(): ?Nft
    {
        return $this->nft;
    }

    public function setNft(?Nft $nft): static
    {
        $this->nft = $nft;

        return $this;
    }

    /**
     * @return Collection<int, PreOrderItem>
     */
    public function getPreOrderItems(): Collection
    {
        return $this->preOrderItems;
    }

    public function addPreOrderItem(PreOrderItem $preOrderItem): static
    {
        if (!$this->preOrderItems->contains($preOrderItem)) {
            $this->preOrderItems->add($preOrderItem);
            $preOrderItem->addItem($this);
        }

        return $this;
    }

    public function removePreOrderItem(PreOrderItem $preOrderItem): static
    {
        if ($this->preOrderItems->removeElement($preOrderItem)) {
            $preOrderItem->removeItem($this);
        }

        return $this;
    }
}
