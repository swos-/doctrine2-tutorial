<?php

require_once 'bootstrap.php';

$dql = "select b, e, r from Bug b join b.engineer e join b.reporter r order by b.created desc";

$query = $entityManager->createQuery($dql);
$query->setMaxResults(30);
$bugs = $query->getResult();

foreach($bugs as $bug) {
  echo $bug->getDescription() . " - " . $bug->getCreated()->format('d.m.Y') . "\n";
  echo "  Reported by: " . $bug->getReporter()->getName() . "\n";
  echo "  Assigned to: " . $bug->getEngineer()->getName() . "\n";
  foreach($bug->getProducts() as $product) {
    echo "    Platform: " . $product->getName() . "\n";
  }
  echo "\n";
}
