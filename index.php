<?php

$url = parse_url($_SERVER['REQUEST_URI']);
isset($url['path']) ? $path = $url['path'] : $path = '/';


switch ($path) {
    case '/quizz/index.php':
        include "./assets/app/controllers/controllerHome.php";

        $home = new ControllerHome(new ViewHome(), new ModelQuizz(), new ModelCategories());
        $home->render();

        break;

    case '/quizz/assets/app/controllers/controllerSignIn.php':
        include "./assets/app/controllers/controllerSignIn.php";

        break;

    case '/quizz/assets/app/controllers/controllerSignUp.php':
        include "./assets/app/controllers/controllerSignUp.php";

        break;


    default:
        echo "<h1> Error 404 NOT FOUND </h1>";
        break;
}
