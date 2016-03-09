<?php
class Player
{
    private $name;
    private $avg_2015;
    private $id;

    function __construct($name, $avg_2015, $id=null)
    {
        $this->name = $name;
        $this->avg_2015 = $avg_2015;
        $this->id = $id;
    }

    function getName()
    {
        return $this->name;
    }

    function getAvg2015()
    {
        return $this->avg_2015;
    }

    function getId()
    {
      return $this->id;
    }

    function save() {
      $GLOBALS['DB']->exec("INSERT INTO players (name, avg_2015) VALUES ('{$this->getName()}');");
      $this->id = $GLOBALS['DB']->lastInsertId();
    }

    static function getAll()
        {
            $returned_players = $GLOBALS['DB']->query("SELECT * FROM players ORDER BY name ASC;");
            $players = array();
            foreach ($returned_players as $player) {
                $name = $player['name'];
                $id = $player['id'];
                $new_player = new Player($name, $id);
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
