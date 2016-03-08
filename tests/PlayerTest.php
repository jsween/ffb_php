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
            // Player::deleteAll();
        }

        function test_getId()
        {
            // Arrange
            $name = 'Joe Montana';
            $id = 16;
            $test_brand = new Player($name, $id);

            // Act
            $result = $test_brand->getId();

            // Assert
            $this->assertEquals(16, $result);
        }

    }
 ?>
