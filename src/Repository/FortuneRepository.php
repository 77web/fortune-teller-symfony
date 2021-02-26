<?php

namespace App\Repository;

use App\Domain\FetchFortuneInterface;
use App\Domain\FortuneInterface;
use App\Entity\Fortune;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Fortune|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fortune|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fortune[]    findAll()
 * @method Fortune[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FortuneRepository extends ServiceEntityRepository implements FetchFortuneInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Fortune::class);
    }

    public function fetchTodaysFortune(string $targetSign): ?FortuneInterface
    {
        return $this->findOneBy([
            'targetSign' => $targetSign,
            'targetDate' => new \DateTimeImmutable(),
        ]);
    }
}
