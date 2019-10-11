<?php

namespace App\Lib;

use Exception;

class Erro
{
    private $message;
    private $code;

    public function __construct($objetoException = Exception::class)
    {
        $this->code     = $objetoException->getCode();
        $this->message  = $objetoException->getMessage();
    }

    public function render()
    {
        $errorMessage = $this->message;
        $errorCode = $this->code;

        require_once PATH  . '/App/Views/layouts/head.php';
        require_once PATH  . '/App/Views/layouts/header.php';
        require_once PATH  . '/App/Views/layouts/sidebar.php';
        require_once PATH  . '/App/Views/error/erro.php';
        require_once PATH  . '/App/Views/layouts/footer.php';
    }
}