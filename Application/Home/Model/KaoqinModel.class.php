<?php 
namespace Home\Model;

use Think\Model;

class KaoqinModel extends Model
{
	protected $tableName = 'kaoqin';

	public function ins($id, $now, $end)
	{
		$sql = 'INSERT INTO kaoqin(work_id, start, day) VALUES(' . $id . ',"' . $now . '", 1)';
		$this->execute($sql);
	}

	public function upd_s($id, $now, $day)
	{
		$sql = 'UPDATE kaoqin SET start = "' . $now . '", day = ' . $day . ' WHERE work_id = '. $id;
		$this->execute($sql);
	}

	public function upd_e($id, $end)
	{
		$sql = 'UPDATE kaoqin SET end = "' .$end . '" WHERE work_id = ' . $id;
		$this->execute($sql);
	}

	public function get_id($id)
	{
		$date = 'select work_id from kaoqin where work_id='.$id;
		$data = $this->query($date);
		return $data;
	}

	public function get_one($id)
	{
		$sql = 'SELECT start, end, day FROM kaoqin WHERE work_id = ' . $id . ' order by start desc limit 1';
		return $this->query($sql);
	}

	public function get_kaoqin(){
		$data = $this->query("select * from kaoqin");
		return $data;
	}
}

