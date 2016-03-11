<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__ . '/../src/Player.php';
    require_once __DIR__ . '/../src/Position.php';
    require_once __DIR__ . '/../src/Team.php';

    $server = 'mysql:host=localhost;dbname=ffb_tool_db_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class TeamTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Team::deleteAll();
        }

        function test_getName()
        {
            // Arrange
            $name = 'San Francisco 49ers';
            $logo = 'sanfrancisco.png';
            $abbreviation = 'SF';
            $id = 28;
            $test_team = new Team($name, $logo, $abbreviation, $id);

            // Act
            $result = $test_team->getName();

            // Assert
            $this->assertEquals('San Francisco 49ers', $result);
        }

        function test_getLogo()
        {
            // Arrange
            $name = 'San Francisco 49ers';
            $logo = 'sanfrancisco.png';
            $abbreviation = 'SF';
            $id = 28;
            $test_team = new Team($name, $logo, $abbreviation, $id);

            // Act
            $result = $test_team->getLogo();

            // Assert
            $this->assertEquals('sanfrancisco.png', $result);
        }

        function test_getAbbreviation()
        {
            // Arrange
            $name = 'San Francisco 49ers';
            $logo = 'sanfrancisco.png';
            $abbreviation = 'SF';
            $id = 28;
            $test_team = new Team($name, $logo, $abbreviation, $id);

            // Act
            $result = $test_team->getAbbreviation();

            // Assert
            $this->assertEquals('SF', $result);
        }

        function test_getId()
        {
            // Arrange
            $name = 'San Francisco 49ers';
            $logo = 'sanfrancisco.png';
            $abbreviation = 'SF';
            $id = 28;
            $test_team = new Team($name, $logo, $abbreviation, $id);

            // Act
            $result = $test_team->getId();

            // Assert
            $this->assertEquals(28, $result);
        }
        /*** User is not entering data, these are no longer needed ***/
        /*** If needed, need to add logo and abbreviation to tests ***/

        // function test_save()
        // {
        //     // Arrange
        //     $name = 'San Francisco 49ers';
        //     $id = 28;
        //     $test_team = new Team($name, $id);
        //
        //     // Act
        //     $test_team->save();
        //
        //     // Assert
        //     $result = Team::getAll();
        //     $this->assertEquals($test_team, $result[0]);
        // }
        //
        // function test_getAll()
        // {
        //     // Arrange
        //     $name = 'San Francisco 49ers';
        //     $id = 28;
        //     $test_team = new Team($name, $id);
        //     $test_team->save();
        //
        //     $name2 = 'Green Bay Packers';
        //     $id = 2;
        //     $test_team2 = new Team($name2, $id);
        //     $test_team2->save();
        //
        //     // Act
        //     $result = Team::getAll();
        //
        //     // Assert
        //     $this->assertEquals([$test_team2, $test_team], $result);
        //
        // }
        //
        // function test_deleteAll()
        // {
        //     // Arrange
        //     $name = 'San Francisco 49ers';
        //     $id = 28;
        //     $test_team = new Team($name, $id);
        //     $test_team->save();
        //
        //     $name2 = 'Green Bay Packers';
        //     $id = 2;
        //     $test_team2 = new Team($name2, $id);
        //     $test_team2->save();
        //
        //     // Act
        //     Team::deleteAll();
        //     $result = Team::getAll();
        //
        //     // Assert
        //     $this->assertEquals([], $result);
        //
        // }
        //
        // function test_find()
        // {
        //     // Arrange
        //     $name = 'San Francisco 49ers';
        //     $id = 28;
        //     $test_team = new Team($name, $id);
        //     $test_team->save();
        //
        //     $name2 = 'Green Bay Packers';
        //     $id = 2;
        //     $test_team2 = new Team($name2, $id);
        //     $test_team2->save();
        //
        //     // Act
        //     $id = $test_team->getId();
        //     $result = Team::find($id);
        //
        //     // Assert
        //     $this->assertEquals($test_team, $result);
        // }
        //
        // function test_findByName()
        // {
        //     // Arrange
        //     $name = 'San Francisco 49ers';
        //     $id = 28;
        //     $test_team = new Team($name, $id);
        //     $test_team->save();
        //
        //     $name2 = 'Green Bay Packers';
        //     $id = 28;
        //     $test_team2 = new Team($name2, $id);
        //     $test_team2->save();
        //
        //     // Act
        //     $name = $test_team->getName();
        //     $result = Team::findByName($name);
        //
        //     // Assert
        //     $this->assertEquals($name, $result->getName());
        // }

    }
 ?>
