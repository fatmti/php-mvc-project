<?php


class Controller
{
    public function loadModel($model)
    {
        if (file_exists(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . $model . '.php')) {
            require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Models' . DIRECTORY_SEPARATOR . $model . '.php';
            return new $model();
        }
    }

    public function loadView($view, array $data)
    {
        if (file_exists(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . $view . '.php')) {
            require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'header.php';
            require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . $view . '.php';
            require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Views' . DIRECTORY_SEPARATOR . 'common' . DIRECTORY_SEPARATOR . 'footer.php';

        } else {
            die('view not found ...');
        }
    }
}