<?php

namespace App\Entity;

use App\Repository\PreOrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PreOrderRepository::class)]
class PreOrder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $isPurchase = null;

    #[ORM\ManyToOne(inversedBy: 'preOrders')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $asker = null;

    #[ORM\ManyToMany(targetEntity: PreOrderItem::class, mappedBy: 'preOrders')]
    private Collection $preOrderItems;


    public function __construct()
    {
        $this->preOrderItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAsker(): ?User
    {
        return $this->asker;
    }

    public function setAsker(?User $asker): static
    {
        $this->asker = $asker;

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
            $preOrderItem->addPreOrder($this);
        }

        return $this;
    }

    public function removePreOrderItem(PreOrderItem $preOrderItem): static
    {
        if ($this->preOrderItems->removeElement($preOrderItem)) {
            $preOrderItem->removePreOrder($this);
        }

        return $this;
    }
}
