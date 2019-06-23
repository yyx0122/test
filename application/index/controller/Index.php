<?php
namespace app\index\controller;
use think\Controller;
use app\index\model\AdminUser;
use think\Session;
use think\Captcha;
/**
 * 登录控制器类
 * @author yyx
 */
class Index extends Controller
{
	/*加载登录页面*/
    public function index()
    {
    	/*显示验证码*/
    	// $config = [
    	// 	'fontSize'=>30,
    	// 	'length'=>4,
    	// 	'useNoise'=> false,
    	// ];
    	// $captcha = new Captcha();
    	//return $captcha->entry();
    	return $this->fetch();
    }

    
    /**
     * 登录验证控制器类
     * @author yyx
     */
    public function checklogin(){
    	/*获取用户提交的数据*/
	    $userdata = [
	        'admin_name'  =>input('post.username'),
	        'password'  =>input('post.password'),
	        //'code'  =>input('post.code'),
	    ];
        // $userdata['admin_name'] = input('post.username');
        // $userdata['password'] = input('post.password');

	    /*实例化模型类*/
	    $usermodel = new AdminUser();
     	$res = $usermodel->checkinfo($userdata);
        //echo $res;die;
        if($res['valid'])
		{
            //登录成功，则记录信息到session中，并跳转页面
            Session::set('adname',$res['msg']['admin_name']);
            Session::set('role',$res['msg']['role_id']);
            Session::set('access',$res['msg']['access']);
			//说明登录成功
			$this->redirect('home/index',302);exit;
		}else{
			//说明登录失败
			$this->error($res['msg']);exit;
		}
	    
    }
}
