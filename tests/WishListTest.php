<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once __DIR__ . '/../src/Player.php';
    require_once __DIR__ . '/../src/Position.php';
    require_once __DIR__ . '/../src/Team.php';
    require_once __DIR__ . '/../src/WishList.php';

    $server = 'mysql:host=localhost;dbname=ffb_tool_db_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class WishListTest extends PHPUnit_Framework_TestCase
    {
        // protected function tearDown()
        // {
        //     WishList::deleteAll();
        // }

        function test_getId()
        {
            // Arrange
            $id = 2;
            $test_player = new WishList($id);

            // Act
            $result = $test_player->getId();

            // Assert
            $this->assertEquals(2, $result);
        }
    }
 ?>
