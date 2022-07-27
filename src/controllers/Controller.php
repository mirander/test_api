<?php

namespace app\controllers;

use app\components\ViewComponent;

/**
 * Class Controller
 * @package app\controllers
 */
class Controller
{
    /**
     * @param string $view
     * @param array $variable
     */
    public function render(string $view, array $variable = []): void
    {
        $view = new ViewComponent($view);
        $view->assign($variable);
    }

    /**
     * @param $data
     * @return string
     */
    public function jsonSuccessResponse($data)
    {
        $data = [
            'status' => true,
            'code' => 200,
            'data' => $data
        ];

        print json_encode($data);
    }

    /**
     * @param $message
     * @return string
     */
    public function jsonFailResponse($message)
    {
        $data = [
            'status' => false,
            'code' => 500,
            'data' => [
                'message' => $message
            ]
        ];

        print json_encode($data);
    }

    /**
     *  404 PAGE
     */
    public function notFound(): string
    {
        echo "404: Your page is not found";
    }
}
