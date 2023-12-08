<?php

namespace Myohanhtet\Controller;

use Myohanhtet\Libs\View;

class DashboardController
{
    public function index()
    {
        View::render('dashboard/index');
    }
}