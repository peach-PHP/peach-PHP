<?php
use App\Controller;
use App\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome.view.php');
    }

    public function index2()
    {
        User::where('name', '1')->get();
        return view('welcome.view.php', ["abc" => "xyz", "pqr" => "mno"]);
    }
}
