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

    class PositionTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //     Position::deleteAll();
        // }

        function test_getName()
        {
            // Arrange
            $name = 'Quarterback';
            $id = 1;
            $test_position = new Position($name, $id);

            // Act
            $result = $test_position->getName();

            // Assert
            $this->assertEquals('Quarterback', $result);
        }

        function test_getId()
        {
            // Arrange
            $name = 'Quarterback';
            $id = 1;
            $test_position = new Position($name, $id);

            // Act
            $result = $test_position->getId();

            // Assert
            $this->assertEquals(1, $result);
        }

    }
 ?>
