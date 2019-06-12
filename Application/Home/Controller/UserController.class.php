<?php 
namespace Home\Controller;

use Think\Controller;

class UserController extends Controller
{
	/**
	 * @return 
	 * 加载登录页（ajax）登录
	 * 0--登录失败
	 * 1--登录成功
	 */
	public function index()
	{
		if(IS_AJAX)
		{
			$work_id = (int)I('post.work_id','');
			$password = I('post.password','');
			if($work_id == 0 || $password == '')
			{
				$this->ajaxReturn(0);
			}
			$password = md5($password);
			$user = D('User');
			if($user->check($work_id,$password))
			{
				session('work_id',$work_id);
				// var_dump(strpos($work_id,'2016')) ;
				// die; 
				if(strpos($work_id,'2016') !== 0)
				{
					$this->ajaxReturn(2);
				}
				$this->ajaxReturn(1);
			}
			$this->ajaxReturn(0);
		}
		$this->display();
	}
	public function sign_out()
	{
		session(null);
		// header('location:/index.php/Home/User');
		header('location:index.html');
		exit;
	}

	/**
	 * 添加职员信息
	 * $error数组表示未填写拦
	 * 0 -->工号未填写 
	 * 1 -->姓名未填写
	 * 2 -->部门未填写
	 * 3 -->职位未填写
	 */
	public function add()
	{
		if(IS_AJAX)
		{
			$work_id  = (int)I('post.id','');
			$password = md5($work_id);
			$name     = I('post.name','');
			$depart   = I('post.depart','');
			$job      = I('post.job','');
			$phone    = I('post.phone','');
			$email    = I('post.email','');
			$depinfo  = D('Depinfo');
			$jobinfo  = D('Jobinfo');
			$error    = array();
			$dep_id   = $depinfo->get_id($depart);
			$job_id   = $jobinfo->get_id($job);
	 		if($work_id == 0)
			{
				$error[] = 0;
			}
			if($name == '')
			{
				$error[] = 1;
			}
			if(count($dep_id) == 0)
			{
				$error[] = 2;
			}
			if(count($job_id) == 0)
			{
				$error[] = 3;
			}
			if(count($error) == 0)
			{
				$user = D('User');
				$user -> ins($work_id,$password,$name,(int)$dep_id[0]['id'],(int)$job_id[0]['id'],$phone,$email);
			}
			$this->ajaxReturn($error);
		}
		$this->display();
	}

/**
	 * 
	 * 打卡界面
	 * 状态码	|码意义
	 * 		0	|打卡失败
	 * 	[0, 0]	|早按时
	 * 	[0, 1]	|早迟到
	 * 	[1, 0]	|晚按时
	 * 	[1, 1]	|晚早退
	 */
	public function kaoqin()
	{
		if(session('work_id') === null)
		{
			header('location:/index.php/Home/User/Index');
			return;
		}
		if(IS_AJAX)
		{
			$id    = session('work_id');
			$start = date('Y-m-d 00:00:00', time());
			$time  = date('Y-m-d 08:00:00', time());
			$mid   = date('Y-m-d 12:00:00', time());
			$old   = date('Y-m-d 17:00:00', time());
			$now   = date('Y-m-d H:i:s', time());

			$clock = D('kaoqin');

			$is_exi = $clock->get_id($id);

			//如果没有记录 新增
			if(count($is_exi) == 0)
			{
				// if($now > $mid)
				// {
					// $this->ajaxReturn(0);
				// }
				$clock->ins($id, $now, $start);
				if($now < $time)
				{
					$this->ajaxReturn([0, 0]);
				}
				else
				{
					$this->ajaxReturn([0, 1]);
				}
			}
			else
			//如果有记录 修改
			{
				$kaoqin = $clock->get_one($id)[0];
				//如果是上午
				// if($now < $mid)
				// {
				// 	//如果没打卡
				// 	if($kaoqin['start'] < $start)
				// 	{
				// 		$clock->upd_s($id, $now, $kaoqin['day'] + 1);
				// 		// if($now < $time)
				// 		// {
				// 			// $this->ajaxReturn([0, 0]);
				// 		// }
				// 		// else
				// 		// {
				// 			$this->ajaxReturn([0, 1]);
				// 		// }
				// 	}
				// 	else
				// 	{
				// 		$this->ajaxReturn(0);
				// 	}
				// }
				// else
				// {
				// 	//如果早上打卡了 下午没打卡
					// if($kaoqin['start'] > $start && $kaoqin['end'] < $start)
					// {
					// 	$clock->upd_e($id, $now);
					// 	if($now > $end)
					// 	{
					// 		$this->ajaxReturn([1, 0]);
					// 	}
					// 	else
					// 	{
					// 		$this->ajaxReturn([1, 1]);
					// 	}
					// }
					// else
					// {
					// 	$this->ajaxReturn(0); 
					// }
				// }
				if(!empty($kaoqin['end'])) {
					$clock->ins($id, $now, $start);
					if($now < $time)
					{
						$this->ajaxReturn([0, 0]);
					}
					else
					{
						$this->ajaxReturn([0, 1]);
					}
				} else {
					if ($kaoqin['start'] > $start)
					{
						$clock->upd_e($id, $now);
						if($now > $end)
						{
							$this->ajaxReturn([1, 0]);
						}
						else
						{
							$this->ajaxReturn([1, 1]);
						}
					}
					else
					{
						$this->ajaxReturn(0); 
					}
				}
			}	
		}
		$this -> display();
	}

}





