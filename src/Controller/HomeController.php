<?php

namespace App\Controller;

class HomeController extends AbstractController
{
    public function index()
    {
        // TODO: store the theme in cookies
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            setcookie('theme_choice', $_POST['theme']);
            header('Location: /');
        }
        $theme = $_COOKIE['theme_choice'] ?? 'light';
        return $this->twig->render('Home/index.html.twig', ['theme' => $theme]);
    }
}
