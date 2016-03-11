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

        function test_getPlayerId()
        {
            // Arrange
            $player_id = 1;
            $id = 2;
            $test_player = new WishList($player_id, $id);

            // Act
            $result = $test_player->getPlayerId();

            // Assert
            $this->assertEquals(1, $result);
        }
    }
 ?>
