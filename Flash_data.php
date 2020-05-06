<?php
    class Flass_data
    {
        public static function show_error(){
            if(!isset($_SESSION['msg'])){
                return null;
            }
            $msg = $_SESSION['msg'];
            unset($_SESSION['msg']);
            return implode("<br>", $msg);
        }
        
        public static function delete_cus($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array();
            }
            $_SESSION['msg']['del'] = $msg;
        }
        public static function insert_msg($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array();
            }
            $_SESSION['msg']['in'] = $msg;
        }
        public static function insert_cat($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array();
            }
            $_SESSION['msg']['cat'] = $msg;
        }
        public static function delete_cat($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array();
            }
            $_SESSION['msg']['dcat'] = $msg;
        }
        public static function update_cat($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array();
            }
            $_SESSION['msg']['up'] = $msg;
        }
        public static function pass_error($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['pass_erro'] = $msg;
        }
        public static function pass_suss($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['pass_suss'] = $msg;
        }
        public static function insert_pro($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['product'] = $msg;
        }
        public static function insert_pro_error($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['product_error'] = $msg;
        }
        public static function delete_pro($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['product_del'] = $msg;
        }
        public static function update_pro($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['pro_up_sus'] = $msg;
        }
        public static function update_error($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['pro_up_error'] = $msg;
        }
        public static function review($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['review_sus'] = $msg;
        }
        public static function cus_up($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['cus_up_sus'] = $msg;
        }
        public static function cus_up_error($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['cus_up_error'] = $msg;
        }
        public static function order_sus($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['order_suss'] = $msg;
        }
        public static function order_cancle($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['order_can'] = $msg;
        }
        public static function order_confirmm($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['order_conn'] = $msg;
        }
        public static function order_unshiftt($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['order_unshif'] = $msg;
        }

        public static function offer_sus($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['offer_suss'] = $msg;
        }
        public static function offer_error($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['offer_errorr'] = $msg;
        }
        public static function cupon_expired($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['cupon_exp'] = $msg;
        }
        public static function cupon_not_match($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['cupon_not_match'] = $msg;
        }
        public static function cupon_not_found($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['cupon_not_found'] = $msg;
        }
        public static function coupon_sus($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['cupon_up'] = $msg;
        }
        public static function wish_item_remove($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array();
            }
            $_SESSION['msg']['wish_item_rem'] = $msg;
        }
        public static function wishlist_add($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array();
            }
            $_SESSION['msg']['wish_add'] = $msg;
        }
        public static function wishlist_overflow($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array();
            }
            $_SESSION['msg']['wish_alreaady'] = $msg;
        }
    }



?>