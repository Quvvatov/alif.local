<?php
    namespace Console\App\Loger;
    
    class Loger {
    
        private static $file = __DIR__.'/logs/log.txt';
        
        public static function write($message){
            $date = date('Y-m-d H:i:s');
            $message = $date.PHP_EOL.$message;
            file_put_contents(self::$file, $message . PHP_EOL, FILE_APPEND);
        }
    }