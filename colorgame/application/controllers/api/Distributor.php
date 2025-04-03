<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distributor extends CI_Controller 
{

	function show_city()
	{
		$result = array();
		$html = '';
		$id = $this->input->post('id');
		$city = $this->crud->selectDataByMultipleWhere('city',array('state_id'=>$id));
		if(!empty($city))
		{
			foreach($city as $value)
			{
				$html .= "<option value='".$value->id."'>".$value->name."</option>";
			}

            $result['message']    = "Success";
			$result['status']  = "200";
            $result['data']    = $html;
		}
		else
		{
			$result['message'] = "Not Found.";
            $result['status']  = "400";
            $result['data']    = $html;
		}
		echo json_encode($result);
	}




    /*use hoistory*/

    public function wallet_history()
    {
    	$result = array();
    	$html = '';
    	$user_id = $this->input->post('user_id');

    	$page = $this->input->post("page");
    	$limit = 5;
        $offset = 0;

        if($page>0)
    	{
	    	$offset = $page*$limit;
	    }
	    $this->db->limit($limit,$offset);
	    $this->db->order_by('id desc');
    	$user_history = $this->crud->selectDataByMultipleWhere('user_history',array('user_id'=>$user_id));

    	if(!empty($user_history))
    	{
    		$response_data['data'] = $user_history;
    		$html = $this->load->view('app/distributor/wallet-list',$response_data,true);

    		$result['status'] = '200';
    		$result['message'] = 'SUCESS';
    		$result['data'] = $html;
    	}
    	else
    	{
    		$result['status'] = '400';
    		$result['message'] = 'Data Not Found';
    		$result['data'] = [];
    	}
    	echo json_encode($result);
    }
































}