<?php
$filePath = realpath(dirname(__FILE__));
require_once ($filePath."/../lib/Database.php");
require_once ($filePath."/../helpers/formate.php");
?>
<?php

class Product{

    private $db;
    private $fm;

    public function __construct(){

        $this->db = new Database();
        $this->fm = new formate();
    }

    public function categoryAdd($data,$file){

        $brandName = mysqli_real_escape_string($this->db->link, $data['brandName']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $details = mysqli_real_escape_string($this->db->link, $data['details']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $type = mysqli_real_escape_string($this->db->link, $data['type']);
        $avater = $file['avater']['name'];
        $avater_tmp = $file['avater']['tmp_name'];
        $location ="upload/";
        $img_uniq_name= uniqid().".jpg";

        if (empty($brandName) || empty($category) || empty($brand) || empty($details)
            || empty($price) || empty($avater) || empty($type)) {
            $insertmsg = "Field Must Not be empty";
            return $insertmsg;
        } else {

            move_uploaded_file($avater_tmp,$location."$img_uniq_name");

            $insertQuery = "insert into tbl_product(proName,catId,brandId,proDetails,proPrice,proImage,type) 
                    values ('$brandName','$category','$brand','$details','$price','$img_uniq_name','$type')";
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

    public function productShow(){

        $selecttQuery = "select p.*,c.name,b.brandName
                         from tbl_product as p,tbl_cat as c,tbl_brand as b 
                         where p.catId = c.cat_id and p.brandId = b.brandId order by p.proId desc";

        /*$selecttQuery = "select tbl_product.*,tbl_cat.name,tbl_brand.brandName
        from tbl_product inner join tbl_cat on tbl_product.catId = tbl_cat.cat_id
        inner join tbl_brand on tbl_product.brandId = tbl_brand.brandId order by tbl_product.proId DESC ";*/

        $selectRun = $this->db->select($selecttQuery);
        return $selectRun;

    }


    /*fornt end feature product*/
    public function featurepro(){
        $selecttQuery = "select * from tbl_product where type='1' limit 4";
        $selectRun = $this->db->select($selecttQuery);
        return $selectRun;

    }

    /*fornt end all new product*/
    public function newfeaturepro(){
        $selecttQuery = "select * from tbl_product limit 4";
        $selectRun = $this->db->select($selecttQuery);
        return $selectRun;

    }

    /*single product details query for fornt end*/
    public function dataSelectbyId($id){

        $selecttQuery = "select p.*,c.name,b.brandName
                         from tbl_product as p,tbl_cat as c,tbl_brand as b 
                         where p.catId = c.cat_id and p.brandId = b.brandId and p.proId='$id'";

        $selectRun = $this->db->select($selecttQuery);
        return $selectRun;

    }



}

?>