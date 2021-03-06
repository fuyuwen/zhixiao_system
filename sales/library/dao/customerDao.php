<?php
//客户管理
if (!defined('IS_INITPHP')) exit('Access Denied!');

class customerDao extends Dao{
	public $tableName = 'zx_customer_pool';

	public function __construct(){
		parent::__construct();
	}

    public function del($id){
       return $this->dao->db->delete_by_field(
		array('customer_pool_id' => $id), $this->tableName);
    }

    public function info($id){
		$sql = sprintf("SELECT * FROM %s WHERE customer_pool_id=%s",$this->tableName,$id);
		return $this->dao->db->get_one_sql($sql);
    }

	public function getCustomers($limit,$offset,$where){
		$sql = sprintf("SELECT * FROM %s where 1=1 $where limit $limit,$offset",$this->tableName);
		return $this->dao->db->get_all_sql($sql);
	}

	public function getCustomersCount($where){
		$sql = "SELECT count(customer_pool_id) AS count FROM 
				$this->tableName where 1=1 $where";
		return $this->dao->db->get_one_sql($sql);
	}
	
    public function addSave($data){
        return $this->dao->db->insert($data, $this->tableName);
    }

	public function add($adminId){
	    $adminDao 		= InitPHP::getDao('admin');
	    $yaoqingDao 	= InitPHP::getDao('user_yaoqingma_list');
	    $id 			= $adminDao->GetToZiXiTongUserId($adminId);
		if(!isset($id) || empty($id)){
			return -1;
		}
		//得到当前登录销售系统的线上百合贷的UID
	    $uid 			= intval($id['id']);
		
		//获取邀请的客户/投资人的UID list
	    $investorUids 	= $yaoqingDao->getUidlist($uid);
		if(!isset($investorUids) || empty($investorUids)){
			//未找到客户或者投资人
			return -1;
		}
	    $investInfo		= $this->getInvestInfo($investorUids);
		return $investInfo;
	}
		
	//客户分配原型中对应的投资人/邀请人信息汇总
	public function getInvestInfo($array){
	    if(!isset($array) || empty($array)){
	        return -1;
	    }

	    $adminDao = InitPHP::getDao('admin');
	    $tmparray = array();
	    foreach ($array as $key => $val){
	        $arr = $this->getUserinfo(intval($val['uid']));
	        if(!empty($arr)){
	            $salesUid = $adminDao->GetToZiXiTongAdminId(intval($arr['friends']));
	            $salesInfo = $this->getYaoQingRenUserInfo($salesUid);
				$arr['inviter_id'] 		= $salesUid;
	            $arr['inviter_name']	= $salesInfo['sales_login_name'];
	            $arr['inviter_department_id'] = $salesInfo['department_id'];
	            $arr['inviter_role_id'] = $salesInfo['role_id'];
	            $arr['inviter_off_time'] = $salesInfo['update_time'];
	            //$arr['bumenname'] = $salesInfo['bumenname'];
	            //$arr['department_name'] = $salesInfo['department_name'];
	            $salesNameInfo = $this->getXiaoShouName(intval($arr['friends']));
	            //$arr['yaoqingrenloginname'] = $salesNameInfo['baihedailoginname'];
	            //$arr['YaoqingrenUsrName'] = $salesNameInfo['UsrName'];
	            $istrue = $this->IsUserWhethertoinvest(intval($arr['investor_id']));
	            //$istrue = $this->IsUserWhethertoinvest(intval($arr['id']));
	            if($istrue == true){
	                $arr['invest_status'] = 1;
	            }else{
	                $arr['invest_status'] = 0;
	            }
				$arr['create_time'] = time();
				$arr['update_time'] = time();
				
				unset($arr['friends']);

				//调用addSave方法写入数据库.
				$this->addSave($arr);

	            $tmparray=array_merge($tmparray,array($arr));
	        }
	    }
	   return $tmparray;
	}
	/************************************************************
	 * @copyright(c): 2017年3月22日
	 * @Author:  yuwen
	 * @Create Time: 下午4:08:57
	 * @qq:32891873
	 * @email:fuyuwen88@126.com
	 * @查询邀请人姓名，部门信息
	 * @传入当前用户UID查询出邀请的人姓名，所属部门，角色
	 *************************************************************/
	public function getYaoQingRenUserInfo($uid){
	     $sql=sprintf("SELECT a.`user` as sales_login_name,a.department_id as department_id,a.gid as role_id,a.update_time, b.`name`as bumenname,c.department_name from zx_admin as a LEFT JOIN zx_role as b ON a.gid=b.id LEFT JOIN zx_department as c ON c.department_id=a.department_id where a.id=%s",$uid);
	     return  $this->dao->db->get_one_sql($sql);
	}
	/************************************************************
	 * @copyright(c): 2017年3月22日
	 * @Author:  yuwen
	 * @Create Time: 下午3:45:07
	 * @qq:32891873
	 * @email:fuyuwen88@126.com
	 * @获取用户名信息
	 *************************************************************/
	public function getUserinfo($uid){
	    $sql=sprintf("select a.`id` as investor_id,a.`username` as investor_login_name,c.`UsrName` as investor_real_name,b.`phone` as investor_cellphone,a.`create_time`,d.`friends` from cp_user as a LEFT JOIN cp_user_info as b ON b.uid=a.id LEFT JOIN cp_user_huifu as c ON c.uid=a.id LEFT JOIN cp_user_yaoqingma_list as d ON d.uid=a.id where a.id=%s",$uid);
	    return  $this->dao->db->get_one_sql($sql);
	}
	
	/************************************************************
	 * @copyright(c): 2017年3月22日
	 * @Author:  yuwen
	 * @Create Time: 下午4:36:42
	 * @qq:32891873
	 * @email:fuyuwen88@126.com
	 * @独立获取销售人员的真实姓名
	 * @这里的uid是线销售系统的uid，不是后台系统的uid注意注意
	 *************************************************************/
	public function getXiaoShouName($uid){
	    $sql=sprintf("SELECT a.`username` as baihedailoginname,b.UsrName from cp_user as a LEFT join  cp_user_huifu as b ON b.uid=a.id where a.id=%s",$uid);
	    return  $this->dao->db->get_one_sql($sql);
	}
	/************************************************************
	 * @copyright(c): 2017年3月22日
	 * @Author:  yuwen
	 * @Create Time: 下午4:49:27
	 * @qq:32891873
	 * @email:fuyuwen88@126.com
	 * @判断用户是否投资
	 * $uid传入用户uid
	 *************************************************************/
	public function IsUserWhethertoinvest($uid){
	    $sql=sprintf("SELECT id from cp_deal_order WHERE id=%s and `status`=2",$uid);
	    $res = $this->dao->db->get_one_sql($sql);
	    if(!empty($res)){
	        return true;
	    }else{
	        return false;
	    }
	}
	
	public function getClientUid($clientId){
	    $sql="select count(*) as count from zx_customer_record where investor_id = $clientId";
	    $res = $this->dao->db->get_one_sql($sql);
	    if(!empty($res)){
	        return $res['count'];
	    }else{
	        return 0;
	    }
	}
	
	/**
	 * 修改用户记录表，把zx_customer_record表 principal字段默认设置为0
	 * @param unknown $clientId
	 */
	public function updateCustomerRecord($clientId){
	    return $this->dao->db->update_by_field(array('principal'=>0), array('investor_id'=>$clientId), 'zx_customer_record');
	}
}
