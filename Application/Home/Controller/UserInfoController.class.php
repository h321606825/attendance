<?php 
namespace Home\Controller;

use Think\Controller;

class UserInfoController extends Controller{
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

		for($i = 0; $i < count($userdata); $i++){
			$showdata[$i]['name'] = $userdata[$i]['name'];
			$showdata[$i]['work_id'] = $userdata[$i]['work_id'];
			for($j = 0; $j < count($depdata); $j++){
				if($userdata[$i]['dep_id'] == $depdata[$j]['id']){
					$showdata[$i]['dep'] = $depdata[$j]['dep_name'];
					$showdata[$i]['dep_tel'] = $depdata[$j]['dep_tel'];
				}
			}
			for($j = 0; $j <count($jobdata) ; $j++){
				if($userdata[$i]['job_id'] == $jobdata[$j]['id']){
					$showdata[$i]['job'] = $jobdata[$j]['job_name'];
				}
			}
			$showdata[$i]['tel'] = $userdata[$i]['telphone'];
			$showdata[$i]['eml'] = $userdata[$i]['email'];
		}
		$this->assign(['data' => $showdata]);
		$this->display();
	}
	public function deleteinfo()
	{
		$work_id = (int)I('post.work_id');
		$userm   = D('User');
		$userm->deleteinfo($work_id);
	}
}
