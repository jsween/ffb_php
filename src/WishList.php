<?php
    class WishList
    {
        private $player_id;
        private $id;

        function __construct($id=null)
        {
            $this->id = $id;
        }

        function getId()
        {
            return $this->id;
        }

    }



 ?>
