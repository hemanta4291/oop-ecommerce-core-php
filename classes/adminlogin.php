
<?php

    $filePath = realpath(dirname(__FILE__));
    require_once ($filePath."/../lib/Database.php");
    require_once ($filePath."/../lib/session.php");
    require_once ($filePath."/../helpers/formate.php");
    session::logainsession();

?>



<?php

    class AdminLogin{

        private $db;
        private $fm;

        public function __construct(){

            $this->db = new Database();
            $this->fm = new formate();
        }

        public function adminLogin($userName,$userPass){

            $userName = $this->fm->validation($userName);
            $userPass = $this->fm->validation($userPass);

            $userName = mysqli_real_escape_string($this->db->link,$userName);
            $userPass = mysqli_real_escape_string($this->db->link,$userPass);

            if(empty($userName) || empty($userPass)){

                $loginmsg = "User Name and Password Must Not be empty";
                return $loginmsg;
            }else{

                $loginQuery = "select * from tbl_admin where adminUser='$userName' and adminPass='$userPass'";
                $loginRun = $this->db->select($loginQuery);

                if($loginRun){

                    $getValue = $loginRun->fetch_assoc();

                    session::set("adminLogin", true);
                    session::set("adminid", $getValue['adminId']);
                    session::set("adminName", $getValue['adminName']);
                    session::set("adminUser", $getValue['adminUser']);
                    session::set("adminEmail", $getValue['adminEmail']);
                    header("location:index.php");

                }else{
                    $loginmsg = "User Name and Password Must Not Not Match";
                    return $loginmsg;
                }


            }



        }
}




?>