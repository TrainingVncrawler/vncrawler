<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class My_layout 
{
    
    var $obj;
    var $layout;

    function My_layout($layout = "")
    {
        $this->obj =& get_instance();
        $this->layout = $layout;
    }

    function setLayout($layout)
    {
      $this->layout = $layout;
    }

    function view($view, $data=null, $return=false)
    {
        $loadedData = array();
        $loadedData['content_for_layout'] = $this->obj->load->view($view,$data,true);

        if($return)
        {
            $output = $this->obj->load->view($this->layout, $loadedData, true);
            return $output;
        }
        else
        {
            $this->obj->load->view($this->layout, $loadedData, false);
        }
    }
	 function add_messenge($messenge,$field = NULL)
    {
        //If Field Null, then set $messgenge not Field
        if($field == NULL)
            $this->_error_array[]       = $messenge; 
        else
        {
            $this->_error_array[$field] = $messenge; 
            // Build our master array
            $this->_field_data[$field] = array(
            'field'                 => $field,
            'label'                 => 'Captcha',
            'rules'                 => 'recaptcha',
            'is_array'              => false,
            //'keys'                => $indexes,
            'postdata'              => NULL,
            'error'                 => $messenge
            );
        }
    }

    /**
    * Ki?m tra URL
    * 
    * @param mixed $str
    */
    function valid_url($str){

        $pattern = "/^(http|https):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i";
        if (!preg_match($pattern, $str))
        {
            return FALSE;
        }

        return TRUE;
    }

}