<?php
$filePath = realpath(dirname(__FILE__));
require_once ($filePath."/../lib/Database.php");
require_once ($filePath."/../helpers/formate.php");
?>
<?php

class Cart{

    private $db;
    private $fm;

    public function __construct(){

        $this->db = new Database();
        $this->fm = new formate();
    }

    /*update data from cart*/

    public function addToCart($quenty,$getId){

        $quenty = $this->fm->validation($quenty);
        $quenty = mysqli_real_escape_string($this->db->link, $quenty);
        $proId = mysqli_real_escape_string($this->db->link, $getId);
        $sId = session_id();

        $query = "select * from tbl_product where  proId = $proId";
        $get_query = $this->db->select($query);

        $reult_query = $get_query->fetch_assoc();

        $proName = $reult_query['proName'];
        $proPrice = $reult_query['proPrice'];
        $proImage = $reult_query['proImage'];

        $chekcQuery = "select * from tbl_cart where  productId= '$proId' and sId='$sId'";
        $check_result = $this->db->select($chekcQuery);

        if($check_result){
            $exitMsg = "Product all ready added to cart please update cart";
            return $exitMsg;
        }else if ($quenty <= 0){
            $msg ="you must put gretter than 0";
            return $msg;
        }else{

            $query1 = "insert into tbl_cart(sId,productId,productName,price,quentity,image)
                    values ('$sId','$proId','$proName','$proPrice','$quenty','$proImage')";

            $get_query1 = $this->db->insert($query1);

            if ($get_query1) {
                header("location:cart.php");
            } else {
                header("location:product_details.php");
            }

        }




    }

    /*Data from sesstion*/

    public function sessionData($sid){

        $query = "select * from tbl_cart where sId = '$sid'";
        $get_query = $this->db->select($query);

        return $get_query;

    }

    /*Data update by cartId*/

    public function addToCartUpdate($quenty,$cartId){

        if($quenty <= 0){
            $msg ="you must put gretter than 0";
            return $msg;
        }else{

            $query = "update tbl_cart set quentity='$quenty' where cartId= '$cartId'";
            $get_query = $this->db->update($query);

            if ($get_query) {
                $updatemsg = "Data Update Successfully Done";
                return $updatemsg;
            } else {
                $updatemsg = "Data Update Not Successfully Done";
                return $updatemsg;
            }

        }



    }

    /*Data delete by cartId*/

    public function addToCartDelete($del_id){

        $query = "delete from tbl_cart where cartId='$del_id'";
        $get_query = $this->db->delete($query);

        if ($get_query) {
            $updatemsg = "Data delete Successfully Done";
            return $updatemsg;
        } else {
            $updatemsg = "Data delete Not Successfully Done";
            return $updatemsg;
        }

    }


    /*when cart empty but show data query*/
    public function checkEmpty(){

        $sId = session_id();
        $query = "select * from tbl_cart where sId = '$sId'";
        $get_query = $this->db->select($query);
        return $get_query;


    }


    /*delete data from cart by specific sid when log out*/

    public function delOut(){

        $sId = session_id();
        $query = "delete from tbl_cart where sId='$sId'";
        $runQuery = $this->db->delete($query);
        return $runQuery;

    }



    public function insOrder($usrId){
        $sId = session_id();
        $query = "select * from tbl_cart where sId = '$sId'";
        $get_query = $this->db->select($query);
        if($get_query){

            while ($getData = $get_query->fetch_assoc()){

            $proid = $getData['productId'];
            $proName = $getData['productName'];
            $quentity = $getData['quentity'];
            $price = $getData['price'] * $quentity;
            $image = $getData['image'];

            $query1 = "insert into tbl_order(sId,userId,proId,proName,quentity,price,images)
                    values ('$sId','$usrId','$proid','$proName','$quentity','$price','$image')";

            $get_query1 = $this->db->insert($query1);

        }


        }
    }

    /*Payment Receive Status*/
    public function paymentReceive($getId){
        $query = "select * from tbl_order where userId = '$getId' and date=now()";
        $get_query = $this->db->select($query);
        return $get_query;

    }


    /*payment status data show by user id*/

    public function paymentData($getId){
        $query = "select * from tbl_order where userId = '$getId'";
        $get_query = $this->db->select($query);
        return $get_query;

    }


    public function paymentEmpty(){

        $sId = session_id();
        $query = "select * from tbl_order where sId = '$sId'";
        $get_query = $this->db->select($query);
        return $get_query;


    }



    /*admin order Data table show*/
    public function adminOrderData(){

        $query = "select * from tbl_order";
        $get_query = $this->db->select($query);
        return $get_query;

    }




}

?>