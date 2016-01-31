<?php

namespace SalesModule\Controllers;

class Controller {

    protected $view;

    public function setView($view) {
        $this->view = $view;
    }

    //todo create a class response
    public function handleJsonResponse($data) {
        header('Content-type: application/json');
        echo json_encode($data);
        return true;
    }
} 