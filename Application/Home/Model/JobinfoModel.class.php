<?php 
namespace Home\Model;

use Think\Model;

class JobinfoModel extends Model
{
	protected $tableName = 'job_info';
	public function get_id($job)
	{
		$str = 'select id from job_info where job_name ="'.$job.'"';
		$data = $this -> query($str);
		return $data;	
	}
	public function get_jobname(){
		$str = 'select * from job_info';
		$data = $this->query($str);
		return $data;
	}
}



