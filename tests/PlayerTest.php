<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__ . '/../src/Player.php';

    $server = 'mysql:host=localhost;dbname=ffb_tool_db_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class PlayerTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Player::deleteAll();
        }

        function test_getName()
        {
            // Arrange
            $name = 'Joe Montana';
            $avg_fifteen = 24.1;
            $consistency = 98;
            $id = 16;
            $test_player = new Player($name, $avg_fifteen, $consistency, $id);

            // Act
            $result = $test_player->getName();

            // Assert
            $this->assertEquals('Joe Montana', $result);
        }

        function test_getAvgFifteen()
        {
            // Arrange
            $name = 'Joe Montana';
            $avg_fifteen = 24.1;
            $consistency = 98;
            $id = 16;
            $test_player = new Player($name, $avg_fifteen, $consistency, $id);

            // Act
            $result = $test_player->getName();

            // Assert
            $this->assertEquals('Joe Montana', $result);
        }

        function test_getConsistency()
        {
            // Arrange
            $name = 'Joe Montana';
            $avg_fifteen = 24.1;
            $consistency = 98;
            $id = 16;
            $test_player = new Player($name, $avg_fifteen, $consistency, $id);

            // Act
            $result = $test_player->getConsistency();

            // Assert
            $this->assertEquals(98, $result);
        }

        function test_getId()
        {
            // Arrange
            $name = 'Joe Montana';
            $avg_fifteen = 24.1;
            $consistency = 98;
            $id = 16;
            $test_player = new Player($name, $avg_fifteen, $consistency, $id);

            // Act
            $result = $test_player->getId();

            // Assert
            $this->assertEquals(16, $result);
        }

        function test_save()
        {
            // Arrange
            $name = 'Joe Montana';
            $avg_fifteen = 24.1;
            $consistency = 98;
            $id = 16;
            $test_player = new Player($name, $avg_fifteen, $consistency, $id);

            // Act
            $test_player->save();

            // Assert
            $result = Player::getAll();
            $this->assertEquals($test_player, $result[0]);
        }

        function test_getAll()
        {
            // Arrange
            $name = 'Joe Montana';
            $avg_fifteen = 24.1;
            $consistency = 98;
            $test_player = new Player($name, $avg_fifteen, $consistency);
            $test_player->save();

            $name2 = 'Brett Favre';
            $avg_fifteen2 = 23.2;
            $consistency2 = 98;
            $test_player2 = new Player($name2, $avg_fifteen, $consistency2);
            $test_player2->save();

            // Act
            $result = Player::getAll();

            // Assert
            $this->assertEquals([$test_player, $test_player2], $result);

        }

        function test_deleteAll()
        {
            // Arrange
            $name = 'Joe Montana';
            $avg_fifteen = 24.1;
            $consistency = 98;
            $test_player = new Player($name, $avg_fifteen, $consistency);
            $test_player->save();

            $name2 = 'Brett Favre';
            $avg_fifteen2 = 23.2;
            $consistency2 = 98;
            $test_player2 = new Player($name2, $avg_fifteen, $consistency2);
            $test_player2->save();

            // Act
            Player::deleteAll();
            $result = Player::getAll();

            // Assert
            $this->assertEquals([], $result);

        }

        function test_find()
        {
            // Arrange
            $name = 'Joe Montana';
            $avg_fifteen = 24.1;
            $consistency = 98;
            $test_player = new Player($name, $avg_fifteen, $consistency);
            $test_player->save();

            $name2 = 'Brett Favre';
            $avg_fifteen2 = 23.2;
            $consistency2 = 98;
            $test_player2 = new Player($name2, $avg_fifteen, $consistency2);
            $test_player2->save();

            // Act
            $id = $test_player->getId();
            $result = Player::find($id);

            // Assert
            $this->assertEquals($test_player, $result);
        }

        function test_findByName()
        {
            // Arrange
            $name = 'Joe Montana';
            $avg_fifteen = 24.1;
            $consistency = 98;
            $test_player = new Player($name, $avg_fifteen, $consistency);
            $test_player->save();

            $name2 = 'Brett Favre';
            $avg_fifteen2 = 23.2;
            $consistency2 = 98;
            $test_player2 = new Player($name2, $avg_fifteen, $consistency2);
            $test_player2->save();

            // Act
            $name = $test_player->getName();
            $result = Player::findByName($name);

            // Assert
            $this->assertEquals($name, $result->getName());
        }

    }
 ?>
