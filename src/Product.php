<?php

/**
 * @Entity @Table(name="products")
 **/
class Product {
  /**
   * @var integer
   * @Id @Column(type="integer") @GeneratedValue **/
  protected $id;
  /**
   * @var string
   * @Column(type="string") **/
  protected $name;

  public function getId() {
    return $this->id;
  }

  public function getName() {
    return $this->name;
  }

  public function setName($name) {
    $this->name = $name;
  }
}
