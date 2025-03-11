<?php

$url = parse_url($_SERVER['REQUEST_URI']);
isset($url['path']) ? $path = $url['path'] : $path = '/';


switch ($path) {
    case '/quizz/':
        include "./assets/app/controllers/controllerHome.php";

        $home = new ControllerHome(new ViewHome(), new ModelQuizz(), new ModelCategories());
        $home->render();

        break;

    case '/quizz/assets/app/controllers/controllerSignIn.php':
        include "./assets/app/controllers/controllerSignIn.php";

        $signIn = new ControllerSignIn(new ViewSignIn, new ModelUser);
        $signIn->render();

        break;

    case '/quizz/assets/app/controllers/controllerSignUp.php':
        include "./assets/app/controllers/controllerSignUp.php";

        $signUp = new controllerSignUp(new ModelSignUp());
        $signUp->render();

        break;


    default:
        echo "<h1> Error 404 NOT FOUND </h1>";
        break;
}
