<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/**
 * CMS Golden Bible
 *
 * @author      
 * @    
 * @license     
 * @link        http://
 */

class Secure_plugin extends Plugin
{
    public function is_auth()
    {
        return ($this->secure->is_auth()) ? 1 : 0;
    }
}


