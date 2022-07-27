<?php

namespace app\components;

use app\controllers\api\v1\ApiController;
use app\controllers\MainController;

/**
 * Class RoutingComponent
 * @package app\components
 */
class RoutingComponent
{

    /**
     * Start routing
     */
    public function main(): void
    {
        $params = $this->getUrlParams();
        $this->routing($params);
    }

    /**
     * @return array
     */
    private function getUrlParams(): array
    {
        $request_url = rtrim(ltrim(urldecode(parse_url($_SERVER['REQUEST_URI'], 5)), '/'), '/');
        return array_filter(explode("/", $request_url));
    }

    /**
     * @param $params
     */
    private function routing($params): void
    {
        $mainController = new MainController();

        // Index page
        if (count($params) == 0) {
            $mainController->index();
            exit();
        }

        if (count($params) > 0 && count($params) < 3) {
            if ($params[0] == 'api' && isset($params[1])) {
                $controller = new ApiController();

                switch ($params[1]) {
                    case 'get-all':
                        if ($_SERVER['REQUEST_METHOD'] == 'GET')
                            $controller->getAll();
                        break;

                    case 'add':
                        if ($_SERVER['REQUEST_METHOD'] == 'PUT')
                            $controller->add();
                        break;
                    case 'delete':
                        if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
                            $controller->delete();
                        break;
                }
            } else {
                $mainController->notFound();
            }
        } else {
            $mainController->notFound();
        }
    }
}
