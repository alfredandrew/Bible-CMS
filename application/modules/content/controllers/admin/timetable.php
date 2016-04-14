<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Timetable extends Admin_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
    // ------------------------------------------------------------------------

    /*
     * Index
     *
     * Display timetable and add new time table 

     * @return void
     */
	function index()
	{

        
        $data = array();
        $data['breadcrumb'] = set_crumbs(array(current_url() => 'Timetable'));

        // Load libraries and models
        $this->load->model('timetable_model');
        
        $data['alldata']=array('Monday'=>$this->timetable_model->get_timetable(1),
            'Tuesday'=>$this->timetable_model->get_timetable(2),
            'Wednesday'=>$this->timetable_model->get_timetable(3),
            'Thursday'=>$this->timetable_model->get_timetable(4),
            'Friday'=>$this->timetable_model->get_timetable(5),
            'Saturday'=>$this->timetable_model->get_timetable(6),
            'Sunday'=>$this->timetable_model->get_timetable(7),
            
                  );

        $this->template->view('admin/timetable/timetable', $data);
	}
    function add()
    {
        // Init
        $data = array();
        $data['breadcrumb'] = set_crumbs(array('content/timetable' => 'Timetable', current_url() => 'Add Timetable'));

        $this->load->model('timetable_model');
       
       
        // Form Validation
        $this->form_validation->set_rules('week_day', 'Week Day', 'trim|required');
        $this->form_validation->set_rules('event_time', 'Event Time', 'trim|required');
        $this->form_validation->set_rules('event', 'Event Description', 'trim|required');
        

        
        if ($this->form_validation->run() == TRUE)
        {
           $save = array('week_day_id'=>$this->input->post('week_day'),
                        'event_time'=>$this->input->post('event_time'),
                        'event'=>$this->input->post('event'),
                        );
           $this->db->insert('timetable',$save);
           $this->session->set_flashdata('message', '<p class="success">Changes Saved.</p>');
           redirect(ADMIN_PATH . "/content/timetable/add/");
        }
        else
        {
            $this->template->view('admin/timetable/add', $data);
        }
        

        
        
    }
    function edit($id)
    {
        // Init
        $data = array();

        $data['breadcrumb'] = set_crumbs(array('content/timetable' => 'Timetable', current_url() => 'Edit Timetable'));

        $this->load->model('timetable_model');
        $data['timetable']=$this->timetable_model->get_onetimetable($id);

        // Form Validation
        $this->form_validation->set_rules('week_day', 'Week Day', 'trim|required');
        $this->form_validation->set_rules('event_time', 'Event Time', 'trim|required');
        $this->form_validation->set_rules('event', 'Event Description', 'trim|required');
        

        
        if ($this->form_validation->run() == TRUE)
        {
           $save = array('week_day_id'=>$this->input->post('week_day'),
                        'event_time'=>$this->input->post('event_time'),
                        'event'=>$this->input->post('event'),
                        );
           $this->db->where('id',$id);
           $this->db->update('timetable',$save);
           $this->session->set_flashdata('message', '<p class="success">Changes Saved.</p>');
           redirect(ADMIN_PATH . "/content/timetable/edit/$id");
        }
        else
        {
            $this->template->view('admin/timetable/edit', $data);
        }
        

        
        
    }
// ------------------------------------------------------------------------

    /*
     * Delete
     *
     * Delete entries and data associated to it

     * @return void
     */
    function delete()
    {
        $this->load->helper('file');
        $this->load->model('timetable_model');

        if ($this->input->post('selected'))
        {
            $selected = $this->input->post('selected');
        }
        else
        {
            $selected = (array) $this->uri->segment(5);
        }
        
       $this->db->where_in('id', $selected);
        $deleted =$this->db->delete('timetable');
        //$Entries->where_in('id', $selected)->get();

if($deleted)
{          

                $message .= '<p class="success">The selected items were successfully deleted.</p>';
           

            $this->session->set_flashdata('message', $message);
       
}
        redirect(ADMIN_PATH . '/content/timetable');
    }

    

}

