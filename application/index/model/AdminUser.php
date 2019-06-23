<?php
namespace app\index\model;

use think\Db;
use think\Model;
use think\Loader;
//use think\Validate;
use think\sae\Log;
//use page;
/*用户登录验证*/
class AdminUser extends Model
{
    /*设置模型对应的数据表名称*/
    protected $table = 'admin_user';

    
    /**
     * 验证用户登录信息
     * @param  array $userdata 用户登录信息数组
     * @return array           
     */
    public function checkinfo($userdata){
        $validate = Loader::Validate('UserValidate');
        // $validate = new Validate($this->rule,$this->messages);
        if(!$validate->check($userdata)){
            return ['valid'=>0,'msg'=>$validate->getError()];
        }
        /*通过验证后，检测用户名或者密码是否存在*/
        /*验证SQL执行时间*/
        // Db::listen(function($sql, $time, $explain){
        //     // 记录SQL
        //     echo $sql. ' ['.$time.'s]';
        //     // 查看性能分析结果
        //     dump($explain);
        // });
        $result = $this->where($userdata)->find();
        //return $result;die;
        if(!empty($result)){
            return ['valid'=>1,'msg'=>$result];
        }else{
            return ['valid'=>0,'msg'=>'用户名或密码错误'];
        }

    }

    /**
     * 查询所有管理员信息
     * @author yyx 
     * 
     * 
     */
    public function getAlluser(){
        $list = $this->alias('u')->field('role_name,role_num,u.*')->join('admin_role r','u.role_id = r.role_id','INNER')->where('u.is_delete',0)->paginate(2);
        return $list;
    }

    
}