<?php

namespace app\components;

use Exception;

/**
 * Class ViewComponent
 * @package app\components
 */
class ViewComponent
{
    /**
     * @var array
     */
    private $data = [];

    /**
     * @var bool|string|string[]
     */
    private $render = false;

    /**
     * ViewComponent constructor.
     * @param string $template
     */
    public function __construct(string $template)
    {
        try {
            $file = __DIR__ . 'views/' . strtolower($template) . '.php';
            $file = str_replace('components', '', $file); // remove 'components' name of dir (fail)

            if (file_exists($file)) {
                $this->render = $file;
            } else {
                echo 'Template ' . $template . ' not found!';
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param array $dataVariable
     */
    public function assign(array $dataVariable = [])
    {
        if ($dataVariable) {
            foreach ($dataVariable as $key => $var) {
                $this->data[$key] = $var;
            }
        }

        extract($this->data);
        include($this->render);
    }
}
