<?php
	class Converter_model extends CI_Model{
		public function __construct(){
		//Load the database	
			$this->load->database();
		}

		//========Covert time ago
		//:::::::::Time Ago::::::::
      public function timeAgo($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
        $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
		'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
		    );
       foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
		}
        if (!$full) $string = array_slice($string, 0, 1);
       return $string ? implode(', ', $string) . ' ago' : 'just now';

       //===============Closed timeAgo Here
        }
      //Here we want to get all data in the App database
      //=============  
		public function getConvertedNum($limit = FALSE, $offset = FALSE){
			if($limit){
				$this->db->limit($limit, $offset);
			}
			$this->db->order_by('converted.con_id', 'ASC');
			$query = $this->db->get('converted');
			return $query->result_array();

		//===============Closed getConvertedNum Here
		}
		//Because we don't want be duplicating numbers we need to check if the number is already in database
		//Then we print the result back to user intead of inserting duplication into database
		// Check username exists
		public function checkNumExists($NoDuplication){
		//select where con_num  class="alert alert-dismissible alert-info"
			$SendInfo="";
			$this->db->where('con_num', $NoDuplication);
			//if same number already converted send the result instead
			$result = $this->db->get('converted');
            //========Warning
			if($result->num_rows() == 1){
				$TheNum=$result->row(0)->con_num;
				$ConvToRomNum=$result->row(0)->con_num_result;
				$TheTimeDone=$result->row(0)->con_date_time;
               $SendInfo.="<p class='alert alert-dismissible alert-info'>Number Alreday Converted  ".$this->timeAgo($TheTimeDone);
               $SendInfo.="  <span class='label label-warning'>   ".$TheNum; 
               $SendInfo.="   Was Converted To <span class='badge'>". $ConvToRomNum ."</span></p>";
             return $SendInfo;
			} 
			//Otherwise return false to allow new data to saved
			else 
			{
				return false;
			}
		//===============Closed checkNumExists Here
		}
        //Here is the Coverter Class
        public function ConvToRomanNum($NumToBeConverted, $ToUpperCase = true) 
        { 
        //Create Array of Romans Numbers
         $RomanArr = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9, 'V'=>5, 'IV'=>4, 'I'=>1); 
         $IsConverted = ''; 
         //Check do we have number is not zero
        while($NumToBeConverted > 0) 
       { 
       foreach($RomanArr as $RomNum => $RomItems) 
       { 
        if($NumToBeConverted >= $RomItems) 
        { 
        //Subtract Number from Items	
        $NumToBeConverted -= $RomItems; 
        $IsConverted.= $RomNum; 
        break; 
        } 
        } 

       } 
       //this just in case we need to transform the roman character to uupercase
       // we could have something like ConvToRomanNum(intval($Numb), true or false); 
       if($ToUpperCase){
       $DoneConv=ucwords($IsConverted);	
       return $DoneConv; 
       }
       return strtolower($IsConverted); 
       //===============Closed ConvToRomanNum Here   
       } 
        //Keeping record of Converted Numbers
		public function SaveValue(){
		//here we get the user inputted number and convert it to romans number
		$Numb= $this->input->post('ConvNum');
		$Romans=$this->ConvToRomanNum(intval($Numb));
		$CheckTheNumber=$this->checkNumExists($Numb);
		if($CheckTheNumber){
		return	$CheckTheNumber;
		}
		//==========
		else
		{
	    //we create data array to be saved in the database
		$SaveConvertedNumber=array('con_num' => $Numb, 'con_num_result' => $Romans);
		//If all went wrong then print error message	
		if(!$save=$this->db->insert('converted', $SaveConvertedNumber))
		{
return "<p class='alert alert-dismissible alert-danger'>Error ! Number  ".$Numb." <span class='span-result label label-info'> Can not be save to database</span></p>";
		}
		//If all went well then print success message
		return "<p class='alert alert-dismissible alert-success'>Success ! Number  ".$Numb." <span class='span-result label label-info'> Converted To <span class='badge'>". $Romans ."</span></span></p>";

		}		
//===============Closed SaveValue Here
		}
//================>>>
//
//
//
//===============Closed Model Here
		}