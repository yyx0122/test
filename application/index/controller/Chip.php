<?php
namespace app\index\controller;
use think\Controller;
class Chip extends Controller{
	public function index(){
		return $this->fetch();
	}
}