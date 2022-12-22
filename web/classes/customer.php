<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>

<?php

class customer
{
    private $db, $fm;
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function insert_binhluan(){
        $product_id = $_POST['product_id_binhluan'];
        $tenbinhluan = $_POST['tennguoibinhluan'];
        $binhluan = $_POST['binhluan'];
        if ($tenbinhluan=='' || $binhluan=='') {
            $alert = "<span class='error'>Không được để trống ô nào!</span>";
            return $alert;
        } else {
            $query = "INSERT INTO tbl_binhluan(tenbinhluan, binhluan, product_id) VALUES ('$tenbinhluan','$binhluan','$product_id' )";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'>Nhận xét thành công!</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Nhận xét không thành công!</span>";
                return $alert;
            }

        }
    }
    public function show_binhluan(){
        $query = "select * from tbl_binhluan ";
        $result = $this->db->select($query);
        return $result;
    }
    public function del_binhluan($id){
        {
            $query = "DELETE FROM tbl_binhluan WHERE binhluan_id ='$id'";
            $result = $this->db->delete($query);
            if ($result) {
                $alert = "<span class='success'>Delete Category Success</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Delete Category Not Success</span>";
                return $alert;
            }
        }
    }
    public function insert_customer($data)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $country = mysqli_real_escape_string($this->db->link, $data['country']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $password = mysqli_real_escape_string($this->db->link, $data['password']);
        $city = mysqli_real_escape_string($this->db->link, $data['city']);

        if ($name == "" || $zipcode == "" || $email == "" || $address == "" 
        || $country == "" || $phone == "" || $password == "" || $city == "") {
            $alert = "<span class='error'>Không được để trống</span>";
            
            return $alert;
        } else {
            $check_acc = "select * from tbl_customer where email='$email' limit 1";
            $result_check = $this->db->select($check_acc);
            if ($result_check) {
                $alert = "<span class='error'>Email đã tồn tại</span>";
                return $alert;
            } else {
                $query = "INSERT INTO tbl_customer(name, zipcode, email, address, country, phone, password, city) VALUES ('$name','$zipcode','$email','$address','$country','$phone','$password','$city' )";
                $result = $this->db->insert($query);
                if ($result) {
                    $alert = "<span class='success'>Thành công</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Thất bại</span>";
                    return $alert;
                }
            }
        }
    }
    public function login_customer($data){
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $password = mysqli_real_escape_string($this->db->link, $data['password']);

        if ($email == "" ||$password == "") {
            $alert = "<span class='error'>Email or Pass must be not empty</span>";
            return $alert;
        } else {
            $check_acc = "select * from tbl_customer Where email='$email' AND password='$password' ";
            $result_check = $this->db->select($check_acc);
            if ($result_check != false) {
                $value = $result_check->fetch_assoc();
                Session::set('customer_login',true);
                Session::set('customer_id',$value['id']);
                Session::set('customer_name',$value['name']);
                echo "<script type='text/javascript'>window.location.href = 'Service.php'</script>";
            } else {
                $alert = "<span class='error'>Email and Pass is false</span>";
                return $alert;
            }
        }
    }

    public function show_info_cus($id){
        $query = "select * from tbl_customer where id='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_cus($data, $id)
    {
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);  
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $city = mysqli_real_escape_string($this->db->link, $data['city']);

        if ($name == "" || $zipcode == "" || $email == "" || $address == "" 
        || $phone == "" || $city == "") {
            $alert = "<span class='error'>Fields must be not empty</span>";
            return $alert;
        } else {
            $query = "UPDATE tbl_customer SET name='$name',zipcode='$zipcode',email='$email',
            address='$address',phone='$phone',city=' $city' WHERE id='$id'";
            $result = $this->db->update($query);
            if ($result) {
                $alert = "<span class='success'>Update Info Success</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Update Info Not Success</span>";
                return $alert;
            }
        }
    }
}
?>


