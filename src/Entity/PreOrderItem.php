<?php

namespace App\Entity;

use App\Repository\PreOrderItemRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PreOrderItemRepository::class)]
class PreOrderItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column]
    private ?float $amount = null;

    #[ORM\Column]
    private ?bool $isPurchase = null;

    #[ORM\ManyToMany(targetEntity: Item::class, inversedBy: 'preOrderItems')]
    private Collection $items;

    #[ORM\ManyToMany(targetEntity: PreOrder::class, inversedBy: 'preOrderItems')]
    private Collection $preOrders;

    public function __construct()
    {
        $this->items = new ArrayCollection();
        $this->preOrders = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    public function isIsPurchase(): ?bool
    {
        return $this->isPurchase;
    }

    public function setIsPurchase(bool $isPurchase): static
    {
        $this->isPurchase = $isPurchase;

        return $this;
    }

    /**
     * @return Collection<int, Item>
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Item $item): static
    {
        if (!$this->items->contains($item)) {
            $this->items->add($item);
        }

        return $this;
    }

    public function removeItem(Item $item): static
    {
        $this->items->removeElement($item);

        return $this;
    }

    /**
     * @return Collection<int, PreOrder>
     */
    public function getPreOrders(): Collection
    {
        return $this->preOrders;
    }

    public function addPreOrder(PreOrder $preOrder): static
    {
        if (!$this->preOrders->contains($preOrder)) {
            $this->preOrders->add($preOrder);
        }

        return $this;
    }

    public function removePreOrder(PreOrder $preOrder): static
    {
        $this->preOrders->removeElement($preOrder);

        return $this;
    }

}
