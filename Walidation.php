<?php

class UserValidator
{
    /**
     * The method is used to check whether the provided email address is valid.
     * @param string $email
     * @return bool
     */
    public function validateEmail(string $email): bool
    {
        $pattern = '/^[a-zA-Z][a-zA-Z0-9._%+-]*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

        return preg_match($pattern, $email) === 1;
    }
    /**
     * The method is used to check whether a password meets certain security requirements.
     * @param string $password
     * @return bool
     */
    public function validatePassword(string $password): bool
    {
        if (strlen($password) < 8) {
            return false;
        }
        if (!preg_match('/[A-Z]/', $password)) {
            return false;
        }
        if (!preg_match('/[a-z]/', $password)) {
            return false;
        }
        if (!preg_match('/\d/', $password)) {
            return false;
        }
        if (!preg_match('/[\W_]/', $password)) {
            return false;
        }
        return true;
    }
}
$validator = new UserValidator();

$email = "test@example.com";
$password = "StrongPass1!";

if ($validator->validateEmail($email)) {
    echo "Email is valid.\n";
} else {
    echo "Email is invalid.\n";
}
if ($validator->validatePassword($password)) {
    echo "Password is valid.\n";
} else {
    echo "Password is invalid.\n";
}
