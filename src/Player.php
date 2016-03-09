<?php
class Player
{
    private $name;
    private $avg_fifteen;
    private $consistency;
    private $position_id;
    private $team_id;
    private $photo_url;
    private $id;

    function __construct($name, $avg_fifteen, $consistency, $position_id, $team_id, $photo_url, $id=null)
    {
        $this->name = $name;
        $this->avg_fifteen = $avg_fifteen;
        $this->consistency = $consistency;
        $this->position_id = $position_id;
        $this->team_id = $team_id;
        $this->photo_url;
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

    function getConsistency()
    {
        return $this->consistency;
    }

    function getPositionId()
    {
        return $this->position_id;
    }

    function getTeamId()
    {
        return $this->team_id;
    }

    function getPhotoUrl()
    {
        return $this->photo_url;
    }

    function getId()
    {
      return $this->id;
    }

    function save() {
      $GLOBALS['DB']->exec("INSERT INTO players (name, avg_fifteen, consistency, position_id, team_id, photo_url) VALUES ('{$this->getName()}', {$this->getAvg2015()}, {$this->getConsistency()}, {$this->getPositionId()}, {$this->getTeamId()}, '{$this->getPhotoUrl()}');");
      $this->id = $GLOBALS['DB']->lastInsertId();
    }

    static function getAll()
        {
            $returned_players = $GLOBALS['DB']->query("SELECT * FROM players;");
            $players = array();
            foreach ($returned_players as $player) {
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

        static function deleteAll()
        {
            $GLOBALS['DB']->query("DELETE FROM players;");
        }

        static function find($search_id)
        {
            $found_player = NULL;
            $players = Player::getAll();
            foreach ($players as $player) {
                if ($player->getId() == $search_id) {
                    $found_player = $player;
                }
            }
            return $found_player;
        }

        static function findByName($search_name)
        {
            $players = Player::getAll();
            foreach ($players as $player) {
                if ($player->getName() == $search_name) {
                    return $player;
                }
            }
            return false;
        }

}
 ?>
