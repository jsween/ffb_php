<?php
    class WishList
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

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO wish_list (name) VALUES ('{$this->getName()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }
        //set up for multiple wish lists
        static function getAll()
        {
            $returned_wish_list = $GLOBALS['DB']->query("SELECT * FROM wish_list;");
            $wish_list_array = array();
            foreach ($returned_wish_list as $wish_list) {
                $name = $wish_list['name'];
                $id = $wish_list['id'];
                $new_wish_list = new WishList($name, $id);
                array_push($wish_list_array, $new_wish_list);
            }
            return $wish_list_array;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->query("DELETE FROM wish_list;");
            // $GLOBALS['DB']->query("DELETE FROM wishlist_players;");
        }

        function addPlayer($player)
        {
            $GLOBALS['DB']->exec("INSERT INTO wishlist_players (wish_list_id, player_id) VALUES ({$this->getId()}, {$player->getId()});");
        }

        function getPlayers()
        {
            $returned_players = $GLOBALS['DB']->query("SELECT players.* FROM wish_list
                JOIN wishlist_players ON (wishlist_players.wish_list_id = wish_list.id)
                JOIN players ON (players.id = wishlist_players.player_id)
                WHERE wish_list.id = {$this->getId()};");
            $players = array();
            foreach($returned_players as $player) {
                $name = $player['name'];
                $avg_fifteen = $player['avg_fifteen'];
                $consistency = $player['consistency'];
                $position_id = $player['position_id'];
                $team_id = $player['team_id'];
                $photo_url = $player['photo_url'];
                $id = $player['id'];
                $new_player = new Player($name, $avg_fifteen, $consistency, $position_id, $team_id, $photo_url, $id);
                array_push($players, $new_player);
            }
            return $players;
        }

    }



 ?>
