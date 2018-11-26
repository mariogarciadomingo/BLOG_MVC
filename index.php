<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  
    <!-- our custom CSS -->
    <link rel="stylesheet" href="libs/css/custom.css" />
<?php
require_once 'connection.php';
if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    $controller = 'pages';
    $action = 'home';
}
require_once 'views/layout.php';
