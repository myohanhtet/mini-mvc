<?php

namespace Myohanhtet\Controller;

use Myohanhtet\Config\Flash;
use Myohanhtet\Config\View;
use Myohanhtet\Model\User;

class AuthController
{
    /**
     * @return void
     */
    public function login(): void
    {
        if (isset($_SESSION['user_id'])){
            View::render('dashboard/index');
        }
        View::render('auth/login');
    }

    /**
     * @return void
     */
    public function logout(): void
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_unset();
            session_destroy();
            redirect('/login');
        }
    }

    /**
     * @return void
     */
    public function store(): void
    {
        // Handle login form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userCode = $_POST['user_code'];
            $password = $_POST['password'];
            $user = User::findByUserCode($userCode);
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_code'] = $user['user_code'];
                $_SESSION['session_time'] = time();
                Flash::set('success',"Successful login");
                redirect('/dashboard');
            } else {
                Flash::set('error',"Invalid user code or password");
            }
        }
        View::render('auth/login');
    }
}