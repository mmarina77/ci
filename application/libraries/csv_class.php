<?php defined('BASEPATH') OR exit('No direct script access allowed');
 
/**
 * CSV_class Class
 *
 * Work with remote servers via cURL much easier than using the native PHP bindings.
 *
 * @category        Libraries
 * @license         http://philsturgeon.co.uk/code/dbad-license
 * @link            http://philsturgeon.co.uk/code/codeigniter-curl
 */

require_once 'defaults.php';

class CSV_class {
	private $fields = '["user_id", "role"]';
	private $search = '["Weekly summary repor","Add VT Report","Add Report","SubaccountB+(s)"]';
	private $replace = '["Weekly_summary_repor","Add_VT_Report","Add_Report","SubaccountB"]';
	private $tpl = null;
	
	public function __construct() {
		$this->search = json_decode($this->search, true);
		$this->replace = json_decode($this->replace, true);
		
		$this->fields = json_decode($this->fields, true);
		$this->tpl = json_decode(MONITOR_TEMPLATES, true);
	}

	private function splitRoles($role) {

		$newRole = str_replace($this->search, $this->replace, $role);
		//}
		$arr = explode(' ', $newRole);
		return $arr;
	}
	
	public function readCSV($filename) {

		$rows = null;
		$handle = fopen($filename, 'r');
		if($handle) {
			$rows = array();
			$i = 0;
			while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
				$num = count($data);
				
				list($user_id, $role) = $data;
				if(strtolower($role) == 'basic') {
//echo "======================== $role =============<br>";
				}
				
				
				for ($c=0; $c < $num; $c++) {
					$item = trim($data[$c]);
					if(intval($data[$c]) > 0 && $this->fields[$c] == 'user_id') {
						$rows[$i][$this->fields[$c]] = intval($item);
					} elseif($this->fields[$c] == 'role') {
						$rows[$i]['sss'] = $item;
						$rows[$i][$this->fields[$c]] = $this->splitRoles($item);
						
					} 
					//else {
					//	$rows[$i][$this->fields[$c]] = $value;
					//}
					//$rows[$i][$this->fields[$c]] = $value;
				}
				$i++;
			}
			fclose($handle);
		}
		return $rows;
	}
	
	private function rowItem(& $row, $name, $fix) {
		
		for($i=0; $i<count($row); $i++) {
		
		
		$rum = 'RUM_';

		if(substr($name, 0, strlen($rum)) == $rum && substr($row[$i], 0, strlen($rum)) == $rum && $name == substr($row[$i], 0, strpos($row[$i], '('))) {
//echo "========name = $name ============".$row[$i]."================<br>";
			//$v = substr($name, strpos($name, '_')+1 );
			$v = substr($row[$i], strpos($row[$i], '('));
			$v = preg_replace('/[^a-zA-Z0-9]/', "", $v);

			
			return intval($v);
			
		} elseif($fix == 'prefix' && $name == substr($row[$i], 0, strlen($name)) ) {

				$v = substr($row[$i], strpos($row[$i], '('));
				$v = preg_replace('/[^a-zA-Z0-9]/', "", $v);
				//echo "**** name=$name **** ".$row[$i]." ******** ". $v." ****<br>";
				return intval($v);
			} elseif($fix == 'suffix' && strpos($row[$i], $name) ) {	// && $name == substr($row[$i], 0, strlen($name)) 
			
				$pos = strpos($row[$i], $name);
				//if($pos) {
				$v = substr($row[$i], strpos($row[$i], '('));
				$v = preg_replace('/[^a-zA-Z0-9]/', "", $v);
				//echo "========name = $name ==== pos=$pos ==== v=$v ========".$row[$i]."================<br>";
				return intval($v);
				//}
			} else {
			
//echo "========name = $name ======== fix=$fix =========".$row[$i]."===============<br>";
			}

		}
		return null;
	}
	
	private function rowInfo(& $row) {
		
		$tpl = $this->tpl;
		foreach($tpl as $key=>$val) {
			$name = $tpl[$key]['name'];
//echo $name."<br>";
			$fix = $tpl[$key]['nameType'];
			if( !isset($tpl[$key]['list']) ) {
				$count = $this->rowItem($row['role'], $name, $fix);
				$tpl[$key]['count'] = $count;
			} else {
				$count = $this->rowItem($row['role'], $name, $fix);
				$tpl[$key]['count'] = $count;
			}
		}

		return $tpl;
	}

	private function resetTotal(& $tpl) {
		foreach($tpl as $key=>$val) {
			$tpl[$key]['total'] = 0;
		}
	}

	
	private function updateTotal(& $row, & $tpl) {
		foreach($tpl as $key=>$val) {
			if(isset($row[$key]) && isset($row[$key]['count']) && $row[$key]['count']) {
				if($tpl[$key]['type'] == 'loc') {
					if($tpl[$key]['total'] < $row[$key]['count']) {
						$tpl[$key]['total'] = $row[$key]['count'];
					}

//if($key == 'uptime_locations'){
//	echo "<br> $key = ".$row[$key]['count'];
//}
				} else {
					$tpl[$key]['total'] += $row[$key]['count'];
				}
			}
		}
		//$tpl['uptime_frequency']['total'] = $tpl['uptime']['total']*$tpl['uptime_locations']['total'];
		//$tpl['full_page_frequency']['total'] = $tpl['full_page']['total']*$tpl['full_page_locations']['total'];
		//$tpl['transaction_frequency']['total'] = $tpl['transaction']['total']*$tpl['transaction_locations']['total'];
	}
	
	public $result = null;
	//public $total = null;
	
	public function calculate(& $list) {
		$arr = array();
		$total = $this->tpl;
		$this->resetTotal($total);
		for($i=0; $i<count($list); $i++) {
			$row = $list[$i];
			$info = $this->rowInfo($row);
			if($info) {
				//$info['sss'] = $row['sss'];
				$info['user_id'] = $row['user_id'];
				$this->updateTotal($info, $total);
				$arr[] = $info;
			}
		}
		$this->total = $total;
		$result = array('total'=>$total, 'users_list'=> $arr);
		$this->result = $result;
		return $this->result;
	}

	public function save_file($new_filename) {
	
		
		
		$total = $this->result['total'];
		$users_list = $this->result['users_list'];
		
//dump($users_list);

		$title = array('User ID');
		$total_row = array('-');
		
		
		$head = 'User ID';
		foreach($total as $key=>$val) {
			$title[] = $total[$key]['title'];
			$head .= '|'.$total[$key]['title'];
		}


		$fp = fopen($new_filename, 'w');
		fputcsv($fp, $title);

		
		for($i=0; $i<count($users_list); $i++) {
			$row = $users_list[$i];
			//echo '<tr>';
			//echo '<td>'.$row['user_id'].'</td>';
			$line = array($row['user_id']);
			foreach($row as $key=>$val) {
				//echo '<td>'.$row[$key]['count'].'</td>';
				$line[] = $row[$key]['count'];
			}
			//echo '</tr>';
			fputcsv($fp, $line);
		}
		
		//fputcsv($fp, explode("|", $head));
		fclose($fp);
		
			// head
		//	$head = 'API: '.$parameters['api'].'|apiKey: '.$parameters['apikey'].'|secretKey: '.$parameters['secretkey'].'|'.
		//		'Hostname: '.$parameters['hostname'].'|Agent key: '.$parameters['agentkey'].'|Date: '.$parameters['date'];
			//fputcsv($fp, explode("|", $head));
		
	}
/*
	public function save( $str, $filename=''){

		if (!$handle = fopen($filename, 'a')) {
			 return false;
		}
		if (fwrite($handle, $str) === FALSE) {
			return false;
		}
		fclose($handle);
		chmod($filename, 0777);
	}
*/
}
