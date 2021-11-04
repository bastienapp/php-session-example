<?php

namespace App\Model;

class UserManager
{
    private array $testUser;

    public function __construct()
    {
        $this->testUser = [
            'email' => 'ronnie@example.com',
            'password' => password_hash('tacostacos', PASSWORD_DEFAULT),
            'firstname' => 'Ronnie',
            'lastname' => 'Montgomery',
            'picture' => 'https://randomuser.me/api/portraits/men/70.jpg',
            'phone' => '(911)-579-9788',
        ];
    }

    // TODO: create a sign in fonction and store the user infos in session
    // use password_verify: https://www.php.net/manual/en/function.password-verify.php
    public function signIn(string $email, string $password): ?array
    {
        if ($this->testUser['email'] === $email
            && password_verify($password, $this->testUser['password'])
        ) {
            return $this->testUser;
        }
        return null;
    }

    // TODO: create a sign out fonction and clear the session
}
