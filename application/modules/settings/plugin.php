<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CMS Golden Bible
 *
 * @author      
 * @    
 * @license     
 * @link        http://
 */

class Settings_plugin extends Plugin
{
    public function site_name()
    {
        $CI =& get_instance();
        return $CI->settings->site_name;
    }
}

