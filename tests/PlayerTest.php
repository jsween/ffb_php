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

    class PlayerTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Player::deleteAll();
            // Team::deleteAll();
        }

        function test_getName()
        {
            // Arrange
            $name = 'Joe Montana';
            $avg_fifteen = 24.1;
            $consistency = 98;
            $position_id = 1;
            $team_id = 28;
            $photo_url = 'https://ryanaustindean.files.wordpress.com/2011/09/joe-montana-greatest-qb.jpg';
            $id = 16;
            $test_player = new Player($name, $avg_fifteen, $consistency, $position_id, $team_id, $photo_url, $id);

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
            $position_id = 1;
            $team_id = 28;
            $photo_url = 'https://ryanaustindean.files.wordpress.com/2011/09/joe-montana-greatest-qb.jpg';
            $id = 16;
            $test_player = new Player($name, $avg_fifteen, $consistency, $position_id, $team_id, $photo_url, $id);

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
            $position_id = 1;
            $team_id = 28;
            $photo_url = 'https://ryanaustindean.files.wordpress.com/2011/09/joe-montana-greatest-qb.jpg';
            $id = 16;
            $test_player = new Player($name, $avg_fifteen, $consistency, $position_id, $team_id, $photo_url, $id);

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
            $position_id = 1;
            $team_id = 28;
            $photo_url = 'https://ryanaustindean.files.wordpress.com/2011/09/joe-montana-greatest-qb.jpg';
            $id = 16;
            $test_player = new Player($name, $avg_fifteen, $consistency, $position_id, $team_id, $photo_url, $id);

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
            $position_id = 1;
            $team_id = 28;
            $photo_url = 'https://ryanaustindean.files.wordpress.com/2011/09/joe-montana-greatest-qb.jpg';
            $id = 16;
            $test_player = new Player($name, $avg_fifteen, $consistency, $position_id, $team_id, $photo_url, $id);

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
            $position_id = 1;
            $team_id = 28;
            $photo_url = 'https://ryanaustindean.files.wordpress.com/2011/09/joe-montana-greatest-qb.jpg';
            $id = 16;
            $test_player = new Player($name, $avg_fifteen, $consistency, $position_id, $team_id, $photo_url, $id);
            $test_player->save();

            $name2 = 'Brett Favre';
            $avg_fifteen2 = 23.2;
            $consistency2 = 93;
            $position_id2 = 1;
            $team_id2 = 12;
            $photo_url2 = 'http://www.officialbrettfavre.com/i/n/131.jpg';
            $test_player2 = new Player($name2, $avg_fifteen, $consistency2, $position_id2, $team_id2, $photo_url2);
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
            $position_id = 1;
            $team_id = 28;
            $photo_url = 'https://ryanaustindean.files.wordpress.com/2011/09/joe-montana-greatest-qb.jpg';
            $id = 16;
            $test_player = new Player($name, $avg_fifteen, $consistency, $position_id, $team_id, $photo_url, $id);

            $name2 = 'Brett Favre';
            $avg_fifteen2 = 23.2;
            $consistency2 = 93;
            $position_id2 = 1;
            $team_id2 = 12;
            $photo_url2 = 'http://www.officialbrettfavre.com/i/n/131.jpg';
            $test_player2 = new Player($name2, $avg_fifteen, $consistency2, $position_id2, $team_id2, $photo_url2);
            $test_player2->save();

            // Act
            Player::deleteAll();
            $result = Player::getAll();

            // Assert
            $this->assertEquals([], $result);

        }

        function test_getTeam()
        {
            // Arrange
            $name = 'Joe Montana';
            $avg_fifteen = 24.1;
            $consistency = 98;
            $position_id = 1;
            $team_id = 28;
            $photo_url = 'http://www.joemontana.com/1.jpg';
            $id = 16;
            $test_player = new Player($name, $avg_fifteen, $consistency, $position_id, $team_id, $photo_url, $id);
            $test_player->save();

            $name = 'San Francisco 49ers';
            $logo = 'sanfrancisco.png';
            $abbreviation = 'SF';
            $id = 28;
            $test_team1 = new Team($name, $logo, $abbreviation, $id);
            // $test_team1->save();

            $team_name2 = "Cincinnati Bengals";
            $logo2 = 'cincinnatibengals.png';
            $abbreviation2 = 'CIN';
            $team_id2 = 7;
            $test_team2 = new Team($team_name2, $logo2, $abbreviation2, $team_id2);
            // $test_team2->save();
            // Act
            $result = $test_player->getTeam();
            // Assert
            $this->assertEquals("San Francisco 49ers", $result);
        }

        function test_getTeamLogo()
        {
            // Arrange
            $name = 'Joe Montana';
            $avg_fifteen = 24.1;
            $consistency = 98;
            $position_id = 1;
            $team_id = 28;
            $photo_url = 'http://www.joemontana.com/1.jpg';
            $id = 16;
            $test_player = new Player($name, $avg_fifteen, $consistency, $position_id, $team_id, $photo_url, $id);
            $test_player->save();

            $name = 'San Francisco 49ers';
            $logo = 'sanfrancisco.png';
            $abbreviation = 'SF';
            $id = 28;
            $test_team1 = new Team($name, $logo, $abbreviation, $id);
            // $test_team1->save();

            $team_name2 = "Cincinnati Bengals";
            $logo2 = 'cincinnatibengals.png';
            $abbreviation2 = 'CIN';
            $team_id2 = 7;
            $test_team2 = new Team($team_name2, $logo2, $abbreviation2, $team_id2);
            // $test_team2->save();
            // Act
            $result = $test_player->getTeamLogo();
            // Assert
            $this->assertEquals("sanfrancisco", $result);
        }

        function test_getTeamAbbreviation()
        {
            // Arrange
            $name = 'Joe Montana';
            $avg_fifteen = 24.1;
            $consistency = 98;
            $position_id = 1;
            $team_id = 28;
            $photo_url = 'http://www.joemontana.com/1.jpg';
            // $id = 16;
            $test_player = new Player($name, $avg_fifteen, $consistency, $position_id, $team_id, $photo_url);
            $test_player->save();

            $name = 'San Francisco 49ers';
            $logo = 'sanfrancisco.png';
            $abbreviation = 'SF';
            // $id = 28;
            $test_team1 = new Team($name, $logo, $abbreviation);
            // $test_team1->save();

            $team_name2 = "Cincinnati Bengals";
            $logo2 = 'cincinnatibengals.png';
            $abbreviation2 = 'CIN';
            // $team_id2 = 7;
            $test_team2 = new Team($team_name2, $logo2, $abbreviation2);
            // $test_team2->save();
            // Act
            $result = $test_player->getTeamAbbreviation();
            // Assert
            $this->assertEquals("SF", $result);
        }

        function test_getPosition()
        {
            // Arrange
            $name = 'Joe Montana';
            $avg_fifteen = 24.1;
            $consistency = 98;
            $position_id = 1;
            $team_id = 28;
            $photo_url = 'http://www.joemontana.com/1.jpg';
            // $id = 16;
            $test_player = new Player($name, $avg_fifteen, $consistency, $position_id, $team_id, $photo_url);
            $test_player->save();

            $name = 'Quarterback';
            // $id = 28;
            $test_position1 = new Position($name);
            // $test_position1->save();

            $name2 = "RunningBack";
            // $position_id2 = 7;
            $test_position2 = new Position($name2);
            // $test_position2->save();
            // Act
            $result = $test_player->getPosition();
            // Assert
            $this->assertEquals("Quarterback", $result);
        }

        /*** User is not finding data right now, these are not needed as of now ***/

        // function test_find()
        // {
        //     // Arrange
        //     $name = 'Joe Montana';
        //     $avg_fifteen = 24.1;
        //     $consistency = 98;
        //     $position_id = 1;
        //     $team_id = 28;
        //     $photo_url = 'http://www.joemontana.com/1.jpg';
        //     $id = 16;
        //     $test_player = new Player($name, $avg_fifteen, $consistency, $position_id, $team_id, $photo_url, $id);
        //     $test_player->save();
        //
        //     $name2 = 'Brett Favre';
        //     $avg_fifteen2 = 23.2;
        //     $consistency2 = 93;
        //     $position_id2 = 1;
        //     $team_id2 = 12;
        //     $photo_url2 = 'http://www.officialbrettfavre.com/i/n/131.jpg';
        //     $test_player2 = new Player($name2, $avg_fifteen, $consistency2, $position_id2, $team_id2, $photo_url2);
        //     $test_player2->save();
        //
        //     // Act
        //     $id = $test_player->getId();
        //     $result = Player::find($id);
        //     // Assert
        //     $this->assertEquals($test_player, $result);
        // }

        // function test_findByName()
        // {
        //     // Arrange
        //     $name = 'Joe Montana';
        //     $avg_fifteen = 24.1;
        //     $consistency = 98;
        //     $position_id = 1;
        //     $team_id = 28;
        //     $photo_url = 'https://ryanaustindean.files.wordpress.com/2011/09/joe-montana-greatest-qb.jpg';
        //     $id = 16;
        //     $test_player = new Player($name, $avg_fifteen, $consistency, $position_id, $team_id, $photo_url, $id);
        //
        //     $name2 = 'Brett Favre';
        //     $avg_fifteen2 = 23.2;
        //     $consistency2 = 93;
        //     $position_id2 = 1;
        //     $team_id2 = 12;
        //     $photo_url2 = 'http://www.officialbrettfavre.com/i/n/131.jpg';
        //     $test_player2 = new Player($name2, $avg_fifteen, $consistency2, $position_id2, $team_id2, $photo_url2);
        //     $test_player2->save();
        //
        //     // Act
        //     $name = $test_player->getName();
        //     $result = Player::findByName($name);
        //
        //     // Assert
        //     $this->assertEquals($name, $result->getName());
        // }



    }
 ?>
