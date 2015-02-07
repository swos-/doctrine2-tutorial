<?php

require_once 'bootstrap.php';

$bugs = $entityManager->getRepository('Bug')
                      ->findBy(array('status' => 'CLOSED'));

foreach($bugs as $bug) {
  echo $bug->getId() . " - " . $bug->getDescription() . "\n";
}
