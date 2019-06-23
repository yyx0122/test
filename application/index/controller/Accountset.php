<?php
namespace app\index\controller;
use think\Controller;
use think\Session;
use think\Request;
use app\index\model\AdminUser;

class Accountset extends Controller{
	public function index(){
		/*查询所有用户信息，只有超级管理员才有此权限*/
		if(intval(Session::get('role')) != 1){
			return $this->redirect('home/index',302);
		}
		$AdminUser = new AdminUser;
		$list = $AdminUser->getAlluser();
		//dump(Request::instance()->session());
		//dump(input('session.'));
		//dump($list);
		$this->assign('list',$list);
		return $this->fetch();
	}


	/**
	 * 显示管理员权限详情
	 */
	public function showlist(Request $request){
		if($request->isAjax()){
			$data = $request->param();
			return $data;
		}
	}

	/**
	 * 删除管理员
	 */
	public function deleteuser(){

	}
}