<?php
namespace app\index\controller;
use think\Controller;
class Customer extends Controller{
	public function index(){
		return $this->fetch();
	}
}