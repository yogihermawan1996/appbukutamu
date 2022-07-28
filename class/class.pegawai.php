<?php
class Pegawai{
	
	private $conn;
	private $table_name = "tbl_pegawai";
	public $id_pegawai;
	public $unit_kerja;
	public $nip;
	public $nama;
	public $no_telp;
	
	public function __construct($db){
		$this->conn = $db;
	}
	
	//simpan data
	function insert(){
		
		$query = "insert into ".$this->table_name." values(?,?,?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_pegawai);
		$stmt->bindParam(2, $this->unit_kerja);
		$stmt->bindParam(3, $this->nip);
		$stmt->bindParam(4, $this->nama);
		$stmt->bindParam(5, $this->no_telp);
	
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	//menampilkan data
	function read(){

		$query = "SELECT * FROM ".$this->table_name." ORDER BY id_pegawai ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}
	
	// memanggil id untuk update
	function readOne(){
		
		$query = "SELECT * FROM " . $this->table_name . " WHERE id_pegawai=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id_pegawai);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->id_pegawai = $row['id_pegawai'];
		$this->unit_kerja = $row['unit_kerja'];
		$this->nip = $row['nip'];
		$this->nama = $row['nama'];
		$this->no_telp = $row['no_telp'];
	}
	
	// update data
	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					unit_kerja = :unit_kerja,
					nip = :nip,
					nama = :nama,
					no_telp = :no_telp 
				WHERE
					id_pegawai = :id_pegawai";

		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':unit_kerja', $this->unit_kerja);
		$stmt->bindParam(':nip', $this->nip);
		$stmt->bindParam(':nama', $this->nama);
		$stmt->bindParam(':no_telp', $this->no_telp);
		$stmt->bindParam(':id_pegawai', $this->id_pegawai);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	// delete data
	function delete(){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE id_pegawai = ?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_pegawai);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}

	function countPegawai() {

		$query = "SELECT COUNT(*) AS jumlah FROM ".$this->table_name." ";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		echo $row['jumlah'];
	}
}
?>
