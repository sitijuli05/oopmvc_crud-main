<?php // file : oopmvc/model/anggota_model.php //

class Anggota_model {
    protected $db;

    public function __construct($database){
        $this->db=$database;
    }

    public function getAnggota() {
        $link = $this->db->openDbConnection();
        $result = $link->query("SELECT *FROM anggota ORDER BY Id");

        $anggota = array();
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $anggota[] = $row;
        }
        $this->db->closeDbConnection($link);

        return $anggota;
        
    }
    public function getAnggotabyId($id){
        $link = $this->db->openDbConnection();

        $query = "SELECT *FROM anggota WHERE Id =:id";
        $statement = $link->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $row = $statement->fetch(PDO::FETCH_ASSOC);
        $this->db->closeDbConnection($link);
        return $row;
    }

    public function insert(){
        $link = $this->db->openDbConnection();
        $query = "INSERT INTO anggota (nama, tanggal_lahir, kota_lahir) 
                  VALUES (:nama, :tanggal_lahir, :kota_lahir)";
        $statement = $link->prepare($query);
        $statement->bindValue(':nama', $_POST['nama'], PDO::PARAM_STR);
        $statement->bindValue(':tanggal_lahir', $_POST['tanggal_lahir'], PDO::PARAM_STR);
        $statement->bindValue(':kota_lahir', $_POST['kota_lahir'], PDO::PARAM_STR);
        $statement->execute();

        $this->db->closeDbConnection();
    }

    public function update($id){
        $link = $this->db->openDbConnection();
        $query ="UPDATE anggota SET nama=:nama, tanggal_lahir = :tanggal_lahir, kota_lahir=:kota_lahir WHERE Id = :id";
        $statement = $link->prepare($query);
        $statement->bindValue(':nama', $_POST['nama'], PDO::PARAM_STR);
        $statement->bindValue(':tanggal_lahir', $_POST['tanggal_lahir'], PDO::PARAM_STR);
        $statement->bindValue(':kota_lahir', $_POST['kota_lahir'], PDO::PARAM_STR);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $this->db->closeDbConnection();
    }

    public function delete($id){
        $link = $this->db->openDbConnection();
        $query = "DELETE FROM anggota WHERE Id = :id";
        $statement = $link->prepare($query);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $this->db->closeDbConnection();
    }
}

