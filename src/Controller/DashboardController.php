<?php

namespace Myohanhtet\Controller;

use Myohanhtet\Config\View;

class DashboardController
{
    public function index()
    {
        View::render('dashboard/index');
    }
}