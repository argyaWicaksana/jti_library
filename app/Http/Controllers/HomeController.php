<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index', [
            "title" => 'Home'
        ]);
    }
    public function login()
    {
        return view('login', [
            "title" => 'Login'
        ]);
    }
    public function register()
    {
        return view('register', [
            "title" => 'Register'
        ]);
    }
    public function about()
    {
        return view('home.about', [
            "title" => 'About'
        ]);
    }
    public function contactus()
    {
        return view('home.contactus', [
            "title" => 'Contactus'
        ]);
    }
}
