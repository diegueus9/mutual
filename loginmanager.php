<?php

class LoginManager{
	
	private $myStrUsername = null;
	private $myStrPassword = null;
	private $myBoolLogOk = false;
	
	public function __construct($strUsername, $strPassword){
		
		//temporalmente unico usuario - unico password
		$this->myStrUsername = "admin";
		$this->myStrPassword = md5("admin");
		
		if ($strUsername == $this->myStrUsername && $strPassword == $this->myStrPassword) {
			$_SESSION["username"] = $strUsername;
			$this->myBoolLogOk = true;
		}		
		
	}
	
	public function redirect (){
		
		$strPage = "index.php";
		echo "<script language=\"javascript\">";
		echo "window.location=\"$strPage\"";
		echo "</script>";
		echo "<p>Javascript is disabled in your browser.  <a href='$strPage'>Click here</a> to continue.</p>";
		
	}
	
	public function isLogged(){		
		return $this->myBoolLogOk;
	}
	
}

?>