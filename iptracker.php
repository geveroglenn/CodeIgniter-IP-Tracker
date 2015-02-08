<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*********************************************************************
 * Description: Tracks the number of website visits everyday. 
 * Version: 1.0.0
 * Date Created: January 09, 2015
 * Author: Glenn Tan Gevero
 * Website: http://app-arsenal.com
 * File: IP Tracker Library File
**********************************************************************/

class Iptracker{
		
	private $sys = null;
	
	public function __construct(){
		$this->sys	=& get_instance();
        $this->sys->load->library('user_agent');
	}
	
	private static function get_ip_address(){		
		$ip = getenv('HTTP_CLIENT_IP')?:
			getenv('HTTP_X_FORWARDED_FOR')?:
			getenv('HTTP_X_FORWARDED')?:
			getenv('HTTP_FORWARDED_FOR')?:
			getenv('HTTP_FORWARDED')?:
			getenv('REMOTE_ADDR');		
		return $ip;
	}
	
	private function get_page_visit(){
		return current_url();
	}
    
    private function get_user_agent(){        
        if ($this->sys->agent->is_browser()){
            $agent = $this->sys->agent->browser().' '.$this->sys->agent->version();
        }
        elseif ($this->sys->agent->is_robot()){
            $agent = $this->sys->agent->robot();
        }
        elseif ($this->sys->agent->is_mobile()){
            $agent = $this->sys->agent->mobile();
        }
        else{
            $agent = 'Unidentified User Agent';
        }

        return $agent;
    }
	
	public function save_site_visit(){
		$ip 	= self::get_ip_address();
		$page	= self::get_page_visit();
        $agent  = self::get_user_agent();
		$seg    = explode("-", $page);
		
		if(!in_array('admin', $seg)){			
			$data = array(
				'ip'            => $ip,
				'page_view'     => $page,
                'user_agent'    => $agent,
				'date'          => time()
			);
			
			$this->sys->db->insert('site_visits', $data);			
		}
	}
}

$tracker = new Iptracker();
$tracker->save_site_visit();
