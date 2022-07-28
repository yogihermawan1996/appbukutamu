<?php
class User{
	
	private $conn;
	private $table_name = "tbl_user";
	public $id_user;
	public $nama;
	public $level;
	public $username;
	public $password;
	
	public function __construct($db){
		$this->conn = $db;
	}
	
	//simpan data
	function insert(){
		
		$query = "insert into ".$this->table_name." values(?,?,?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_user);
		$stmt->bindParam(2, $this->nama);
		$stmt->bindParam(3, $this->level);
		$stmt->bindParam(4, $this->username);
		$stmt->bindParam(5, $this->password);
		
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	//menampilkan data
	function read(){

		$query = "SELECT * FROM ".$this->table_name." ORDER BY id_user ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	// memanggil id untuk update
	function readOne(){
		
		$query = "SELECT * FROM " . $this->table_name . " WHERE id_user=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id_user);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->id_user = $row['id_user'];
		$this->nama = $row['nama'];
		$this->level = $row['level'];
		$this->username = $row['username'];
		$this->password = $row['password'];
	}
	
	// update data
	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					nama = :nama, 
					level = :level, 
					username = :username, 
					password = :password
				WHERE
					id_user = :id_user";

		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':nama', $this->nama);
		$stmt->bindParam(':level', $this->level);
		$stmt->bindParam(':username', $this->username);
		$stmt->bindParam(':password', $this->password);
		$stmt->bindParam(':id_user', $this->id_user);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	// delete data
	function delete(){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE id_user = ?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_user);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
}
?>
