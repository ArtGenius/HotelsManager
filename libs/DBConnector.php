<?php
class DBUnit{
	private $mysqli=false;
	
	function __construct(){
		$this->mysqli = new mysqli("localhost","root", "", "hotels");
		$this->mysqli->query("SET NAMES utf8");
		$this->mysqli->query("SET CHARACTER SET utf8");
		$this->mysqli->query('SET COLLATION_CONNECTION="utf8_bin"' );
	}
	
	function selectAllFromTable($table){
		$result_set=$this->mysqli->query("SELECT*FROM `$table`");
		$this->closeDB();
		return $this->resultSetToArray($result_set);
	}
	
	function select($table, $where){
		fwrite(fopen("log.txt", "a"), "select = SELECT*FROM `$table` WHERE $where\n");
		$q="SELECT*FROM $table WHERE $where";
		$result_set=$this->mysqli->query($q);
		$this->closeDB();
		return $this->resultSetToArray($result_set);
	}
	
	function update($table, $set, $where){
		fwrite(fopen("log.txt", "a"), "UPDATE $table SET $set WHERE $where\n");
		$success=$this->mysqli->query("UPDATE $table SET $set WHERE $where");
		return $success;
	}
	
	function delete($table, $where){
		fwrite(fopen("log.txt", "a"), "DELETE FROM `$table` WHERE $where");
		$success=$this->mysqli->query("DELETE FROM `$table` WHERE $where");
		return $success;
	}
	
	function query($query){
		$result_set=$this->mysqli->query($query);
		$this->closeDB();
		return $this->resultSetToArray($result_set);
	}
	
	function closeDB(){
		$this->mysqli->close();
	}
	
	private function resultSetToArray($result_set){
	$array=array();
	while(($row=$result_set->fetch_assoc())!=false )$array[]=$row;
	return $array;
}
}