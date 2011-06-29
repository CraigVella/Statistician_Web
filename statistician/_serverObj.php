<?php
	/* I beg you, please leave this area, touching anything here will just lead to you complaining on the forums */
	/* unless you know what you're doing, then, by all means, be my guest, touch away. ~ ChaseHQ */
	
	require_once('_playerObj.php');
	require_once('query_utils.php');
	
	class SERVER {
		public function getPlayer($uuid) {
			return new PLAYER($uuid);
		}

		public function getAllPlayers() {
			$uuids = QueryUtils::get2DArrayFromQuery("SELECT uuid FROM players ORDER BY player_name ASC");
			
			if (!$uuids) return array();
			
			$playerArray = array();
			foreach($uuids as $uuid) {
				array_push($playerArray,$this->getPlayer($uuid['uuid']));
			}
			return $playerArray;
		}
		
		public function getAllPlayersOnline() {
			$uuids = QueryUtils::get2DArrayFromQuery("SELECT uuid FROM players WHERE online = 'Y' ORDER BY player_name ASC");
			
			if (!$uuids) return array();
			
			$playerArray = array();
			foreach($uuids as $uuid) {
				array_push($playerArray,$this->getPlayer($uuid['uuid']));
			}
			return $playerArray;
		}
		
		public function getPlayersTable($limit = false, $limitStart = 0, $limitNumber = 0) {
			if (!$limit)
				return QueryUtils::get2DArrayFromQuery("SELECT * FROM players ORDER BY player_name ASC");
			else 
				return QueryUtils::get2DArrayFromQuery("SELECT * FROM players ORDER BY player_name ASC LIMIT {$limitStart},{$limitNumber}");
		}
		
		public function getUptimeInSeconds() {
			$sut = $this->getStartupTime();
			$sdt = $this->getLastShutdownTime();
			if ($sdt > $sut) return 0;
			$now = time();
			return $now - $sut;
		}
		
		public function getStartupTime() {
			$row = mysql_fetch_assoc(mysql_query("SELECT `startup_time` FROM `server`"));
			return $row['startup_time'];
		}
		
		public function getLastShutdownTime() {
			$row = mysql_fetch_assoc(mysql_query("SELECT `shutdown_time` FROM `server`"));
			return $row['shutdown_time'];
		}
		
		public function getNumberCurrentOnline() {
			return mysql_num_rows(mysql_query("SELECT uuid FROM players WHERE online = 'Y'"));
		}
	
		public function getNumberOfLoginsTotal() {
			$row = mysql_fetch_assoc(mysql_query("SELECT SUM(num_logins) AS total FROM players"));
			return $row['total'];
		}
		
		public function getMaxPlayersEverOnline() {
			$row = mysql_fetch_assoc(mysql_query("SELECT `max_players_ever_online` FROM `server`"));
			return $row['max_players_ever_online'];
		}
		
		public function getMaxPlayersEverOnlineTimeWhenOccured() {
			$row = mysql_fetch_assoc(mysql_query("SELECT `max_players_ever_online_time` FROM `server`"));
			return $row['max_players_ever_online_time'];
		}
		
		public function getNumberOfSecondsLoggedOnTotal() {
			$row = mysql_fetch_assoc(mysql_query("SELECT SUM(num_secs_loggedon) AS total FROM players"));
			return $row['total'];
		}
		
		public function getDistanceTraveledTotal() {
			$row = mysql_fetch_assoc(mysql_query("SELECT SUM(distance_traveled) AS total FROM players"));
			return $row['total'];
		}
		
		public function getDistanceTraveledByMinecartTotal() {
			$row = mysql_fetch_assoc(mysql_query("SELECT SUM(distance_traveled_in_minecart) AS total FROM players"));
			return $row['total'];
		}
		
		public function getDistanceTraveledByBoatTotal() {
			$row = mysql_fetch_assoc(mysql_query("SELECT SUM(distance_traveled_in_boat) AS total FROM players"));
			return $row['total'];
		}
		
		public function getDistanceTraveledByPigTotal() {
			$row = mysql_fetch_assoc(mysql_query("SELECT SUM(distance_traveled_on_pig) AS total FROM players"));
			return $row['total'];
		}
		
		public function getDistanceTraveledByFootTotal() {
			return $this->getDistanceTraveledTotal() - ($this->getDistanceTraveledByMinecartTotal() + $this->getDistanceTraveledByBoatTotal() + $this->getDistanceTraveledByPigTotal());
		}
		
		public function getBlocksDestroyedOfTypeTotal($id) {
			$row = mysql_fetch_assoc(mysql_query("SELECT SUM(num_destroyed) AS num_destroyed FROM blocks WHERE block_id = '{$id}'"));
			return $row['num_destroyed'];
		}
		
		public function getBlocksPlacedOfTypeTotal($id){
			$row = mysql_fetch_assoc(mysql_query("SELECT SUM(num_placed) AS num_placed FROM blocks WHERE block_id = '{$id}'"));
			return $row['num_placed'];
		}
		
		public function getBlocksDestroyedTotal() {
			$row = mysql_fetch_assoc(mysql_query("SELECT SUM(num_destroyed) AS destroyedTotal FROM blocks"));
			return $row['destroyedTotal'];
		}
		
		public function getBlocksPlacedTotal() {
			$row = mysql_fetch_assoc(mysql_query("SELECT SUM(num_placed) AS placedTotal FROM blocks"));
			return $row['placedTotal'];
		}
        
        public function getBlocksMostDestroyed() {
            
            $highest = 0;
            $idOfHighest = -1;
            
            foreach (QueryUtils::getResourceTable() as $resource) {
                $test = $this->getBlocksDestroyedOfTypeTotal($resource['resource_id']);
                if ($test > $highest) {
                    $highest = $test;
                    $idOfHighest = $resource['resource_id'];
                }
            }
            
            return $idOfHighest;
        }
        
        public function getBlocksMostPlaced() {
  
            $highest = 0;
            $idOfHighest = -1;
            
            foreach (QueryUtils::getResourceTable() as $resource) {
                $test = $this->getBlocksPlacedOfTypeTotal($resource['resource_id']);
                if ($test > $highest) {
                    $highest = $test;
                    $idOfHighest = $resource['resource_id'];
                }
            }
            
            return $idOfHighest;
        }
		
		public function getBlockTable() {
			return QueryUtils::get2DArrayFromQuery("SELECT * FROM blocks");
		}
		
		public function getPickedUpOfTypeTotal($id) {
			$row = mysql_fetch_assoc(mysql_query("SELECT SUM(num_pickedup) AS num_pickedup FROM pickup_drop WHERE item = '{$id}'"));
			return $row['num_pickedup'];
		}
		
		public function getDroppedOfTypeTotal($id) {
			$row = mysql_fetch_assoc(mysql_query("SELECT SUM(num_dropped) AS num_dropped FROM pickup_drop WHERE item = '{$id}'"));
			return $row['num_dropped'];
		}
		
		public function getPickedUpTotal() {
			$row = mysql_fetch_assoc(mysql_query("SELECT SUM(num_pickedup) AS totalPickedup FROM pickup_drop"));
			return $row['totalPickedup'];
		}
		
		public function getDroppedTotal() {
			$row = mysql_fetch_assoc(mysql_query("SELECT SUM(num_dropped) AS totalDropped FROM pickup_drop"));
            return $row['totalDropped'];
		}
        
        public function getMostPickedUp() {
            $highest = 0;
            $idOfHighest = -1;
            
            foreach (QueryUtils::getResourceTable() as $resource) {
                $test = $this->getPickedUpOfTypeTotal($resource['resource_id']);
                if ($test > $highest) {
                    $highest = $test;
                    $idOfHighest = $resource['resource_id'];
                }
            }
            
            return $idOfHighest;
        }
        
        public function getMostDropped() {
            $highest = 0;
            $idOfHighest = -1;
            
            foreach (QueryUtils::getResourceTable() as $resource) {
                $test = $this->getDroppedOfTypeTotal($resource['resource_id']);
                if ($test > $highest) {
                    $highest = $test;
                    $idOfHighest = $resource['resource_id'];
                }
            }
            
            return $idOfHighest;
        }
		
		public function getPickupDropTable() {
			return QueryUtils::get2DArrayFromQuery("SELECT * FROM pickup_drop");
		}
		
		public function getKillTable($limit = false, $limitStart = 0, $limitNumber = 0) {
			if (!$limit)
				return QueryUtils::get2DArrayFromQuery("SELECT * FROM kills ORDER BY id DESC");
			else 
				return QueryUtils::get2DArrayFromQuery("SELECT * FROM kills ORDER BY id DESC LIMIT {$limitStart},{$limitNumber}");
		}
		
		public function getKillTablePVP($limit = false, $limitStart = 0, $limitNumber = 0) {
			$playerCreatureId = QueryUtils::getCreatureIdByName("Player");
			if (!$limit)
				return QueryUtils::get2DArrayFromQuery("SELECT * FROM kills WHERE killed = '{$playerCreatureId}' AND killed_by = '{$playerCreatureId}' ORDER BY id DESC");
			else 
				return QueryUtils::get2DArrayFromQuery("SELECT * FROM kills WHERE killed = '{$playerCreatureId}' AND killed_by = '{$playerCreatureId}' ORDER BY id DESC LIMIT {$limitStart},{$limitNumber}");
		}
		
		public function getKillTablePVE($limit = false, $limitStart = 0, $limitNumber = 0) {
			$playerCreatureId = QueryUtils::getCreatureIdByName("Player");
			$noneCreatureId = QueryUtils::getCreatureIdByName("None");
			$blockCreatureId = QueryUtils::getCreatureIdByName("Block");
			if (!$limit)
				return QueryUtils::get2DArrayFromQuery("SELECT * FROM kills WHERE (killed != '{$playerCreatureId}' AND killed != '{$noneCreatureId}' AND killed != '{$blockCreatureId}') XOR (killed_by != '{$playerCreatureId}' AND killed_by != '{$noneCreatureId}' AND killed_by != '{$blockCreatureId}') ORDER BY id DESC");
			else
				return QueryUtils::get2DArrayFromQuery("SELECT * FROM kills WHERE (killed != '{$playerCreatureId}' AND killed != '{$noneCreatureId}' AND killed != '{$blockCreatureId}') XOR (killed_by != '{$playerCreatureId}' AND killed_by != '{$noneCreatureId}' AND killed_by != '{$blockCreatureId}') ORDER BY id DESC LIMIT {$limitStart},{$limitNumber}");
		}
		
		public function getKillTableOther($limit = false, $limitStart = 0, $limitNumber = 0) {
			$noneCreatureId = QueryUtils::getCreatureIdByName("None");
			$blockCreatureId = QueryUtils::getCreatureIdByName("Block");
			if (!$limit)
				return QueryUtils::get2DArrayFromQuery("SELECT * FROM kills WHERE (killed = '{$noneCreatureId}' OR killed = '{$blockCreatureId}') XOR (killed_by = '{$noneCreatureId}' OR killed_by = '{$blockCreatureId}') ORDER BY id DESC");
			else 
				return QueryUtils::get2DArrayFromQuery("SELECT * FROM kills WHERE (killed = '{$noneCreatureId}' OR killed = '{$blockCreatureId}') XOR (killed_by = '{$noneCreatureId}' OR killed_by = '{$blockCreatureId}') ORDER BY id DESC LIMIT {$limitStart},{$limitNumber}");
		}
		      
        public function getMostKillerPVP() {
            $highest = 0;
            $playerOfHighest = null;
            
            foreach ($this->getAllPlayers() as $player) {
            	$res = $player->getPlayerKillTableCreature(QueryUtils::getCreatureIdByName("Player"));
            	
            	if ($res)
                	$test = count($res);
                	else
                	$test = 0;
                	
                if ($test > $highest) {
                    $highest = $test;
                    $playerOfHighest = $player;
                }
            }
            
            return $playerOfHighest;
        }
        
        public function getMostKilledPVP() {
            $highest = 0;
            $playerOfHighest = null;
            
            foreach ($this->getAllPlayers() as $player) {
            	$res = $player->getPlayerDeathTableCreature(QueryUtils::getCreatureIdByName("Player"));
            	
            	if ($res)
                	$test = count($res);
                	else
                	$test = 0;
                	
                if ($test > $highest) {
                    $highest = $test;
                    $playerOfHighest = $player;
                }
            }
            
            return $playerOfHighest;
        }
        
        public function getMostDangerousWeapon() {
            $highest = 0;
            $idOfHighest = -1;
            $idOfNone = QueryUtils::getResourceIdByName("None");
            
            foreach (QueryUtils::getResourceTable() as $resource) {
            	if ($resource['resource_id'] == $idOfNone) continue;
            	
            	$res = $this->getKillTableUsing($resource['resource_id']);
            	
            	if ($res)
                	$test = count($res);
                	else
                	$test = 0;
                	
                if ($test > $highest) {
                    $highest = $test;
                    $idOfHighest = $resource['resource_id'];
                }
            }
            
            return $idOfHighest;
        }
        
        public function getMostDangerousPVECreature() {
        	$ignoreID = QueryUtils::getCreatureIdByName("Player");
        	$noneID = QueryUtils::getCreatureIdByName("None");
        	$blockID = QueryUtils::getCreatureIdByName("Block");
        	
        	$highest = 0;
        	$idOfHighest = 0;
        	
        	foreach (QueryUtils::getCreatureTable() as $creatureRow) {
        		
        		if ($creatureRow['id'] == $ignoreID) continue;
        		if ($creatureRow['id'] == $noneID) continue;
        		if ($creatureRow['id'] == $blockID) continue;
        		
        		$res = $this->getKillTableCreature($creatureRow['id']);
        		
        		if ($res)
        			$test = count($res);
        			else
        			$test = 0;
        		
        		if ($test > $highest) {
        			$highest = $test;
        			$idOfHighest = $creatureRow['id'];
        		}
        	}
        	
        	return $idOfHighest;
        }
        
        public function getMostKilledPVECreature() {
        	$ignoreID = QueryUtils::getCreatureIdByName("Player");
        	$noneID = QueryUtils::getCreatureIdByName("None");
        	$highest = 0;
        	$idOfHighest = 0;
        	
        	foreach (QueryUtils::getCreatureTable() as $creatureRow) {
        		
        		if ($creatureRow['id'] == $ignoreID) continue;
        		if ($creatureRow['id'] == $noneID) continue;
        		
        		$res = $this->getDeathTableCreature($creatureRow['id']);
        		if ($res)
        		$test = count($res);
        		else
        		$test = 0;
        		
        		if ($test > $highest) {
        			$highest = $test;
        			$idOfHighest = $creatureRow['id'];
        		}
        	}
        	
        	return $idOfHighest;
        }
		
		public function getKillTableCreature($creatureTypeId) {
			return QueryUtils::get2DArrayFromQuery("SELECT * FROM kills WHERE killed_by = '{$creatureTypeId}'");
		}
		
		public function getDeathTableCreature($creatureTypeId) {
			return QueryUtils::get2DArrayFromQuery("SELECT * FROM kills WHERE killed = '{$creatureTypeId}'");
		}
		
		public function getKillTableType($killTypeId) {
			return QueryUtils::get2DArrayFromQuery("SELECT * FROM kills WHERE kill_type = '{$killTypeId}'");
		}

		
		public function getKillTableUsing($itemId) {
			return QueryUtils::get2DArrayFromQuery("SELECT * FROM kills WHERE killed_using = '{$itemId}'");
		} 
				
		public function getKillTableProjectile($projectileId) {
			return QueryUtils::get2DArrayFromQuery("SELECT * FROM kills WHERE killed_projectile = '{$projectilId}'");
		}
		
	}
?>