<?php

require_once 'bootstrap.php';

$newProductName = $argv[1];

$product = new Product();
$product->setName($newProductName);

/* persist() notifies EntityManager that a new entity should be inserted into the database */
$entityManager->persist($product);

/* To initiate a transaction to perform the insertion, explicitly call flush() on the EntityManager */
$entityManager->flush();

echo "Created Product with ID " . $product->getId() . "\n";
