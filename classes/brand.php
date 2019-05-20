    <?php
    $filePath = realpath(dirname(__FILE__));
    require_once ($filePath."/../lib/Database.php");
    require_once ($filePath."/../helpers/formate.php");
    ?>
    <?php

    class brand{

        private $db;
        private $fm;

        public function __construct(){

            $this->db = new Database();
            $this->fm = new formate();
        }

        public function brandAdd($brandName){

            $brandName = $this->fm->validation($brandName);

            $brandName = mysqli_real_escape_string($this->db->link, $brandName);

            if (empty($brandName)) {
                $insertmsg = "Field Must Not be empty";
                return $insertmsg;
            } else {

                $insertQuery = "insert into tbl_brand(brandName) values ('$brandName')";
                $insertRun = $this->db->insert($insertQuery);

                if ($insertRun) {
                    $insertmsg = "Data Successfully Done";
                    return $insertmsg;
                } else {
                    $insertmsg = "Data Not Successfully Done";
                    return $insertmsg;
                }


            }
        }

        /*category show */

        public function brandShow(){

            $selecttQuery = "select * from tbl_brand";
            $selectRun = $this->db->select($selecttQuery);
            return $selectRun;

        }

    }

    ?>