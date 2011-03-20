<?php
 /* Diamond option based cache */
 
class Diamond_Cache {
	function Diamond_Cache() {
	}
	
	function check_group($group) {
		$old_cache = get_option('diamond_cache_'. $group);
		$new_cache = array ();
		
		//print_r($old_cache);
		if ($old_cache)
			foreach ($old_cache AS $c) {				
				//print_r(time() - $c['time']);
				if (time() - $c['time'] < $c['expire']) {
					$new_cache[$c['key']] = $c;
				}
			}
		//print_r($new_cache);
		update_option('diamond_cache_'. $group, $new_cache);
		return $new_cache;
	}
	
	function getSettings($group, $key) {
		$settings = get_option('diamond_cache_settings');
		//print_r($settings);
		if (!$settings[$group])
			$settings[$group] = array ();
		return $settings[$group][$key];
	}
	
	function addSettings($group, $key, $value) {
		$settings = get_option('diamond_cache_settings');
		$settings[$group][$key] = $value;
		update_option('diamond_cache_settings', $settings);		
	}
	
	function get($key, $group) {
		$cache = $this->check_group($group) ;
		if (!$cache[$key]) 
			return false;
		return $cache[$key]['content'];
	}
	
	function add($key, $group, $value, $expire = -1) {
		$cache = $this->check_group($group) ;
		if ($expire == -1)	{
			$expire = $this->getSettings($group, 'expire');			
			
			//print_r('rokkk:' . $group .'-'. $expire);
			if (!$expire)
				$expire = 120;
		}
		if ($expire == 0)
			return;
		$cache[$key]  = array ( 'key' => $key, 'content' => $value, 'expire' => $expire, 'time' => time());
		update_option('diamond_cache_'. $group, $cache);
	}	
}

$DiamondCache = new Diamond_Cache();

?>