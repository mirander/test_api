<?php

namespace app\controllers\api\v1;

use app\controllers\Controller;
use app\services\DataService;
use Exception;

/**
 * Class ApiController
 * @package app\controllers\api\v1
 */
class ApiController extends Controller
{

    /**
     * @var DataService
     */
    public $cache;
    /**
     * @var $formData
     */
    public $formData;

    /**
     * ApiController constructor.
     */
    public function __construct()
    {
        $this->cache = new DataService($GLOBALS['cache']);
        $method = $_SERVER['REQUEST_METHOD'];

        if ('DELETE' === $method) {
            parse_str(file_get_contents('php://input'), $this->formData);
        }

        if ('PUT' === $method) {
            parse_str(file_get_contents('php://input'), $this->formData);
        }
    }

    /**
     * @return string
     */
    public function getAll(): string
    {
        try {
            $items = $this->cache->getAll();
            $this->jsonSuccessResponse($items);
        } catch (Exception $e) {
            return $this->jsonFailResponse($e->getMessage());
        }
    }

    /**
     *  Added
     */
    public function add(): void
    {
        $key = $this->formData['key'];
        $data = $this->formData['data'];
        $this->cache->setCache($key, $data, 3600);
    }

    /**
     * @return string
     */
    public function delete()
    {
        try {
            $this->cache->remove($this->formData['key']);
            $this->jsonSuccessResponse($this->cache->getAll());
        } catch (Exception $e) {
            return $this->jsonFailResponse($e->getMessage());
        }
    }
}

