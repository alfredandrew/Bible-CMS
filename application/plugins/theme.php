<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/**
 * CMS Golden Bible
 *
 * @author      
 * @    
 * @license     
 * @link        http://
 */

class Theme_plugin extends Plugin
{
    public function partial()
    {
        $data = $this->attributes();
        unset($data['name']);

        return theme_partial($this->attribute('name'), $data);
    }
}

