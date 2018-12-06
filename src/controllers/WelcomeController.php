<?php
use App\Controller;
use App\User;

class HomeController extends Controller
{
	public function index() {
		$this->View('welcome');
	}
}

?>