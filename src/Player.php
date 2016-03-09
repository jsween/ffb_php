<?php
class Player
{
    private $name;
    private $avg_fifteen;
    private $id;

    function __construct($name, $avg_fifteen, $id=null)
    {
        $this->name = $name;
        $this->avg_fifteen = $avg_fifteen;
        $this->id = $id;
    }

    function getName()
    {
        return $this->name;
    }

    function getAvg2015()
    {
        return $this->avg_fifteen;
    }

    function getId()
    {
      return $this->id;
    }

    function save() {
      $GLOBALS['DB']->exec("INSERT INTO players (name, avg_fifteen) VALUES ('{$this->getName()}', {$this->getAvg2015()});");
      $this->id = $GLOBALS['DB']->lastInsertId();
    }

    static function getAll()
        {
            $returned_players = $GLOBALS['DB']->query("SELECT * FROM players;");
            $players = array();
            foreach ($returned_players as $player) {
                $name = $player['name'];
                $avg_fifteen = $player['avg_fifteen'];
                var_dump($avg_fifteen);
                $id = $player['id'];
                $new_player = new Player($name, $avg_fifteen, $id);
                array_push($players, $new_player);
            }
            return $players;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->query("DELETE FROM players;");
            // $GLOBALS['DB']->query("DELETE FROM players_stores;");
        }

}
 ?>
