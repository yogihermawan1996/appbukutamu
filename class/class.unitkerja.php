<?php
class UnitKerja{
	
	private $conn;
	private $table_name = "tbl_unitkerja";
	public $id_unitkerja;
	public $unit_kerja;
	
	public function __construct($db){
		$this->conn = $db;
	}
	
	//simpan data
	function insert(){
		
		$query = "insert into ".$this->table_name." values(?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_unitkerja);
		$stmt->bindParam(2, $this->unit_kerja);
	
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	//menampilkan data
	function read(){

		$query = "SELECT * FROM ".$this->table_name." ORDER BY id_unitkerja ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	// memanggil id untuk update
	function readOne(){
		
		$query = "SELECT * FROM " . $this->table_name . " WHERE id_unitkerja=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id_unitkerja);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->id_unitkerja = $row['id_unitkerja'];
		$this->unit_kerja = $row['unit_kerja'];
	}
	
	// update data
	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					unit_kerja = :unit_kerja 
				WHERE
					id_unitkerja = :id_unitkerja";

		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':unit_kerja', $this->unit_kerja);
		$stmt->bindParam(':id_unitkerja', $this->id_unitkerja);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	// delete data
	function delete(){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE id_unitkerja = ?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_unitkerja);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}

	function countUnitkerja() {

		$query = "SELECT COUNT(*) AS jumlah FROM ".$this->table_name." ";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		echo $row['jumlah'];
	}
}
?>
