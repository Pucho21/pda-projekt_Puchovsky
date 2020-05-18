<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Events_model');
	}


	public function index(){
		$data = array();
		$data['title'] = 'Events';

		//ziskanie sprav zo session
		if($this->session->userdata('success_msg')){
			$data['success_msg'] = $this->session->userdata('success_msg');
			$this->session->unset_userdata('success_msg');
		}
		if($this->session->userdata('error_msg')){
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		}

		$data['events'] = $this->Events_model->ShowCountries();
		$data['nazov'] = 'Zoznam študentov';
		//nahratie zoznamu krajin
		$this->load->view('templates/header', $data);
		$this->load->view('events/index', $data);
		$this->load->view('templates/footer');
	}

	// pridanie zaznamu o krajine
	public function add(){
		$data = array();
		$postData = array();

		//zistenie, ci bola zaslana poziadavka na pridanie zazanmu
		if($this->input->post('postSubmit')){
			//definicia pravidiel validacie
			$this->form_validation->set_rules('events', 'Pole priezvisko', 'required');

			//priprava dat pre vlozenie
			$postData = array(
				'events' => $this->input->post('events')
			);

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//vlozenie dat
				$insert = $this->Events_model->insert($postData);

				if($insert){
					$this->session->set_userdata('success_msg', 'Event record successfully inserted');
					redirect('/events');
				}else{
					$data['error_msg'] = 'Error adding event.';
				}
			}
		}
		$data['post'] = $postData;
		$data['title'] = 'Add event';
		$data['action'] = 'add';

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('events/add-edit', $data);
		$this->load->view('templates/footer');
	}

	// aktualizacia dat o krajine
	public function edit($id){
		$data = array();
		//ziskanie dat z tabulky
		$postData = $this->Events_model->ShowCountries($id);

		//zistenie, ci bola zaslana poziadavka na aktualizaciu
		if($this->input->post('postSubmit')){
			//definicia pravidiel validacie
			$this->form_validation->set_rules('events', 'Events name', 'required');

			// priprava dat pre aktualizaciu
			$postData = array(
				'events' => $this->input->post('events')
			);

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//aktualizacia dat
				$update = $this->Events_model->update($postData, $id);

				if($update){
					$this->session->set_userdata('success_msg', 'Event record was updated');
					redirect('/events');
				}else{
					$data['error_msg'] = 'Error adding event.';
				}
			}
		}

		$data['post'] = $postData;
		$data['title'] = 'Update data';
		$data['action'] = 'edit';

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('events/add-edit', $data);
		$this->load->view('templates/footer');
	}


	// Zobrazenie detailu o krajine
	public function view($id){
		$data = array();

		//kontrola, ci bolo zaslane id riadka
		if(!empty($id)){
			$data['events'] = $this->Events_model->ShowCountries($id);
			$data['title'] = $data['events']['events'];
			//priklad zretazenia
			//$data['title'] = $data['studenti']['priezvisko'] . ' ' . $data['studenti']['meno'];

			//nahratie detailu zaznamu
			$this->load->view('templates/header', $data);
			$this->load->view('events/view', $data);
			$this->load->view('templates/footer');
		}else{
			redirect('/events');
		}
	}

	// odstranenie dat o krajine
	public function delete($id){
		//overenie, ci id nie je prazdne
		if($id){
			//odstranenie zaznamu
			$delete = $this->Events_model->delete($id);

			if($delete){
				$this->session->set_userdata('success_msg', 'The record was deleted.');
			}else{
				$this->session->set_userdata('error_msg', 'The record could not be deleted.');
			}
		}

		redirect('/events');
	}

}
