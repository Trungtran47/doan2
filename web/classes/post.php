<?php
        $filepath = realpath(dirname(__FILE__));
        include_once  ($filepath.'/../lib/database.php');
        include_once  ($filepath.'/../helpers/format.php');
?>




<?php
       class post
       {
           private $db;
           private $fm;

           public function __post() 
           {
              $this->db = new Database();
              $this->fm = new Format();
           }

           public function insert_post($data, $files){
        
                $postTieude = mysqli_real_escape_string($this->db->link, $data['postTieude']);
                $postMota = mysqli_real_escape_string($this->db->link, $data['postMota']);
                $type = mysqli_real_escape_string($this->db->link, $data['type']);
                // kiểm tra hình ảnh và lấy hình ảnh cho vào vafp folder upload
                $permited = array('jpg', 'jpeg', 'png', 'gif');
                $file_name = $_FILES['image']['name'];
                $file_size = $_FILES['image']['size'];
                $file_temp = $_FILES['image']['tmp_name'];

                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()), 0, 10). '.'.$file_ext; 
                $uploaded_image = "uploads/".$unique_image;
          

             
                

                if ($postTieude == "" || $postMota == "" ||  $type == "" || $file_name =="") {
                    $alert = "<span class='error' >  Không được để trống! </span>";
                    return $alert;
                }else {
                    move_uploaded_file($file_temp,$uploaded_image);
                    $query = "INSERT INTO tbl_post(postTieude, postMota, type,image ) VALUES(
                        '$postTieude','$postMota','$type','$unique_image')";
                    $result = $this->db->insert($query);
                     
                    if ($result) {
                        $alert = " <span class='success' >  Thêm tin tức thành công!</span> ";
                        return $alert;
                    }else {
                        $alert = " <span class='error' >  Thêm tin tức không thành công!</span> ";
                        return $alert;
                    }
                   
                }
           }
           public function show_post(){
            $query = "select * from tbl_post order by postId asc";
            $result = $this->db->select($query);
            return $result;

           }
           public function update_post($data,$files,$id){

                       
            $postTieude = mysqli_real_escape_string($this->db->link, $data['postTieude']);
            $postMota = mysqli_real_escape_string($this->db->link, $data['postMota']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            // kiểm tra hình ảnh và lấy hình ảnh cho vào vafp folder upload
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10). '.'.$file_ext; 
            $uploaded_image = "uploads/".$unique_image;
      

                    

            if ($postTieude == "" || $postMota == "" ||  $type == "" || $file_name =="") {
                $alert = "<span class='error' >  Không được để trống! </span>";
                return $alert;
            }else {
                        if (!empty($file_name)) {
                            // Nếu người dùng chọn ảnh
                            if ($file_size < 0) {
                                
                                $alert = "<span class='success'>Image Size should be less then 2MB!</span>";
                                return $alert;
                            }
                            elseif (in_array($file_ext, $permited) === false ) 
                            {
                                // echo "<span class='error' >You can upload only:-".implode(',', $permited)."</span>";
                                $alert = "<span class='success'>You can upload only:-".implode(',', $permited)."</span>";
                                return $alert;
                            }
                            move_uploaded_file($file_temp, $uploaded_image);
                            $query = "UPDATE tbl_post SET 
                            postTieude = '$postTieude', 
                            postMota = '$postMota',
                            type = '$type',
                            image = '$unique_image'
                            
                            WHERE post_id='$id'";
                        }else {
                            //Nếu người dùng không chọn ảnh
                            $query = "UPDATE tbl_post SET 
                            postTieude = '$postTieude', 
                            postMota = '$postMota',
                            type = '$type',
                            image = '$unique_image'
                            
                            WHERE post_id='$id'";
                            }
                        
 
                        $result = $this->db->update($query);
                         if ($result) {
                            $alert = " <span class='success' >   Cập nhật thành công </span> ";
                            return $alert;
                        }else {
                            $alert = " <span class='error' >   Cập nhật không thành công </span> ";
                            return $alert;
                        }
                       
                    }
           }
        

           public function del_post($id){
                    $query = "DELETE FROM tbl_post where post_id = '$id' ";
                    $result = $this->db->delete($query);
                    if ($result) {
                        $alert = " <span class='success' >   Xóa thành công</span> ";
                        return $alert;
                    }else {
                        $alert = " <span class='error' >   Xóa không thành công</span> ";
                        return $alert;
                    }

           }

           public function getpostbyId($id){
                    $query = "SELECT * FROM tbl_post where post_id = '$id' ";
                    $result = $this->db->select($query);
                    return $result;

           }
        


        }
       
?>