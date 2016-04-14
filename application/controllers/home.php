<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/**
 * CMS GoldenBible
 *
 * @author      
 * @    
 * @license     
 * @link        http://cmsGoldenBible.com
 */

class Home extends Public_Controller {

	public function index()
	{
		
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}
}
?>