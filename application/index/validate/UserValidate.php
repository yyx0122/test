<?php
namespace app\index\validate;
use think\Validate;
class UserValidate extends Validate{
	/*定义验证规则*/
    protected $rule = [
        'admin_name' =>'require|alphaDash|length:5,10',
        'password'=>'require|length:6,10',
        //'code'  =>'require'
    ];
    /*定义错误信息*/
    protected $messages = [
        'name.require'=>'用户名不能为空',
        'name.length'=>'用户名长度在5-10个字符',
        'password.require'=>'密码不能为空',
        'password.length'=>'密码长度在6-10个字符',
        //'code.require'=>'验证码不能为空',

    ];
}
