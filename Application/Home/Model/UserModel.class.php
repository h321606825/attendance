<?php 
namespace Home\Model;

use Think\Model;

class UserModel extends Model
{
	protected $tableName = 'user';

	 public function check($work_id,$password)
	 {
	 	$data = $this ->field('password')
	 				  ->where('work_id = %d',$work_id)
	 				  ->find();
	 	if($password === $data['password'])
	 	{
	 		return true;
	 	}else
	 	{
	 		return false;
	 	}
	 }

	 public function ins($work_id,$password,$name,$depart,$job,$phone,$email)
	 {
	 	$data =  array(
				'work_id'  => $work_id,
				'password' => $password,
				'name'     => $name,
				'dep_id'   => $depart,
				'job_id'   => $job,
				'telphone' => $phone,
				'email'    => $email
	 	);
	 	$this -> add($data);
	 }

	 public function getInfo(){
	 	$data = $this->query("SELECT * from user");
	 	return $data;
	 }
	 public function deleteinfo($work_id){
	 	$str = 'delete from kaoqin where work_id = "'.$work_id.'"';
	 	$this -> execute($str);
	 	$str = 'delete from user where work_id = "'.$work_id.'"';
	 	$this -> execute($str);
	 	return true;
	 }
}





