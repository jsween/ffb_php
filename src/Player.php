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
        $this->photo_url = $photo_url;
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

        function getTeam()
        {
            $teams = array();
            $returned_teams = $GLOBALS['DB']->query("SELECT * FROM teams JOIN players ON (players.team_id = teams.id) WHERE team_id = {$this->getTeamId()}");
            foreach($returned_teams as $team) {
                $team_name = $team['team_name'];
                $logo = $team['logo'];
                $abbreviation = $team['abbreviation'];
                $id = $team['id'];
                $new_team = new Team($team_name, $logo, $abbreviation, $id);
                array_push($teams, $new_team);
            }
            return $teams[0]->getName();
        }

        function getTeamLogo()
        {
            $teams = array();
            $returned_teams = $GLOBALS['DB']->query("SELECT * FROM teams JOIN players ON (players.team_id = teams.id) WHERE team_id = {$this->getTeamId()}");
            foreach($returned_teams as $team) {
                $team_name = $team['team_name'];
                $logo = $team['logo'];
                $abbreviation = $team['abbreviation'];
                $id = $team['id'];
                $new_team = new Team($team_name, $logo, $abbreviation, $id);
                array_push($teams, $new_team);
            }
            return $teams[0]->getLogo();
        }

        function getTeamAbbreviation()
        {
            $teams = array();
            $returned_teams = $GLOBALS['DB']->query("SELECT * FROM teams JOIN players ON (players.team_id = teams.id) WHERE team_id = {$this->getTeamId()}");
            foreach($returned_teams as $team) {
                $team_name = $team['team_name'];
                $logo = $team['logo'];
                $abbreviation = $team['abbreviation'];
                $id = $team['id'];
                $new_team = new Team($team_name, $logo, $abbreviation, $id);
                array_push($teams, $new_team);
            }
            return $teams[0]->getAbbreviation();
        }

        function getPosition()
        {
            $positions = array();
            $returned_positions = $GLOBALS['DB']->query("SELECT * FROM positions JOIN players ON (players.position_id = positions.id) WHERE position_id = {$this->getPositionId()}");
            foreach($returned_positions as $position) {
                $position_name = $position['position_name'];
                $id = $position['id'];
                $new_position = new position($position_name, $id);
                array_push($positions, $new_position);
            }
            return $positions[0]->getName();
        }


}
 ?>
