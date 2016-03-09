<?php
class Team
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

    function save() {
      $GLOBALS['DB']->exec("INSERT INTO teams (name) VALUES ('{$this->getName()}');");
      $this->id = $GLOBALS['DB']->lastInsertId();
    }

    static function getAll()
        {
            $returned_teams = $GLOBALS['DB']->query("SELECT * FROM teams;");
            $teams = array();
            foreach ($returned_teams as $team) {
                $name = $team['name'];
                $id = $team['id'];
                $new_team = new Team($name, $id);
                array_push($teams, $new_team);
            }
            return $teams;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->query("DELETE FROM teams;");
        }

        static function find($search_id)
        {
            $found_team = NULL;
            $teams = Team::getAll();
            foreach ($teams as $team) {
                if ($team->getId() == $search_id) {
                    $found_team = $team;
                }
            }
            return $found_team;
        }

        static function findByName($search_name)
        {
            $teams = Team::getAll();
            foreach ($teams as $team) {
                if ($team->getName() == $search_name) {
                    return $team;
                }
            }
            return false;
        }

}
 ?>