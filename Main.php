<?php
    class Main{
        //connection property
        protected $host = 'localhost';
        protected $user = 'root';
        protected $pass = '';
        protected $db = 'e-shop';
        //query propery
        protected $con;
        protected $sql;
        protected $result;
        //database connection
        public function __construct()
        {
            if(!isset($this->con)){
                $this->con = new mysqli($this->host,$this->user,$this->pass,$this->db);
                if(!$this->con){
                    echo "connect Error".$this->con->connect_error;
                }
            }
            return $this->con;
        }
        public function index(){
            if(isset($_SESSION['user'])){
                return true;
            }else{
                return false;
            }
        }
        public function set_session($uid){
            $this->userid = $uid;
            $_SESSION['user'] = $this->userid;
        }
        public function retrive($user){
            $user = $user;
            $this->sql = "SELECT * FROM `customer` WHERE `email` = '$user'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        //fetch all division
        public function show_div()
        {
            $this->sql = "SELECT * FROM `divisions`";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        //fetch all district by division id
        public function district($id)
        {
            $id = $id;
            $this->sql = "SELECT * FROM `districts` WHERE division_id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function show_dis()
        {
            $this->sql = "SELECT * FROM `districts`";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function customer_update($id,$name,$mobile,$division,$district,$address){
            $id = $id;
            $name = $name;
            $mobile = $mobile;
            $division = $division;
            $district = $district;
            $address = $address;
            $this->sql = "UPDATE `customer` SET `name`='$name',`mobile`='$mobile',`division`='$division',`district`='$district',`address`='$address' WHERE id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function customer_insert($name,$email,$pass,$mobile,$division,$district,$address){
            $name = $name;
            $email = $email;
            $pass = $pass;
            $mobile = $mobile;
            $division = $division;
            $district = $district;
            $address = $address;
            $this->sql = "INSERT INTO `customer`(`name`, `email`, `pass`, `mobile`, `division`, `district`, `address`) VALUES ('$name','$email','$pass','$mobile','$division','$district','$address')";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        public function show_cus_id($id)
        {
            $id = $id;
            $this->sql = "SELECT cus.*,divi.div_name,dis.dis_name
            FROM customer as cus INNER JOIN divisions as divi
            ON cus.division = divi.id
            INNER JOIN districts as dis ON
            cus.district = dis.id
            WHERE cus.id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        //show customer data
        public function show_cus()
        {
            $this->sql = "SELECT * FROM `customer`";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        //delete customer data
        public function cus_detete($id)
        {
            $id = $id;
            $this->sql = "DELETE FROM `customer` WHERE id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        public function cat_insert($icon,$name){
            $icon  = $icon;
            $name = $name;
            $this->sql = "INSERT INTO `catagory`(`cat_name`, `cat_icon`) VALUES ('$name','$icon')";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        //show all catagory
        public function show_cat()
        {
            $this->sql = "SELECT * FROM `catagory`";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        //show one catagory by id
        public function one_cat($id)
        {
            $id = $id;
            $this->sql = "SELECT * FROM `catagory` WHERE id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        // public function join_cat(){
        //     $this->sql = "SELECT cata.*,pro.product_catagory FROM catagory AS cata INNER JOIN product AS pro ON cata.id = pro.product_catagory;";
        //     $this->result = $this->con->query($this->sql);
        //     if($this->result){
        //         return $this->result;
        //     }else{
        //         return false;
        //     }
        // }
        public function pro_by_cat($id){
            $id = $id;
            $this->sql = "SELECT * FROM `product` WHERE `product_catagory` = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        
        //update catagory 
        public function cat_up($id,$icon,$name){
            $id  = $id;
            $icon  = $icon;
            $name = $name;
            $this->sql = "UPDATE `catagory` SET `cat_name`='$name',`cat_icon`='$icon' WHERE id= '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        //delete customer data
        public function cat_detete($id)
        {
            $id = $id;
            $this->sql = "DELETE FROM `catagory` WHERE id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        public function insert_product($name,$filenamenew,$catagory,$brand,$price,$dis,$stock,$section,$condition,$details){
            $name = $name;
            $img = $filenamenew;
            $catagory = $catagory;
            $brand = $brand;
            $price= $price;
            $dis = $dis;
            $stock = $stock;
            $section = $section;
            $condition = $condition;
            $details = $details;
            $this->sql = "INSERT INTO `product`(`product_name`, `product_image`, `product_catagory`, `product_brand`, `product_price`, `product_discount`, `product_stcock`, `product_section`, `product_condition`, `product_details`) VALUES ('$name','$img','$catagory','$brand','$price','$dis','$stock','$section','$condition','$details')";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        public function pro_update($id,$name,$filenamenew,$catagory,$brand,$price,$dis,$stock,$section,$condition,$details){
            $id = $id;
            $name = $name;
            $img = $filenamenew;
            $catagory = $catagory;
            $brand = $brand;
            $price= $price;
            $dis = $dis;
            $stock = $stock;
            $section = $section;
            $condition = $condition;
            $details = $details;
            $this->sql = "UPDATE `product` SET `product_name`='$name',`product_image`='$img',`product_catagory`='$catagory',`product_brand`='$brand',`product_price`='$price',`product_discount`='$dis',`product_stcock`='$stock',`product_section`='$section',`product_condition`='$condition',`product_details`='$details' WHERE id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        public function pro_search($id){
            $id = $id;
            $this->sql = "SELECT * FROM `product` WHERE id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            } 
        }
        public function show_product()
        {
            $this->sql = "SELECT pro.*,cata.cat_name
            FROM product as pro INNER JOIN catagory as cata
            ON pro.product_catagory = cata.id";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function show_product_looking()
        {
            $this->sql = "SELECT pro.*,cata.cat_name
            FROM product as pro INNER JOIN catagory as cata
            ON pro.product_catagory = cata.id WHERE product_section = 'looking'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function show_product_just()
        {
            $this->sql = "SELECT pro.*,cata.cat_name
            FROM product as pro INNER JOIN catagory as cata
            ON pro.product_catagory = cata.id WHERE product_section = 'just_for_you'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function show_product_popular()
        {
            $this->sql = "SELECT pro.*,cata.cat_name
            FROM product as pro INNER JOIN catagory as cata
            ON pro.product_catagory = cata.id WHERE product_section = 'popular'";	
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function show_product_tech()
        {
            $this->sql = "SELECT pro.*,cata.cat_name
            FROM product as pro INNER JOIN catagory as cata
            ON pro.product_catagory = cata.id WHERE product_section = 'best_tech'";	
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function show_product_under_price()
        {
            $this->sql = "SELECT pro.*,cata.cat_name
            FROM product as pro INNER JOIN catagory as cata
            ON pro.product_catagory = cata.id WHERE product_price<=2000";	
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function search_iteam($kw){
            $kw = $kw;
            $this->sql = "SELECT * FROM `product` WHERE `product_name` LIKE '%$kw%' OR `product_brand` LIKE '%$kw%' OR `product_section` LIKE '%$kw%'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function search_cat_id($id){
            $id = $id;
            $this->sql = "SELECT * FROM `product` WHERE `product_catagory` ='$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function filter_product($min,$max){
            $min = $min;
            $max = $max;
            $this->sql = "SELECT * FROM `product` WHERE `product_price` > '$min' AND `product_price` < '$max'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function one_product($id)
        {
            $id = $id;
            $this->sql = "SELECT pro.*,cata.cat_name
            FROM product as pro INNER JOIN catagory as cata
            ON pro.product_catagory = cata.id WHERE pro.id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function pro_detete($id)
        {
            $id = $id;
            $this->sql = "DELETE FROM `product` WHERE id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        public function review($user_id,$pro_id,$review){
            $user_id = $user_id;
            $pro_id = $pro_id;
            $review = $review;
            $this->sql = "INSERT INTO `review`(`user_id`, `porduct_id`, `comment`) VALUES ('$user_id','$pro_id','$review')";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        public function re_review($user_id,$product_id){
            $user_id = $user_id;
            $product_id = $product_id;
            $this->sql = "SELECT * FROM `review` WHERE `user_id` = '$user_id' AND `porduct_id` = '$product_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function user_by_session($id){
            $id = $id;
            $this->sql = "SELECT * FROM `customer` WHERE id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function order($or_id,$user_id,$pro_id,$pro_price,$pro_quan,$ship,$total){
            $or_id = $or_id;
            $user_id = $user_id;
            $pro_id =$pro_id;
            $pro_price = $pro_price;
            $pro_quan = $pro_quan;
            $ship = $ship;
            $total = $total;

            $this->sql ="INSERT INTO `cus_order`(`order_id`, `user_id`, `product_id`, `product_price`, `product_quantity`, `shipping`, `total`,`created`) VALUES ('$or_id','$user_id','$pro_id','$pro_price','$pro_quan','$ship','$total',curdate())";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        public function show_order(){
            $this->sql = "SELECT DISTINCT cus_order.`order_id`,cus_order.`user_id`,cus_order.`total`,cus_order.`created`,customer.name,customer.mobile FROM `cus_order` INNER JOIN customer on cus_order.user_id = customer.id WHERE cus_order.status = '0' ORDER BY cus_order.created DESC";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function show_complete_order(){
            $this->sql = "SELECT DISTINCT cus_order.`order_id`,cus_order.`user_id`,cus_order.`total`,cus_order.`created`,customer.name,customer.mobile FROM `cus_order` INNER JOIN customer on cus_order.user_id = customer.id WHERE cus_order.status = '1' ORDER BY cus_order.created DESC";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }

        public function order_product($id){
            $id = $id;
            $this->sql = "SELECT cus_order.*,product.product_name FROM `cus_order`INNER JOIN product ON cus_order.product_id = product.id WHERE cus_order.order_id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function order_confirmed($id){
            $id = $id;
            $status = 1;
            $this->sql = "UPDATE `cus_order` SET `status`='$status' , created = curdate() WHERE order_id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        public function order_unshift($id){
            $id = $id;
            $status = 0;
            $this->sql = "UPDATE `cus_order` SET `status`='$status' WHERE order_id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        public function order_delete($id){
            $id = $id;
            $this->sql = "DELETE FROM `cus_order` WHERE order_id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        public function cal_pro_stock($id){
            $id = $id;
            $this->sql = "SELECT * FROM `cus_order` WHERE product_id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function offer($off){
            $off = $off;
            $this->sql = "SELECT * FROM `product` WHERE product_discount >=$off and product_section = 'offer'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function offer_show(){
            $this->sql = "SELECT * FROM `offer` WHERE offer_id = 1";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function offer_add($title,$filenamenew,$discount,$status){
            $title = $title;
            $filenamenew = $filenamenew;
            $discount = $discount;
            $status = $status;
            $id = 1;
            $this->sql = "UPDATE `offer` SET `offer_title`='$title',`offer_discount`='$discount',`banner`='$filenamenew',`status`='$status' WHERE offer_id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        public function check_ship($id){
            $id = $id;
            $this->sql = "SELECT * FROM `cus_order` WHERE user_id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function check_cupon(){
            $this->sql = "SELECT * FROM `cupon` WHERE cup_id = 1";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function update_coupon($title,$discount,$code,$expired,$status){
            $title = $title;
            $discount = $discount;
            $code = $code;
            $expired = $expired;
            $statuss = $status;
            $this->sql = "UPDATE `cupon` SET `cup_title`='$title',`cup_code`='$code',`cup_discount`='$discount',`cup_expired`='$expired',`cup_status`='$statuss' WHERE cup_id = '1'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        public function searchwishlist($user_id,$product_id){
            $user_id = $user_id;
            $product_id = $product_id;
            $this->sql = "SELECT * FROM `wishlist` WHERE wishlist_user_id = '$user_id' and wishlist_product_id = '$product_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        public function addwishlist($user_id,$product_id){
            $user_id = $user_id;
            $product_id = $product_id;
            $this->sql = "INSERT INTO `wishlist`(`wishlist_user_id`, `wishlist_product_id`) VALUES ('$user_id','$product_id')";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        public function mywishlist($user_id){
            $user_id = $user_id;
            $this->sql = "SELECT pro.*,wis.wishlist_id FROM wishlist as wis INNER JOIN product as pro ON wis.wishlist_product_id = pro.id WHERE wis.wishlist_user_id = '$user_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        //query for remove wishlist_item
        public function remove_wish_item($wish_id){
            $id = $wish_id;
            $this->sql = "DELETE FROM wishlist WHERE wishlist_id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        //today sell
        public function todaysell()
        {
            $this->sql = "SELECT SUM(total) as total FROM `cus_order` WHERE `created` = curdate() AND status = 1";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        //fetch_sell_per_month
        public function fetch_sell_per_month()
        {
            $this->sql = "SELECT DATE_FORMAT(created, '%M') AS month,SUM(total) AS total FROM `cus_order` WHERE `created` BETWEEN DATE_FORMAT(CURDATE() , '%Y-01-01') AND CURDATE() AND `status` = 1 GROUP BY DATE_FORMAT(`created`, '%M') ORDER BY created ASC";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return $this->result;
            }else{
                return false;
            }
        }
        //destroy database connection 
        public function __destruct(){
            $this->con->close();
        }
    }
    //$obj = new Main();
    

?>