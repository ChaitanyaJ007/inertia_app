<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserIndexController extends Controller
{
    public function __invoke()
    {
        return inertia()->render('User/Index');
    }
}
