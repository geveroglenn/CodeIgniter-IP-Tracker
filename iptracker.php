<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*********************************************************************
 * Software: App Arsenal Website
 * Description: Tracks the number website visits everyday. 
 * Version: 2.1.2
 * Date Created: January 09, 2015
 * Author: Glenn Tan Gevero
 * Website: http://app-arsenal.com
 * File: IP Tracker Library File
**********************************************************************/

class Iptracker{
		
	private $sys = null;
	
	public function __construct(){
		$this->sys	=& get_instance();			
	}
	
	public static function get_ip_address(){		
		$ip = getenv('HTTP_CLIENT_IP')?:
			getenv('HTTP_X_FORWARDED_FOR')?:
			getenv('HTTP_X_FORWARDED')?:
			getenv('HTTP_FORWARDED_FOR')?:
			getenv('HTTP_FORWARDED')?:
			getenv('REMOTE_ADDR');		
		return $ip;
	}
	
	public static function get_page_visit(){
		return current_url();
	}
	
	public function save_site_visit(){
		$ip 	= self::get_ip_address();
		$page	= self::get_page_visit();		
		$seg = explode("-", $page);
		
		if(!in_array('dimiyo', $seg)){			
			$data = array(
				'ip'		=> $ip,
				'page_view'	=> $page,
				'date'		=> time()
			);
			
			$this->sys->db->insert('your_table_name', $data);			
		}
	}
}

$tracker = new Iptracker();
$tracker->save_site_visit();
