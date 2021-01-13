<?php

class Pupils extends Model
{

    public function getList($offset, $id_company)
    {
        $array = [];

        $sql = $this->db->prepare("SELECT * FROM pupils WHERE id_company = :id_company LIMIT $offset, 10");
        $sql->bindValue('id_company', $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getInfo($id, $id_company)
    {
        $array = [];

        $sql = $this->db->prepare("SELECT * FROM pupils WHERE id = :id AND id_company = :id_company");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getCount($id_company)
    {
        $r = 0;

        $sql = $this->db->prepare("SELECT COUNT(*) as c FROM pupils WHERE id_company = :id_company");
        $sql->bindValue(':id_company', $id_company);
        $sql->execute();
        $row = $sql->fetch();

        $r = $row['c'];

        return $r;
    }

    public function add(
      $id_company,
      $name,
      $dataNasci

    ) {
        $sql = $this->db->prepare("INSERT INTO pupils SET id_company = :id_company, 
            name = :name, date = :date");

        $sql->bindValue(":id_company", $id_company);
        $sql->bindValue(":name", $name);
        $sql->bindValue(":date", $dataNasci);
        $sql->execute();

        return $this->db->lastInsertId();
    }

    public function edit(
      $id,
      $id_company,
      $name,
      $dataNasci
    ) {
        $sql = $this->db->prepare("UPDATE pupils SET id_company = :id_company, 
            name = :name, date = :date WHERE id = :id AND id_company = :id_company2");

        $sql->bindValue(":id_company", $id_company);
        $sql->bindValue(":name", $name);
        $sql->bindValue(":date", $dataNasci);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":id_company2", $id_company);
        $sql->execute();
    }

    public function searchClientByName($name, $id_company)
    {
        $array = [];

        $sql = $this->db->prepare("SELECT name, id FROM pupils WHERE name LIKE :name LIMIT 10");
        $sql->bindValue(':name', '%' . $name . '%');
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function delete($id, $id_company)
    {
        $sql = $this->db->prepare("DELETE FROM pupils WHERE id = :id AND id_company = :id_company");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
    }

}