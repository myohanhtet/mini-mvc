<?php

namespace Myohanhtet\Controller;

use Myohanhtet\Libs\View;

class HomeController
{
    public function index()
    {
        View::render('home/index');
    }
}