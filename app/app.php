<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Player.php";
    require_once __DIR__."/../src/Position.php";
    require_once __DIR__."/../src/Team.php";

    $app = new Silex\Application();
    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

    // setup server for database
    $server = 'mysql:host=localhost;dbname=ffb_tool_db';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    // allow patch and delete request to be handled by browser
    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    //home page
    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig', array(
            'navbar' => true
            ));
    });
    //all players
    $app->get("/players", function() use ($app) {
        return $app['twig']->render('players.html.twig', array(
            'players' => Player::getAll()
        ));
    });
    //selected player
    $app->get("/players/{id}", function($id) use ($app) {
        $player = Player::find($id);
        return $app['twig']->render(
        'player.html.twig', array(
            'player' => $player
        ));
    });
    //most consistent players
    $app->get("/consistent", function() use ($app) {
        return $app['twig']->render('consistent.html.twig', array(
            'players' => Player::getAll()
        ));
    });


    return $app;
 ?>
