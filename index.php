<?php
    $request = $_SERVER['REQUEST_URI'];
    include './src/php/action/database.php';
    echo ' <link rel="stylesheet" href="../css/form.css">';
    echo '<link rel="stylesheet" href="../css/app.css">';

    switch ($request) {
        case '/' :
            require __DIR__ . '/src/php/login.php';
            break;
        case '' :
            require __DIR__ . '/src/php/login.php';
            break;
        case '/login':
            require __DIR__ . '/src/php/login.php';
            break;
        case '/register':
            require __DIR__ . '/src/php/register.php';
            break; 
        case '/homepage' :
            require __DIR__ . '/src/php/homepage.php';
            break;
        case '/add' :
            require __DIR__ . '/src/php/addChocolate.php';
            break;
        case '/logout' :
            require __DIR__ . '/src/php/logout.php';
            break;
        default:
            http_response_code(404);
            require __DIR__ . '/php/404.php';
            break;
    }
?>