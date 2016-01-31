<?php

require_once('config.php');

use SalesModule\Controllers\ReportController as ReportController;
use SalesModule\Views\ReportPage as ReportPage;

//todo a little routing system, at the moment just hardcoded to report page
$controller = new ReportController();
$page = new ReportPage($controller);

// if the action exists call it in the particular controller
if (isset($_GET['action']) && ($action = $_GET['action']) && method_exists($controller, $action)) {
    $controller->{$action}();
} else {
    $page->forTemplate();
}


