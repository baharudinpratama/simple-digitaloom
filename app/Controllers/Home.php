<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if (session()->get('is_logged_in')) {
            return redirect()->to('/dashboard');
        } else {
            return redirect()->to('/login');
        }
    }
}
