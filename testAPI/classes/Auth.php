<?php
include_once"Db.php";
class User extends Db{

    public function register($name,$phone,$email,$dob,$address,$upload,$password){
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
            echo json_encode(['status' => 'success', 'data' => $result]);
        }else{
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Invalid data']);

        }
    }


    public function login($email, $password){
        $sql = "SELECT * FROM tes WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$user) {
            echo "Email is incorrect or does not exist";
        }
        $password_matches = password_verify($password, $user["password"]);
        if($password_matches){
            $_SESSION["id"] = $user["id"]; 
            header("location:../main.php");
            
            exit();
        } else {
            return "Password is incorrect";
        }
    }

    public function get_user_detail($id){
        $sql="SELECT * FROM tes WHERE id = ?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute();
        $user=$stmt->fetch(PDO::FETCH_ASSOC);
        if($user){
            echo json_encode(['status' => 'success', 'data' => $user]);
        }else{
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Invalid data']);

        }
       
    }
    public function delete($id){
        $sql="DELETE FROM tes WHERE id= ?";
        $stmt=$this->connect()->prepare($sql);
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $deleted=$stmt->execute();
        if($deleted){
            echo json_encode(['status' => 'success', 'data' => 'user have been deleted']);
        }else{
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Invalid data']);

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
        if($result){
            echo json_encode(['status' => 'success', 'data' => $result]);
        }else{
            http_response_code(400);
            echo json_encode(['status' => 'error', 'message' => 'Invalid data']);

        }
    }
    


}
// $userr=new User();
// echo $userr->update("temi","12345678","yusuf@gmail.com","12-12-2012",'ikeja',"yusuf.pdf",8);

// $userr=new User();
// echo $userr->login("yusuf@gmail.com",12345678);


?>