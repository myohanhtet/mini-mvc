<?php

namespace Myohanhtet\Controller;

use Myohanhtet\Config\Flash;
use Myohanhtet\Config\View;
use Myohanhtet\Libs\Encryption;
use Myohanhtet\Model\User;
use Myohanhtet\Validation\UserValidation;

class UserController
{
    private UserValidation $validate;

    public function __construct()
    {
        $this->validate = new UserValidation();
    }

    /**
     * @return void
     * @throws \Exception
     */
    public function index()
    {
        $users = User::all();
        View::render('users/index',$users);
    }

    /**
     * @param $id
     * @return void
     */
    public function show($id)
    {
        //Todo: create view page
    }

    /**
     * @return void
     */
    public function create()
    {
        View::render('users/create');
    }

    /**
     * @return void
     */
    public function store()
    {
        //Todo: request validation
        if ($_SERVER['REQUEST_METHOD'] != 'POST'){
            View::render('users/create' );
        }
        $data = $_POST;
        $result = $this->validate->UserStoreValidation($data);
        if ($result === true) {
            $user = User::create($data);
            if ($user) {
                Flash::set('success', 'User created successfully.');
            }
            redirect('/users');
        }
        Flash::set('validateError', $result);
        View::render('users/create' );

    }

    /**
     * @param $id
     * @return void
     */
    public function edit($id): void
    {
        $id = Encryption::encryptor('de',$id);
        $user = User::findById($id);
        View::render('users/edit',$user);
    }

    /**
     * @param $id
     * @return void
     */
    public function update($id): void
    {
        $id = Encryption::encryptor('de',$id);

        $data = $_POST; // Assuming form data is submitted via POST
        $user = User::findById($id);
        $valid = $this->validate->UserUpdateValidation($data,$user['user_code']);
        if ($valid === true) {
            $updateUser = User::update($id,$data);
            if($updateUser < 1) {
                Flash::set('error', "failed to updated Cost rate.");
                redirect('/users');
            } else {
                Flash::set('success', 'Cost rate updated successfully.');
                redirect('/users');
            }
        }
        Flash::set('validateError', $valid);
        View::render('users/edit', $user);
    }

    /**
     * @param $id
     * @return void
     */
    public function delete($id): void
    {
        $id = Encryption::encryptor('de',$id);
        // Delete the user by ID
        $user = User::delete($id);
        if ($user < 1) {
            Flash::set('error', "failed to delete user.");
        } else {
            Flash::set('success', 'user delete successfully.');
        }
        redirect('/users');
    }
}