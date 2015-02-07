<?php

use Doctrine\ORM\EntityRepository;

class BugRepository extends EntityRepository {
  public function getRecentBugs($number = 30) {
    $dql = "select b, e, r from Bug b join b.engineer e join b.reporter r order by b.created desc";
    $query = $this->getEntityManager()->createQuery($dql);
    $query->setMaxResults($number);
    return $query->getResult();
  }

  public function getRecentBugsArray($number = 30) {
    $dql = "select b, e, r, p from Bug b join b.engineer e " .
           "join b.reporter r join b.products p order by b.created desc";
    $query = $this->getEntityManager()->createQuery($dql);
    $query->setMaxResults($number);
    return $query->getArrayResult();
  }

  public function getUsersBugs($userId, $number = 30) {
    $dql = "select b, e, r from Bug b join b.engineer e join b.reporter r " .
           "where b.status = 'OPEN' and e.id = ?1 or r.id = ?1 order by b.created desc";
    return $this->getEntityManager()->createQuery($dql)
                ->setParameter(1, $userId)
                ->setMaxResults($number)
                ->getResult();
  }

  public function getOpenBugsByProduct() {
    $dql = "select p.id, p.name, count(b.id) as open_bugs from Bug b " .
           "join b.products p where b.status = 'OPEN' group by p.id";
    return $this->getEntityManager()->createQuery($dql)->getScalarResult();
  }
}
