<?php
// require_once '../libs/DBConnector.php';
include 'C:/Program Files (x86)/Zend/Apache2/htdocs/HotelsManager/libs/DBConnector.php';
class HotelController {
	private $dbConnector;
	private $tableName;
	private $log;
	function __construct() {
		$this->dbConnector = new DBUnit ();
		$this->tableName = "hotel";
		$this->log = fopen ( "log.txt", "a" );
	}
	// �������� ����� � ��
	function addHotel() {
	}
	function query($query) {
		return $this->dbConnector->query ( $query );
	}
	// �������� ������ ���� ������
	function getHotelsList() {
		return $this->dbConnector->selectAllFromTable ( $this->tableName );
	}
	function select_where($where) {
		return $this->dbConnector->select ( $this->tableName, $where );
	}
	function deleteHotel() {
	}
	function filter($hotels, $addresses, $firms, $ranks) {
		// $query="SELECT * FROM ".$this->tableName;
		// if($hotels!=null|| $addresses!=null|| $firms!=null|| $ranks!=null){
		// $query.=" WHERE ";
		// }
		$query = $this->apendAnd ( array (
				$this->generateInExpressionFromArray ( $hotels, "name" ),
				$this->generateInExpressionFromArray ( $addresses, "address" ),
				$this->generateInExpressionFromArray ( $firms, "firm_id" ),
				$this->generateInExpressionFromArray ( $ranks, "rank" ) 
		) );
		fwrite ( $this->log, "filter= $query\n" );
		return $query;
	}
	private function generateInExpressionFromArray($array, $columnName) {
		fwrite ( $this->log, "generate IN\n" );
		if ($array == null)
			return "";
		$set = "(";
		for($i = 0; $i < sizeof ( $array ); $i ++) {
			$set .= "'" . $array [$i] . "'";
			fwrite ( $this->log, "'$array[$i]'\n" );
			if ($i != sizeof ( $array ) - 1) {
				$set .= ",";
			}
		}
		$set .= ")";
		return " " . $columnName . " IN " . $set;
	}
	private function apendAnd($array) {
		fwrite ( $this->log, "generate AND\n" );
		$result = "";
		$first = 0;
		for($i = 0; $i < sizeof ( $array ); $i ++) {
			$item = $array [$i];
			fwrite ( $this->log, "'$array[$i]'\n" );
			if ($item != "") {
				if ($i != 0 && $first == 1) {
					$result .= " AND ";
				}
				$first = 1;
				$result .= $item;
			}
		}
		return $result;
	}
	function update($hotel, $address, $rank, $firm, $where) {
		fwrite ( $this->log, "update\n" );
		$set = $this->set ( $hotel, $address, $rank, $firm );
		$this->dbConnector->update ( "hotel", $set, $where );
	}
	function delete($where){
		fwrite ( $this->log, "delete\n" );
		$this->dbConnector->delete ( "hotel", $where );
	}
	
	private function set($hotel, $address, $rank, $firm) {
		$result="";
		if ($hotel != "") {
			$result = "`hotel` = '$hotel'";
		}
		if ($address != "") {
			if($hotel != "")$result .= ", ";
			$result .= "`address` = '$address'";
		}
		if ($rank != "") {
			if($hotel != ""||$address != "")$result .= ", ";
			$result .= "`rank` = '$rank'";
		}
		if ($firm != "") {
			if($hotel != ""||$address != ""||$rank != "")$result .= ", ";
			$result .= "`firm_id` = '$firm'";
		}
		fwrite ( $this->log, "set=$result\n" );
		return $result;
	}
}