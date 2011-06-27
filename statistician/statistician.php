<?php
	/* I beg you, please leave this area, touching anything here will just lead to you complaining on the forums */
	/* unless you know what you're doing, then, by all means, be my guest, touch away. ~ ChaseHQ */

	require_once('config.php');
	require_once('_serverObj.php');
	require_once('_playerObj.php');
	require_once('query_utils.php');

	class STATISTICIAN {
	
		private $sql_connection;
		private $_ObjServer;
		
		function __construct() {
			$this->secureGlobals();		
				
			@$sql_connection = mysql_connect(DB_SERVER,DB_USER,DB_PASSWORD) or die("Statistician Web Interface could not acquire connection to Database");
			@mysql_select_db(DB_NAME) or die("Statistician Web Interface connected to SQL server but could not select the database");

			$this->_ObjServer = new SERVER();
		}
		
		function __destruct() {
			@mysql_close();
		}
		
		private function secureSuperGlobalGET(&$value, $key) {
			$_GET[$key] = htmlspecialchars(stripslashes($_GET[$key]));
			$_GET[$key] = str_ireplace("script", "blocked", $_GET[$key]);
			$_GET[$key] = mysql_escape_string($_GET[$key]);
			return $_GET[$key];
		}
		
		private function secureSuperGlobalPOST(&$value, $key) {
			$_POST[$key] = htmlspecialchars(stripslashes($_POST[$key]));
			$_POST[$key] = str_ireplace("script", "blocked", $_POST[$key]);
			$_POST[$key] = mysql_escape_string($_POST[$key]);
			return $_POST[$key];
		}
		
		private function secureGlobals() {
			array_walk($_GET, array($this, 'secureSuperGlobalGET'));
			array_walk($_POST, array($this, 'secureSuperGlobalPOST'));
		}
		
		public function getServer() {
			return $this->_ObjServer;
		}
		
		public function getDatabaseVersion() {
			$row = mysql_fetch_assoc(mysql_query("SELECT * FROM config"));
			return $row['dbVersion'];
		}
		
	}

?>