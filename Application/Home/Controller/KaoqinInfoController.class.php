<?php 
namespace Home\Controller;

use Think\Controller;
/**
 * 考勤统计页面
 * 统计结果信息存入$showdata 
 * $showdata[i][0] | 姓名
 * $showdata[i][1] | 工号
 * $showdata[i][2] | 部门
 * $showdata[i][3] | 职位
 * $showdata[i][4] | 早打卡
 * $showdata[i][5] | 晚打卡
 * $showdata[i][6] | 连续打卡
 * $showdata[i][0] | 状态 
 */
class KaoqinInfoController extends Controller{
	public function index(){
		$userm = D('User');
		$depm = D('Depinfo');
		$jobm = D('Jobinfo');
		$kaoqinm = D('Kaoqin');
		$userdata = $userm->getInfo();
		$jobdata = $jobm->get_jobname();
		$depdata = $depm->get_depname();
		$kaodata = $kaoqinm->get_kaoqin();	
		$showdata = array();
		$ztime = date("Y-m-d 08:00:00",time());
		$etime = date("Y-m-d 17:00:00",time());
		for($i = 0; $i < count($userdata); $i++){
			$showdata[$i]['name'] = $userdata[$i]['name'];
			$showdata[$i]['work_id'] = $userdata[$i]['work_id'];
			for($j = 0; $j < count($depdata); $j++){
				if($userdata[$i]['dep_id'] == $depdata[$j]['id']){
					$showdata[$i]['dep'] = $depdata[$j]['dep_name'];
				}
			}
			for($j = 0; $j <count($jobdata) ; $j++){
				if($userdata[$i]['job_id'] == $jobdata[$j]['id']){
					$showdata[$i]['job'] = $jobdata[$j]['job_name'];
				}
			}
			for($m = 0;$m <count($kaodata);$m++){
				if($userdata[$i]['work_id'] == $kaodata[$m]['work_id']){
					$showdata[$i]['start'] = $kaodata[$m]['start'];
					$showdata[$i]['end'] = $kaodata[$m]['end'];
					$showdata[$i]['day'] = $kaodata[$m]['day'];
				}
				if($showdata[$i]['start'] < date('Y-m-d', time()))
				{
					$showdata[$i]['status'] = '缺勤';
				}
				else if($showdata[$i]['start'] > date('Y-m-d 08', time()))
				{
					if($showdata[$i]['end'] < date('Y-m-d', time()) || $showdata[$i]['end'] >= date('Y-m-d 17', time()))
					{
						$showdata[$i]['status'] = '迟到';
					}
					else
					{
						$showdata[$i]['status'] = '迟到、早退';
					}
				}
				else
				{
					if($showdata[$i]['end'] < date('Y-m-d', time()) || $showdata[$i]['end'] >= date('Y-m-d 17', time()))
					{
						$showdata[$i]['status'] = '正常';
					}
					else
					{
						$showdata[$i]['status'] = '早退';
					}
				}
			}
		}
		// var_dump($showdata);
		$this->assign(['data' => $showdata]);
		$this->display();
	}

}



