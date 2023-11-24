<?php

namespace Myohanhtet\Controller;

use Myohanhtet\Config\View;

class HomeController
{
    public function index()
    {
        View::render('home/index');
    }
}