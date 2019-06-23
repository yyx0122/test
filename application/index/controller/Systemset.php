<?php
namespace app\index\controller;
use think\Controller;
class Systemset extends Controller{
	public function index(){
		return $this->fetch();
	}
}