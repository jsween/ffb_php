<?php
class Position
{
    private $name;
    private $id;

    function __construct($name, $id)
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

}
 ?>
