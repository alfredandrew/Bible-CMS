<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CMS Golden Bible
 *
 * @author      
 * @    
 * @license     
 * @link        http://
 */

class Standard_result
{
    /*
     * Exists
     *
     * Checks to that query result found
     *
     * @return bool
     */
    function exists()
    {
        if (isset($this->id))
        {
            return TRUE;
        }

        return FALSE;
    }
}
