<?php
class BukuTamu{
	
	private $conn;
	private $table_name = "tbl_bukutamu";
	public $id_tamu;
	public $tanggal;
	public $no_identitas;
	public $nama;
	public $alamat;
	public $jenis_kelamin;
	public $no_telp;
	public $instansi;
	public $keperluan;
	public $jam_datang;
	public $jam_keluar;
	public $bertemu;
	public $status;
	
	public function __construct($db){
		$this->conn = $db;
	}
	
	//simpan data
	function insert(){
		
		$query = "insert into ".$this->table_name." values(?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_tamu);
		$stmt->bindParam(2, $this->tanggal);
		$stmt->bindParam(3, $this->no_identitas);
		$stmt->bindParam(4, $this->nama);
		$stmt->bindParam(5, $this->alamat);
		$stmt->bindParam(6, $this->jenis_kelamin);
		$stmt->bindParam(7, $this->no_telp);
		$stmt->bindParam(8, $this->instansi);
		$stmt->bindParam(9, $this->keperluan);
		$stmt->bindParam(10, $this->jam_datang);
		$stmt->bindParam(11, $this->jam_keluar);
		$stmt->bindParam(12, $this->bertemu);
		$stmt->bindParam(13, $this->status);
	
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
		
	}
	
	//menampilkan data
	function read(){

		$query = "SELECT * FROM ".$this->table_name." ORDER BY id_tamu ASC";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		
		return $stmt;
	}

	function readDetail(){

		$query = "SELECT * FROM ".$this->table_name." WHERE id_tamu =? LIMIT 0,1";
		
		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id_tamu);
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->id_tamu = $row['id_tamu'];
		$this->tanggal = $row['tanggal'];
		$this->no_identitas = $row['no_identitas'];
		$this->nama = $row['nama'];
		$this->alamat = $row['alamat'];
		$this->jenis_kelamin = $row['jenis_kelamin'];
		$this->no_telp = $row['no_telp'];
		$this->instansi = $row['instansi'];
		$this->keperluan = $row['keperluan'];
		$this->jam_datang = $row['jam_datang'];
		$this->jam_keluar = $row['jam_keluar'];
		$this->bertemu = $row['bertemu'];
		$this->status = $row['status'];
	}
	
	// memanggil id untuk update
	function readOne(){
		
		$query = "SELECT * FROM " . $this->table_name . " WHERE id_tamu=? LIMIT 0,1";

		$stmt = $this->conn->prepare( $query );
		$stmt->bindParam(1, $this->id_tamu);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->id_tamu = $row['id_tamu'];
		$this->nama = $row['nama'];
		$this->jam_keluar = $row['jam_keluar'];
		$this->status = $row['status'];
		
	}
	
	// update data
	function update(){

		$query = "UPDATE 
					" . $this->table_name . " 
				SET 
					nama = :nama,
					jam_keluar = :jam_keluar,
					status = :status
				WHERE
					id_tamu = :id_tamu";

		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(':nama', $this->nama);
		$stmt->bindParam(':jam_keluar', $this->jam_keluar);
		$stmt->bindParam(':status', $this->status);
		$stmt->bindParam(':id_tamu', $this->id_tamu);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		}
	}
	
	// delete data
	function delete(){
	
		$query = "DELETE FROM " . $this->table_name . " WHERE id_tamu = ?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->id_tamu);

		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	}

	function countTamuSelesai() {

		$query = "SELECT COUNT(*) AS jumlah FROM ".$this->table_name." WHERE status = 'Selesai' ";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		echo $row['jumlah'];

		
	}

	function countTamuBelumSelesai() {

		$query = "SELECT COUNT(*) AS jumlah FROM ".$this->table_name." WHERE status = 'Belum Selesai' ";
		$stmt = $this->conn->prepare( $query );
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		echo $row['jumlah'];
	}
}
?>
