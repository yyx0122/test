<?php
namespace app\index\controller;
use think\Controller;
class Home extends Controller{
	public function index(){
		return $this->fetch();
	}
}