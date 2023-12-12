<?php
include_once"Db.php";
class User extends Db{
    public function add_user($name,$phone,$email,$dob,$address,$upload,$password){
        //check if the email have been used before
        $sql="SELECT * FROM tes WHERE email = ?";
        $stmt =$this->connect()->prepare($sql);
        $stmt ->bindParam(1,$email,PDO::PARAM_STR);
        $stmt->execute();
        $email_count=$stmt->rowCount();
        if($email_count>0){
            return"error, email already exist in the database";
            exit();
        }
        $sql="INSERT INTO tes(name,phone,email,dob,address,upload,password)VALUES(?,?,?,?,?,?,?)";
        $stmt=$this->connect()->prepare($sql);
        //bindparam
        $stmt->bindParam(1,$name,PDO::PARAM_STR);
        $stmt->bindParam(2,$phone,PDO::PARAM_STR);
        $stmt->bindParam(3,$email,PDO::PARAM_STR);
        $stmt->bindParam(4,$dob,PDO::PARAM_STR); 
        $stmt->bindParam(5,$address,PDO::PARAM_STR);
        $stmt->bindParam(6,$upload,PDO::PARAM_STR);
        $stmt->bindParam(7,$password,PDO::PARAM_STR);
        $result= $stmt-> execute();
        if($result){
            return true;
        }else{
            return false;
        }
    }

        public function get_user_detail($id){
            $sql="SELECT * FROM tes WHERE id = ?";
            $stmt=$this->connect()->prepare($sql);
            $stmt->bindParam(1,$id,PDO::PARAM_INT);
            $stmt->execute();
            $count =$stmt->rowCount();
            
            if($count< 1){
            return false;
            exit();
            }else{
            
            $user=$stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
            }
        }
        public function delete($id){
            $sql="DELETE FROM tes WHERE id= ?";
            $stmt=$this->connect()->prepare($sql);
            $stmt->bindParam(1,$id,PDO::PARAM_INT);
            $deleted=$stmt->execute();
            if ($deleted) {
                header("Location:../login.php");
                exit();
            } else {
                return false;
            }
        }
        public function update($name, $phone, $email, $dob, $address, $upload, $id){
            $sql = "UPDATE tes SET name=?, phone=?, email=?, dob=?, address=?, upload=? WHERE id=?";
            $stmt = $this->connect()->prepare($sql);

            $stmt->bindParam(1, $name, PDO::PARAM_STR);
            $stmt->bindParam(2, $phone, PDO::PARAM_STR);
            $stmt->bindParam(3, $email, PDO::PARAM_STR);
            $stmt->bindParam(4, $dob, PDO::PARAM_STR); 
            $stmt->bindParam(5, $address, PDO::PARAM_STR);
            $stmt->bindParam(6, $upload, PDO::PARAM_STR);
            $stmt->bindParam(7, $id, PDO::PARAM_INT);

            $result = $stmt->execute();

            return $result;
        }

}
// $userr=new User();
// echo $userr->update("temi","12345678","yusuf@gmail.com","12-12-2012",'ikeja',"yusuf.pdf",9);

// $userr=new User();
// echo $userr->login("yusuf@gmail.com",12345678);


?>