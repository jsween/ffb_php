<?php
    class WishList
    {
        private $name;
        private $id;

        function __construct($id=null)
        {
            $this->name = "My Wish List";
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

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO wish_list (name) VALUES ('{$this->getName()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

    }



 ?>
