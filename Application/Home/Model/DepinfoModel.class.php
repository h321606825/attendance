<?php 
namespace Home\Model;

use Think\Model;

class DepinfoModel extends Model
{
	protected $tableName = 'dep_info';
	public function get_id($depart)
	{
		$str = 'select id from dep_info where dep_name ="'.$depart.'"';
		$data = $this -> query($str);
		return $data;	
	}
	public function get_depname(){
		$str = 'select * from dep_info';
		$data = $this->query($str);
		return $data;
	}
}





