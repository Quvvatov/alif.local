<?php
    namespace Console\App\Controllers;
    
    use Console\App\DataBase\DataBase as DB;
    use Console\App\SendBy\SendBy as Sendby;
    use Console\App\Loger\Loger as Loger;
    
    class MainController {
        
        private static $productname;
        private static $productprice;
        private static $username;
        private static $userphone;
        private static $usermail;
        
        private static $productid;
        private static $userid;
        
        public static function run($userid, $sendby, $orderid){
            try {
                foreach(DB::Orders() as $order){
                    if ($order['id'] == $orderid){
                        self::$productid = $order['productid'];
                        self::$userid = $order['userid'];
                    }
                }
                
                foreach(DB::Products() as $product){
                    if ($product['id'] == self::$productid){
                        self::$productname = $product['name'];
                        self::$productprice = $product['price'];
                    }
                }
                
                foreach(DB::Users() as $user){
                    if ($user['id'] == self::$userid){
                        self::$username = $user['name'];
                        self::$userphone = $user['phone'];
                        self::$usermail = $user['mail'];
                    }
                }
                if ($sendby == 'mail'){
                    if (Sendby::Mail(self::$usermail, self::$username, self::$productname, self::$productprice)){
                        return '<info>Успешно отправлено через E-MAIL.'.PHP_EOL.'Информация:'.PHP_EOL.
                        'Имя: '.self::$username.', Товар: '.self::$productname.', Цена: '.self::$productprice.'</info>';
                    } else {
                       $message = '<error>Ошибка при отправке по E-MAIL.</error>';
                       Loger::write($message);
                       return $message;
                    }
                }
                
                if ($sendby == 'phone'){
                    if (Sendby::Phone(self::$userphone, self::$productprice)){
                        return '<info>Успешно отправлено через СМС.'.PHP_EOL.'Информация:'.PHP_EOL.
                        'Телефон: '.self::$userphone.', Имя: '.self::$username.', Товар: '.self::$productname.', Цена: '.self::$productprice.'</info>';
                    } else {
                        $message = '<error>Ошибка при отправке по СМС.</error>';
                        Loger::write($message);
                        return $message;
                    }
                }
            }
            catch(Exception $ex){
                echo $ex->getMessage();
                Loger::write($ex->getMessage());
            }
        }
    }    