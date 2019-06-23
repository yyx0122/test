<?php
namespace app\index\controller;
use think\Controller;
class Testitems extends Controller{
	public function index(){
		return $this->fetch();
	}
}