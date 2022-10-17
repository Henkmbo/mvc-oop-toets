<?php
  class RichestPerson {
   
    private $db;

    public function __construct() {
      $this->db = new Database();
    }

    public function getRichestPeople() {
      $this->db->query("SELECT * FROM `richestpeople` ORDER BY Nettworth DESC;");
      $result = $this->db->resultSet();
      return $result;
    }

    public function deleteRichestPerson($id) {
      $this->db->query("DELETE FROM richestpeople WHERE id = :id");
      $this->db->bind("id", $id, PDO::PARAM_INT);
      return $this->db->execute();
    }
  }

?>