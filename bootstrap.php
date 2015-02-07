<?php
// boostrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once 'vendor/autoload.php';

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . "/src"), $isDevMode);

$conn = array(
  'dbname' => 'doctrine_tutorial',
  'user' => 'doctrine_orm',
  'password' => 'SFqP1FgMjc8GetTijn7p',
  'host' => 'localhost',
  'driver' => 'pdo_mysql',
);

$entityManager = EntityManager::create($conn, $config);
