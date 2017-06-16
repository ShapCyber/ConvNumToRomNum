<?php
//Main controller
	class Pages extends CI_Controller{
	//Default View
		public function view($page = 'home'){
		//check url is valid
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
		// redirect to 404 page		
				show_404();
			}
			//=====
			//Sub Headers Title Constants
			$data['leftheader']="How It Work";
			$data['rightheader']="Top 10 Number Converted";
			//Get total number alredy converted and print at home page
            $data['totalconv'] = $this->db->count_all('converted'); 
            //here is our default Tile
			$data['title'] = ucfirst($page);
			//just for decoration set default banner			
			$data['banner'] = "<img src='".base_url()."assets/images/RomanNumeralsAppBanner.jpg' width='100%' alt='Romman numbers' />" ;
			//get all data already converted ($limit=false, $offset=false, $Sorting)
			$data['connum'] = $this->Converter_model->getConvertedNum(); 
			//get set numbers of converted number , let say we need only 10 of them i.e 0-9;
			//Or if we want to get from within range say with limit of 5 result and range is 5 to 10
			//$data['ragenum'] = $this->Converter_model->getConvertedNum(5,4);
			//However for this purpose we just need top 10 that is 0-9 result
			$data['specnum'] = $this->Converter_model->getConvertedNum(10,FALSE); 
			//submitted form validation
			// It should be number which is not greater than 3999
			$this->form_validation->set_rules('ConvNum', 'Number Field', 'trim|required|less_than[4000]'); 
			//set message
			$data['SuccessMessage']="";
			//check if the validation run , if all is good we save it to the database
			//Otherwise we print error message
			if ($this->form_validation->run() == FALSE){
			$data['SuccessMessage']="<p class='alert alert-dismissible alert-danger'>Errors ! Make sure number is not greater than 3999 and is a number</p>";
			}
			else
			{
             $data['SuccessMessage']="<p class='sucess'>".$this->Converter_model->SaveValue()."</p>";
			}
		     // here is our default template for the app            
			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);			
			$this->load->view('templates/footer');
			}
		}
