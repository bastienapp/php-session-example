<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{
    private UserManager $manager;

    public function __construct()
    {
        parent::__construct();
        $this->manager = new UserManager();
    }

    public function signIn()
    {
        // TODO: if user exists, store their info in session and redirect to profile
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->manager->signIn($email, $password);
            if ($user !== null) {
                $user['password'] = null;
                session_start();
                $_SESSION['user_infos'] = $user;
                header('Location: /profile');
            }
        }

        return $this->twig->render('User/login.html.twig');
    }

    public function signOut()
    {
        // TODO: clear the session
        session_start();
        session_destroy();
        //session_unset();

        header('Location: /');
    }

    public function profile()
    {
        session_start();
        // TODO: if the user isn't logged in, redirect to /login
        $user = null;
        if (!isset($_SESSION['user_infos'])) {
            header('Location: /login');
        } else {
            // TODO: load the user session
            $user = $_SESSION['user_infos'];
        }

        return $this->twig->render(
            'User/profile.html.twig',
            ['user' => $user]
        );
    }
}
