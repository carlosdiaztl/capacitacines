<?php

namespace App\services;



class Admin
{
    public function isAdmin()
    {
        return auth()->user() && auth()->user()->role_id ?? auth()->user()->role_id == 1;
    }
}
