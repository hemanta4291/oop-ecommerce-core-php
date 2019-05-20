<?php
$filePath = realpath(dirname(__FILE__));
require_once ($filePath."/../lib/Database.php");
require_once ($filePath."/../helpers/formate.php");
?>
<?php

class user{

    private $db;
    private $fm;

    public function __construct(){

        $this->db = new Database();
        $this->fm = new formate();
    }

    public function registration($data){

        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $city = mysqli_real_escape_string($this->db->link, $data['city']);
        $zip = mysqli_real_escape_string($this->db->link, $data['zip']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $country = mysqli_real_escape_string($this->db->link, $data['country']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));

        if($name == '' || $city == '' || $zip == '' || $email == '' ||
            $address == '' || $country == '' || $phone == '' || $pass == ''){

            $erroMsg = "Field Not Must Be Empity !";
            return $erroMsg;

        }else{

            $emaiCheckQuery = "select * from tbl_regi where email = '$email'";
            $checkRun = $this->db->select($emaiCheckQuery);

            if($checkRun){

                $erroMsg = "Email All Ready Exit Try To Another Mail";
                return $erroMsg;

            }else{


                $insertQuery = "insert into tbl_regi(name,city,zip,email,address,country,phone,pass)
                                values ('$name','$city','$zip','$email','$address','$country','$phone','$pass')";
                $insertRun = $this->db->insert($insertQuery);
                if($insertRun){

                    $erroMsg = "Data Insert Sucessfully Done";
                    return $erroMsg;

                }


            }

        }
    }

    public function login($data){

        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $pass = mysqli_real_escape_string($this->db->link, md5($data['pass']));


        if($email == '' || $pass == ''){
            $erroMsg = "Field Not Must Be Empity !";
            return $erroMsg;
        }else{

            $emaiCheckQuery = "select * from tbl_regi where email = '$email' and pass='$pass'";
            $checkRun = $this->db->select($emaiCheckQuery);

            if($checkRun){

                $get_data = $checkRun->fetch_assoc();

                header("location:index.php");
                session::set('login',true);
                session::set('userId',$get_data['id']);
                session::set('userName',$get_data['name']);
                $erroMsg = "login";
                return $erroMsg;


            }else{
                $erroMsg = "Email or pass not match try again";
                return $erroMsg;
            }
        }

    }

    /*user data show*/

    public function dataUser($usrId){

        $query = "select * from tbl_regi where id = '$usrId'";
        $get_query = $this->db->select($query);
        return $get_query;

    }

    /*user data update*/

    public function updateUserInfo($data,$usrId){

        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $city = mysqli_real_escape_string($this->db->link, $data['city']);
        $zip = mysqli_real_escape_string($this->db->link, $data['zip']);
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $country = mysqli_real_escape_string($this->db->link, $data['country']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);

        if($name == '' || $city == '' || $zip == '' || $email == '' ||
            $address == '' || $country == '' || $phone == ''){

            $erroMsg = "Field Not Must Be Empity !";
            return $erroMsg;

        }else{

            $query = "update tbl_regi set name='$name',city='$city',zip='$zip',email='$email',
                    address='$address',country='$country',phone='$phone' where id='$usrId'";
            $get_query = $this->db->update($query);

            if($get_query){
                $updateMsg = "Date Update successfully";
                return $updateMsg;
            }else{
                $updateMsg = "Date not Update successfully";
                return $updateMsg;
            }

        }



    }




}

?>