<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Representative extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Representative_model');
	}
	public function index(){
		$data = array();

		//ziskanie sprav zo session
		if($this->session->userdata('success_msg')){
			$data['success_msg'] = $this->session->userdata('success_msg');
			$this->session->unset_userdata('success_msg');
		}
		if($this->session->userdata('error_msg')){
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		}

		$data['repre'] = $this->Representative_model->ZobrazZnamkySpravne();
		$data['nazov'] = 'Zoznam známok';
		//nahratie zoznamu studentov
		$this->load->view('templates/header', $data);
		$this->load->view('representative/index', $data);
		$this->load->view('templates/footer');
	}

	// Zobrazenie detailu o reprezentantovi
	public function view($id){
		$data = array();

		//kontrola, ci bolo zaslane id riadka
		if(!empty($id)){
			$data['repre'] = $this->Representative_model->ZobrazZnamkySpravne($id);
			$data['title'] = 'Detail známky';

			//nahratie detailu zaznamu
			$this->load->view('templates/header', $data);
			$this->load->view('representative/view', $data);
			$this->load->view('templates/footer');
		}else{
			redirect('/representative');
		}
	}

	// pridanie zaznamu o reprezentantovi
	public function add(){
		$data = array();
		$postData = array();

		//zistenie, ci bola zaslana poziadavka na pridanie zaznamu
		if($this->input->post('postSubmit')){
			//definicia pravidiel validacie
			$this->form_validation->set_rules('Name', 'Pole znamka', 'required');
			$this->form_validation->set_rules('Surname', 'Pole datum', 'required');
			//$this->form_validation->set_rules('predmet', 'Pole predmet', 'required');
			$this->form_validation->set_rules('idcountry', 'Pole student', 'required');

			//priprava dat pre vlozenie
			$postData = array(
				'Name' => $this->input->post('Name'),
				'Surname' => $this->input->post('Surname'),
				//'predmet' => $this->input->post('predmet'),
				'idcountry' => $this->input->post('idcountry'),
			);

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//vlozenie dat
				$insert = $this->Representative_model->insert($postData);

				if($insert){
					$this->session->set_userdata('success_msg', 'Záznam o reprezentantovi bol úspešne vložený');
					redirect('/representative');
				}else{
					$data['error_msg'] = 'Nastal problém pri vkladani.';
				}
			}
		}
		$data['post'] = $postData;
		$data['country'] = $this->Representative_model->NaplnDropdownStudenti();
		$data['vybrana_krajina'] = '';
		$data['title'] = 'Pridať borca';
		$data['action'] = 'add';

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('representative/add-edit', $data);
		$this->load->view('templates/footer');
	}

	// aktualizacia dat o borcovi
	public function edit($id){
		$data = array();
		//ziskanie dat z tabulky
		$postData = $this->Representative_model->ZobrazZnamkySpravne($id);

		//zistenie, ci bola zaslana poziadavka na aktualizaciu
		if($this->input->post('postSubmit')){
			//definicia pravidiel validacie
			$this->form_validation->set_rules('Name', 'Pole znamka', 'required');
			$this->form_validation->set_rules('Surname', 'Pole datum', 'required');
			//$this->form_validation->set_rules('predmet', 'Pole predmet', 'required');
			$this->form_validation->set_rules('idcountry', 'Pole student', 'required');

			// priprava dat pre aktualizaciu
			$postData = array(
				'Name' => $this->input->post('Name'),
				'Surname' => $this->input->post('Surname'),
				//'predmet' => $this->input->post('predmet'),
				'idcountry' => $this->input->post('idcountry'),
			);

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//aktualizacia dat
				$update = $this->Representative_model->update($postData, $id);

				if($update){
					$this->session->set_userdata('success_msg', 'Záznam o borcovi bol aktualizovaný.');
					redirect('/representative');
				}else{
					$data['error_msg'] = 'Nastal problém pri edite.';
				}
			}
		}

		$data['country'] = $this->Representative_model->NaplnDropdownStudenti();
		$data['vybrana_krajina'] = $postData['idcountry'];
		$data['post'] = $postData;
		$data['title'] = 'Aktualizovať údaje';
		$data['action'] = 'edit';

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('representative/add-edit', $data);
		$this->load->view('templates/footer');
	}

	// odstranenie dat o znamke
	public function delete($id){
		//overenie, ci id nie je prazdne
		if($id){
			//odstranenie zaznamu
			$delete = $this->Representative_model->delete($id);

			if($delete){
				$this->session->set_userdata('success_msg', 'Záznam bol odstránený.');
			}else{
				$this->session->set_userdata('error_msg', 'Záznam sa nepodarilo odstrániť.');
			}
		}

		redirect('/representative');
	}
}

