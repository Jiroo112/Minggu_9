<?php
class crud extends koneksi {
    public function lihatData() {
        $sql = "SELECT * FROM user_detail";
        $result = $this->koneksi->prepare($sql);
        $result->execute();
        return $result;
    }

    public function insertData($email, $pass, $name) {
        try {
            $sql = "INSERT INTO user_detail (user_email, user_password, nama, level) VALUES (:email, :pass, :name, 2)";
            $result = $this->koneksi->prepare($sql);
            $result->bindParam(":email", $email);
            $result->bindParam(":pass", $pass);
            $result->bindParam(":name", $name);
            $result->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getDataById($id) {
        $query = "SELECT * FROM user_detail WHERE id = :id";
        $stmt = $this->koneksi->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt;
    }

    public function updateData($id, $email, $nama) {
        $query = "UPDATE user_detail SET user_email = :email, nama = :nama WHERE id = :id";
        $stmt = $this->koneksi->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nama', $nama);
        return $stmt->execute();
    }

    public function deleteData($id) {
        $query = "DELETE FROM user_detail WHERE id = :id";
        $stmt = $this->koneksi->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>