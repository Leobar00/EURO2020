<?php

namespace App\Service;

class Encrypt
{

    public function encryptPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

}