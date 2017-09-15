<?php

class Language {

    private $theLanguage;   
    public $lang = array();

    public function __construct($inpLanguage){

        $this->theLanguage = $inpLanguage;
    }

	public function userLanguage()
	{
    
		if ($this->theLanguage == 'English')
		{        
			$file = './../config/languages/eng.ini';
			
			if(!file_exists($file))
			{
				echo "Error! File $file Not Found!";
			}
			
			$lang = parse_ini_file($file);    
		}
		elseif ($this->theLanguage == 'Русский')
		{        
			$file = './../config/languages/rus.ini';
			
			if(!file_exists($file))
			{
				echo "Error! File $file Not Found!";
			}
			
			$lang = parse_ini_file($file);    
		}
		
		return $lang;
	}
	
	public function getLanguage()
	{
		return $this->theLanguage;
	}

}

?>