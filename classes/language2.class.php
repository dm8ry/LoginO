<?php

class Language {

    private $languageArray;
    private $userLanguage;

    public function __construct($language)
    {
        $this->userLanguage = $language;
        $this->languageArray = self::userLanguage($language);
    }
	
    private static function userLanguage($language)
    {

		if ($language == 'English')
		{    
			$file = './../config/languages/eng.ini';	
		}
		elseif ($language == 'Русский')
		{     
			$file = './../config/languages/rus.ini';			
		}
		elseif ($language == 'Français')
		{    
			$file = './../config/languages/fre.ini';		
		}
		elseif ($language == 'Italiano')
		{    
			$file = './../config/languages/ita.ini';		
		}
		elseif ($language == 'Español')
		{    
			$file = './../config/languages/spa.ini';		
		}
		elseif ($language == 'Deutsch')
		{    
			$file = './../config/languages/ger.ini';		
		}		
		else
			$file = './../config/languages/eng.ini'; // default language is English

		if(!file_exists($file))
		{
			echo "Error! File $file Not Found!";
		}
		
		return parse_ini_file($file);		
		
    }

    public function getTranslation($strConstant)
    {
        return $this->languageArray[$strConstant];
    }	
	
	public function getLanguage()
	{
		return $this->userLanguage;
	}

}

?>