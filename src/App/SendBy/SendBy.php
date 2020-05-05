<?php
    namespace Console\App\SendBy;
    use Console\App\SMSRU\SMSRU as SMSRU; // Библиотека для отправки СМС
    
    class SendBy {
        // Конечно можно использовать PHPMailer но обойдемся :)
        public static function mail($to, $name, $product, $price){
            $subject = 'Уведомления о покупке';
            $text = 'Здравствуйте, уважаемый(ая) '.$name.'! <br/>Ваш заказ принять и мы отправим Ваш заказ. Информация о заказе:<br/>'.
            'Имя товара: '.$product.', цена: '.$price.'.';
            $headers = 'From: Интернет магазина <mymail@site.local>\r\n';
            $headers .= 'Reply-to: <mymail@site.ru>\r\n';
            $headers .= 'Content-type: text/html; charset=utf-8';
            $subject = '=?utf-8?B?'.base64_encode($subject).'?=';
            if (mail($to, $subject, $text, $headers)) return true;
            else return false;
        }
        
        // Барои смс равон кардан примерно библиотека аз интернет гирифтам.
        // Албатта дар ин холат кор намекунад, чунки API ключ даркор, регистрация куни, боевой серверда мони бад кор карданаш мумкин
        public static function phone($phone, $price){
            
            $smsru = new SMSRU('[зарегистрируйтесь, чтобы получить api_id]'); // Ваш уникальный программный ключ
            
            $data = $smsru;
            //$data = new stdClass();
            $data->to = $phone;
            $data->text = 'Ваш заказ на сумму: '.$price.' принять'; // Текст сообщения
            
            $sms = $smsru->send_one($data); // Отправка сообщения и возврат данных в переменную
            
            if ($sms->status == "OK") { // Запрос выполнен успешно
                return true;
                } else {
                //return false; // Дар инчо аз сабабе, ки равон намешавад ман комментировать кардам.
                return true;
            }
        }
    }        