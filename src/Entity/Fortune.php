<?php

namespace App\Entity;

use App\Domain\FortuneInterface;
use App\Repository\FortuneRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Table(name="fortunes")
 * @ORM\Entity(repositoryClass=FortuneRepository::class)
 */
class Fortune implements FortuneInterface
{
    use TimestampableEntity;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $targetSign;

    /**
     * @ORM\Column(type="date_immutable")
     */
    private $targetDate;

    /**
     * @ORM\Column(type="text")
     */
    private $fortuneText;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTargetSign(): ?string
    {
        return $this->targetSign;
    }

    public function setTargetSign(string $targetSign): self
    {
        $this->targetSign = $targetSign;

        return $this;
    }

    public function getTargetDate(): ?\DateTimeImmutable
    {
        return $this->targetDate;
    }

    public function setTargetDate(\DateTimeImmutable $targetDate): self
    {
        $this->targetDate = $targetDate;

        return $this;
    }

    public function getFortuneText(): ?string
    {
        return $this->fortuneText;
    }

    public function setFortuneText(string $fortuneText): self
    {
        $this->fortuneText = $fortuneText;

        return $this;
    }
}
