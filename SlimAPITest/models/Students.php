<?php

namespace models;
use lib\Core;
use PDO;

class Students {

	protected $core;

	function __construct() {
		$this->core = \lib\Core::getInstance();
	}
	
	// Gets all students
	public function getAll() {
		$r = array();	

		$sql = "SELECT student_id,score,first_name,last_name FROM students";
		$stmt = $this->core->dbh->prepare($sql);		

		if ($stmt->execute()) {
			$r = $stmt->fetchAll(PDO::FETCH_ASSOC);		   	
		} else {
			$r = 0;
		}		
		return $r;
	}

	public function getById($id) {
		$r = array();	

		$sql = "SELECT student_id,score,first_name,last_name FROM students WHERE student_id=:student_id";
		$stmt = $this->core->dbh->prepare($sql);
		$stmt->bindParam(':student_id', $id, PDO::PARAM_INT);

		if ($stmt->execute()) {
			$r = $stmt->fetchAll(PDO::FETCH_ASSOC);		   	
		} else {
			$r = 0;
		}		
		return $r;
	}

	// Inserts a new student
	public function insert($data) {
		try {
			$sql = "INSERT INTO students (score, first_name, last_name) 
					VALUES (:score, :first_name, :last_name)";
			$stmt = $this->core->dbh->prepare($sql);
			if ($stmt->execute($data)) {
				return $this->core->dbh->lastInsertId();
			} else {
				return '0';
			}
		} catch(PDOException $e) {
        	return $e->getMessage();
    	}
	}

	public function update($data,$id) {
		try {
			$sql = "UPDATE students SET score=:score, first_name=:first_name, last_name=:last_name WHERE student_id=$id";
			$stmt = $this->core->dbh->prepare($sql);
			$stmt->bindParam(':score', $data['score'], PDO::PARAM_INT);
			$stmt->bindParam(':first_name', $data['first_name'], PDO::PARAM_STR);
			$stmt->bindParam(':last_name', $data['last_name'], PDO::PARAM_STR);

			return $stmt->execute($data); 
		} catch(PDOException $e) {
        	return $e->getMessage();
    	}
	}

	public function delete($id) {
		try {
			$sql = "DELETE FROM students WHERE student_id=:student_id";
			$stmt = $this->core->dbh->prepare($sql);
			$stmt->bindParam(':student_id', $id, PDO::PARAM_INT);
			return $stmt->execute();
		} catch(PDOException $e) {
        	return $e->getMessage();
    	}
	}
}