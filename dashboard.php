<?php

require_once 'bootstrap.php';

$theUserId = $argv[1];

$dql = "select b, e, r from Bug b join b.engineer e join b.reporter r " .
       "where b.status = 'OPEN' and (e.id = ?1 or r.id = ?1) order by b.created desc";

$myBugs = $entityManager->createQuery($dql)
                        ->setParameter(1, $theUserId)
                        ->setMaxResults(15)
                        ->getResult();

echo "You have created or been assigned to " . count($myBugs) . " open bugs:\n\n";

foreach($myBugs as $bug) {
  echo $bug->getId() . " - " . $bug->getDescription() . "\n";
}
