<?php
class Team
{
    private $name;
    private $logo;
    private $abbreviation;
    private $id;

    function __construct($name, $logo, $abbreviation, $id=null)
    {
        $this->name = $name;
        $this->logo = $logo;
        $this->abbreviation = $abbreviation;
        $this->id = $id;
    }

    function getName()
    {
        return $this->name;
    }

    function getLogo()
    {
        return $this->logo;
    }

    function getAbbreviation()
    {
        return $this->abbreviation;
    }

    function getId()
    {
      return $this->id;
    }

    // function save() {
    //   $GLOBALS['DB']->exec("INSERT INTO teams (team_name, logo, id) VALUES ('{$this->getName()}', '{$this->getLogo()}' {$this->getId()});");
    // }
    //
    // static function getAll()
    //     {
    //         $returned_teams = $GLOBALS['DB']->query("SELECT * FROM teams;");
    //         $teams = array();
    //         foreach ($returned_teams as $team) {
    //             $name = $team['team_name'];
    //             $logo = $team['logo'];
    //             $id = $team['id'];
    //             $new_team = new Team($name, $logo, $id);
    //             array_push($teams, $new_team);
    //         }
    //         return $teams;
    //     }
    //
    //     static function deleteAll()
    //     {
    //         $GLOBALS['DB']->query("DELETE FROM teams;");
    //     }
    //
    //     static function find($search_id)
    //     {
    //         $found_team = NULL;
    //         $teams = Team::getAll();
    //         foreach ($teams as $team) {
    //             if ($team->getId() == $search_id) {
    //                 $found_team = $team;
    //             }
    //         }
    //         return $found_team;
    //     }
    //
    //     static function findByName($search_name)
    //     {
    //         $teams = Team::getAll();
    //         foreach ($teams as $team) {
    //             if ($team->getName() == $search_name) {
    //                 return $team;
    //             }
    //         }
    //         return false;
    //     }

}
 ?>
