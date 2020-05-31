<?php
use App\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $this->View('welcome');
    }

    public function index2()
    {
        $this->View('welcome');
    }
}
