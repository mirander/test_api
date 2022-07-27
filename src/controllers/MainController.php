<?php

namespace app\controllers;

use app\services\DataService;

/**
 * Class MainController
 * @package app\controllers
 */
class MainController extends Controller
{
    /**
     *  INDEX PAGE
     */
    public function index(): void
    {
        $data = new DataService($GLOBALS['cache']);
        $dataItems = $data->getAll();

        $this->render('index', [
            'items' => $dataItems,
        ]);
    }
}

