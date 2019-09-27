<?php
//Hàm kết nối đến cơ sở dữ liệu mysql
function connect() {
    try {
        $conn = new PDO("mysql:host=localhost; dbname=xshop; charset=utf8", "root", "");
        return $conn;
    } catch (PDOException $e) {
        echo $e->getMessage();
        die;
    }
}

//Hàm thực thi câu lệnh sql và trả về kết quả là 1 mảng dữ liệu
function query($sql) {
    try {
        $conn = connect();
        //Chuẩn bị
        $stmt = $conn->prepare($sql);
        //Thực thi
        $stmt->execute();
        //Lấy dữ liệu
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (PDOException $e) {
        echo $e->getMessage();
        die;
    } finally {
        unset($conn);
    }
}

//Hàm lấy ra 1 bản ghi theo id
//$table bảng được sử dụng
//$field tên cột mã
//$field_value giá trị
function select_by_id($table, $field, $field_value) {
    try {
        $sql = "SELECT * FROM $table WHERE $field='$field_value'";
        $conn = connect();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;       
    } catch (PDOException $e) {
        echo $e->getMessage();
        die;
    } finally {
        unset($conn);
    }
}

//function insert để thêm dữ liệu vào bảng
//$table bảng được insert
//$array mảng dữ liệu được insert
function insert($table, $array) {
    try {
        $conn = connect();
        $sql = "INSERT INTO $table (";
        //Lấy ra tên các trường
        foreach ($array as $key=>$value) {
            $sql .= $key . ", ";
        }
        $sql = rtrim($sql, ", ") . " ) VALUES ( ";
        foreach ($array as $key=>$value) {
            $sql .= ":" . $key . ", ";
        }
        $sql = rtrim($sql, ", ") . " )";
        
        //Chuẩn bị
        $stmt = $conn->prepare($sql);
        //Thực thi
        $stmt->execute($array);
    } catch (PDOException $e) {
        echo $e->getMessage();
        die;
    } finally {
        unset($conn);
    }
}

//function update data 
//Cập nhật cho 1 bản ghi
//$array là dữ liệu cần sửa
//$field_name, $field_value cột điều kiện và giá trị điều kiện
function update($table, $array, $field_name, $field_value) {
    try {
        $conn = connect();
        $sql = "UPDATE $table SET ";
        foreach ($array as $key=>$value) {
            $sql .= $key . "=:" . $key . ", ";
        }
        //Loại bỏ dấu "," ở cuối $sql
        $sql = rtrim($sql, ", ");
        //Thêm vào điều kiện để cập nhật
        $sql .= " WHERE $field_name='$field_value'";
        //Chuẩn bị
        
        $stmt = $conn->prepare($sql);
        //Thực thi
        $stmt->execute($array);
    } catch (PDOException $e) {
        echo $e->getMessage();
        die;
    } finally {
        unset($conn);
    }
}
//hàm xóa 1 bản ghi
//xóa bản ghi trong bảng $table
//$field_name và field_value tên trường và giá trị so sánh khi xóa
function delete( $table, $field_name, $field_value ) {
    try {
        $sql = "DELETE FROM $table WHERE $field_name=:$field_name";
        $conn = connect();
        $stmt = $conn->prepare($sql);
        //Truyền giá trị cho tham số
        $stmt->bindParam(":$field_name", $field_value);
        //Thực thi
        $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
        die;
    } finally {
        unset($conn);
    }
}