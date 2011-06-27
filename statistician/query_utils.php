<?php 

	class QueryUtils {	
		static function get2DArrayFromQuery($queryString) {
			$returnArray = array();
			$returnQuery = mysql_query($queryString);
			if (@mysql_num_rows($returnQuery) == 0) return false;
			$i = 0;
			while ($row = mysql_fetch_assoc($returnQuery)) {
				//iterate thru each row
				foreach($row as $key => $value) {
					$returnArray[$i][$key] = $value;
				}
				++$i;
			}
			return $returnArray;
		}
		
		public static function getResourceIdByName($resourceName) {
			$row = mysql_fetch_assoc(mysql_query("SELECT resource_id FROM resource_desc WHERE description = '{$resourceName}'"));
			return $row['resource_id'];
		}
		
		public static function getResourceNameById($resourceId) {
			$row = mysql_fetch_assoc(mysql_query("SELECT description FROM resource_desc WHERE resource_id = '{$resourceId}'"));
			return $row['description'];
		}
		
		public static function getResourceTable() {
			return QueryUtils::get2DArrayFromQuery("SELECT * FROM resource_desc ORDER BY description ASC");
		}
		
		public static function getKillTypeIdByName($killTypeName) {
			$row = mysql_fetch_assoc(mysql_query("SELECT id FROM kill_types WHERE description = '{$killTypeName}'"));
			return $row['id'];
		}
		
		public static function getKillTypeNameById($killTypeId) {
			$row = mysql_fetch_assoc(mysql_query("SELECT description FROM kill_types WHERE id = '{$killTypeId}'"));
			return $row['description'];
		}
		
		public static function getKillTypeTable() {
			return QueryUtils::get2DArrayFromQuery("SELECT * FROM kill_types ORDER BY id ASC");
		}
		
		public static function getCreatureIdByName($creatureName) {
			$row = mysql_fetch_assoc(mysql_query("SELECT id FROM creatures WHERE creature_name = '{$creatureName}'"));
			return $row['id'];
		}
		
		public static function getCreatureNameById($creatureId) {
			$row = mysql_fetch_assoc(mysql_query("SELECT creature_name FROM creatures WHERE id = '{$creatureId}'"));
			return $row['creature_name'];
		}
		
		public static function getCreatureTable() {
			return QueryUtils::get2DArrayFromQuery("SELECT * FROM creatures ORDER BY id ASC");
		}
		
		public static function getProjectileIdByName($projectileName) {
			$row = mysql_fetch_assoc(mysql_query("SEELCT id FROM projectiles WHERE projectile_name = '{$projectileName}'"));
			return $row['id'];
		}
		
		public static function getProjectileNameById($projectileId) {
			$row = mysql_fetch_assoc(mysql_query("SELECT projectile_name FROM projectiles WHERE id = '{$projectileId}'"));
			return $row['projectile_name'];
		}
		
		public static function getProjectilesTable() {
			return QueryUtils::get2DArrayFromQuery("SELECT * FROM projectiles ORDER BY id ASC");
		}
		
		public static function formatDate($ts){
			return date(DATE_FORMAT, $ts);
		}
		
		public static function formatSecs($ns) {
			$time = "";

			$days = intval((intval($ns) / 86400));
            
            $hours = intval((intval($ns) / 3600) % 24);
			
			$minutes = intval(($ns / 60) % 60);
			
			$seconds = intval($ns % 60);
			
            if ($days > 0) {
                $time .= $days . 'day(s) ';
            }
            
			if ($hours > 0) {
				$time .= $hours . 'hr(s) ';
			}
			if ($minutes > 0) {
				$time .= $minutes . 'min(s) ';
			}
			if ($seconds > 0) {
				$time .= $seconds . 'sec(s)';
			}
			
			return $time;	
		}
	}

?>