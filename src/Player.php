<?php
  class Player
  {
    private $name;
    private $id;

    function __construct($name, $id=null)
    {
      $this->name = $name;
      $this->id = $id;
    }

    function getName()
    {
      return $this->name;
    }

    function getId()
    {
      return $this->id;
    }

    function save() {
      $GLOBALS['DB']->exec("INSERT INTO players (name) VALUES ('{$this->getName()}');");
      $this->id = $GLOBALS['DB']->lastInsertId();
    }



  }
 ?>
