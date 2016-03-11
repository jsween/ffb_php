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
        protected function tearDown()
        {
            WishList::deleteAll();
        }

        function test_getName()
        {
            // Arrange
            $name = "My Wish List";
            $id = 2;
            $test_player = new WishList($name, $id);

            // Act
            $result = $test_player->getName();

            // Assert
            $this->assertEquals("My Wish List", $result);
        }

        function test_getId()
        {
            // Arrange
            $name = 'tricky';
            $id = 2;
            $test_player = new WishList($name, $id);

            // Act
            $result = $test_player->getId();

            // Assert
            $this->assertEquals(2, $result);
        }

        function test_save()
        {
            // Arrange
            $name = "My Wish List";
            $test_wish_list = new WishList($name);
            // Act
            $test_wish_list->save();
            // Assert
            $result = WishList::getAll();
            // var_dump($test_wish_list);
            // var_dump($result);
            $this->assertEquals($test_wish_list, $result[0]);
        }
        // function test_getAll()
        // {
        //     // Arrange
        //     $name = "My Wish List";
        //     $id = null;
        //     $test_wish_list = new WishList($name, $id);
        //     $test_wish_list->save();
        //     // Act
        //     $result = WishList::getAll();
        //     // Assert
        //     $this->assertEquals([$test_wish_list], $result);
        // }
        // function test_deleteAll()
        // {
        //     // Arrange
        //     $name = "My Wish List";
        //     $id = null;
        //     $test_wish_list = new WishList($name, $id);
        //     $test_wish_list->save();
        //     // Act
        //     WishList::deleteAll();
        //     $result = WishList::getAll();
        //     // Assert
        //     $this->assertEquals([], $result);
        // }
    }
 ?>
