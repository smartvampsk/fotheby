<?php 
	// creating class
	class DatabaseWork{
		public $pdo; public $table;
		// constructor
		function __construct($pdo, $table){
			$this->pdo = $pdo;
			$this->table = $table;
		}
		// passing data to save. i.e. to insert and update
		function save($data, $primaryKey=''){
		    try {
		        $this->insert($data);
		    }
		    catch (Exception $e) {
		        $this->update($data, $primaryKey);
		    }
		}
		// function to insert data into table
		function insert($data) {
		    $key = array_keys($data);
		    $values = implode(', ', $key);
		    $valuesWithColon = implode(', :', $key);
		    $query = 'INSERT INTO ' . $this->table . ' (' . $values . ') VALUES (:' . $valuesWithColon . ')';
		    $stmt = $this->pdo->prepare($query);
		    $stmt->execute($data);
		}
		// finction to update data
		function update($data, $primaryKey){
		    $query = 'UPDATE ' . $this->table. ' SET ';
		    $parameters = [];
		    foreach ($data as $key => $value) {
		         $parameters[] = $key . ' = :'. $key;
		    } 
		    $query .= implode(', ', $parameters);
		    $query .= ' WHERE ' . $primaryKey . ' = :primaryKey';
		    $data['primaryKey'] = $data[$primaryKey];
		    $stmt = $this->pdo->prepare($query);
		    $stmt->execute($data);
		}

		// function to find value
		function find($field, $value) {
	        $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value');
	        $criteria = [
	                'value' => $value
	        ];
	        $stmt->execute($criteria);
	        return $stmt;
		}

		// function to find all the data
		function findAll() {
	        $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table );
	        $stmt->execute();
	        return $stmt;
		}

		// function to delete the data from a table
		function delete($field, $value){
		    $stmt = $this->pdo->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $field . ' = :value');
		    $criteria = [
		        	'value' => $value
		   		];
		    $stmt->execute($criteria);
		    return $stmt;
		}
	}
?>