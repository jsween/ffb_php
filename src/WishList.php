<?php
    class WishList
    {
        private $player_id;
        private $id;

        function __construct($player_id, $id=null)
        {
            $this->player_id = $player_id;
            $this->id = $id;
        }

        function getPlayerId()
        {
            return $this->player_id;
        }

        function getId()
        {
            return $this->id;
        }

    }



 ?>
