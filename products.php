<?php

require_once 'bootstrap.php';

$dql = "select p.id, p.name, count(b.id) as open_bugs from Bug b " .
       "join b.products p where b.status = 'OPEN' group by p.id";

$productBugs = $entityManager->createQuery($dql)->getScalarResult();

foreach($productBugs as $productBug) {
  echo $productBug['name'] . " has " . $productBug['open_bugs'] . " open bugs!\n";
}
