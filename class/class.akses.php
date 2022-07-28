<?php 
error_reporting(0);
class Akses
{
    private $conn;
    private $table_name = "tbl_user";
    public $user;
    public $userid;
    public $passid;

    public function __construct($db){
        $this->conn = $db;
    }

    public function login()
    {
        $user = $this->checkCredentials();
        if ($user) {
            $this->user = $user;
            session_start();
            $_SESSION['id_user']        = $user['id_user'];
            $_SESSION['nama']     = $user['nama'];
            $_SESSION['level']   = $user['level'];
            $_SESSION['username']        = $user['username'];
            return $user['nama'];
        }
        return false;
    }

    protected function checkCredentials()
    {
        $stmt = $this->conn->prepare('SELECT * FROM '.$this->table_name.' WHERE username=? and password=? ');
        $stmt->bindParam(1, $this->userid);
        $stmt->bindParam(2, $this->passid);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            $submitted_pass = $this->passid;
            if ($submitted_pass == $data['password']) {
                return $data;
            }
        }
        return false;
    }

    public function getUser()
    {
        return $this->user;
    }
  
}
?>
