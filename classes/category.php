<?php
$filePath = realpath(dirname(__FILE__));
require_once ($filePath."/../lib/Database.php");
require_once ($filePath."/../helpers/formate.php");
?>
<?php

class categoryadd{

    private $db;
    private $fm;

    public function __construct()
    {

        $this->db = new Database();
        $this->fm = new formate();
    }

    /*insert category*/

    public function categoryAdd($catName){

        $catName = $this->fm->validation($catName);

        $catName = mysqli_real_escape_string($this->db->link, $catName);

        if (empty($catName)) {
            $insertmsg = "Field Must Not be empty";
            return $insertmsg;
        } else {

            $insertQuery = "insert into tbl_cat(name) values ('$catName')";
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

    public function categoryShow(){

        $selecttQuery = "select * from tbl_cat";
        $selectRun = $this->db->select($selecttQuery);

        return $selectRun;

    }

    /*show data selected id*/
    public function show_select_id($get_edit_id){
        $selecttQuery = "select * from tbl_cat where cat_id=$get_edit_id";
        $selectRun = $this->db->select($selecttQuery);

        return $selectRun;
    }


    /*show data selected id*/
    public function update_data_id($cat_name,$get_edit_id){

        $cat_name = $this->fm->validation($cat_name);
        $get_edit_id = $this->fm->validation($get_edit_id);
        $cat_name = mysqli_real_escape_string($this->db->link, $cat_name);
        $get_edit_id = mysqli_real_escape_string($this->db->link, $get_edit_id);

        if (empty($cat_name)) {
            $insertmsg = "Field Must Not be empty";
            return $insertmsg;
        } else {

            $updateQuery = "update tbl_cat set name='$cat_name' where cat_id=$get_edit_id";
            $updateRun = $this->db->update($updateQuery);

            if ($updateRun) {
                $insertmsg = "Data Successfully Done";
                return $insertmsg;
            } else {
                $insertmsg = "Data Not Successfully Done";
                return $insertmsg;
            }

        }

    }


}


?>
