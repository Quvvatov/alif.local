<?php
    namespace Console\App\DataBase;
    
    // Манипуляция база данных
    class DataBase {
        
        // Таблица товаров
        public static function Products(){
            $products = [
                0 => [
                    'id' => 1,
                    'name' => 'Красивый телевизор LG',
                    'price' => '1024'
                ],
                1 => [
                    'id' => 2,
                    'name' => 'Хороший телефон Samsung',
                    'price' => '1560'
                ],
                2 => [
                    'id' => 3,
                    'name' => 'Коженная сумка',
                    'price' => '420'
                ]
            ];
            return $products;
        }
        
        // Таблица пользователей
        public static function Users(){
            $users = [
                0 => [
                    'id' => 1,
                    'name' => 'Safar',
                    'phone' => '+992 918338309',
                    'mail' => 'safar@mail.ru'
                ],
                1 => [
                    'id' => 2,
                    'name' => 'Daler',
                    'phone' => '+992 918445588',
                    'mail' => 'daler@mail.ru'
                ],
                2 => [
                    'id' => 3,
                    'name' => 'Бахтовар',
                    'phone' => '+992 918557584',
                    'mail' => 'baxa@mail.ru'
                ]
            ];
            return $users;
        }   
        
        // Таблица заказов
        public static function Orders(){
            $orders = [
                0 => [
                    'id' => 1,
                    'productid' => 1,
                    'userid' => 2
                ],
                1 => [
                    'id' => 2,
                    'productid' => 2,
                    'userid' => 1
                ],
                2 => [
                    'id' => 3,
                    'productid' => 3,
                    'userid' => 3
                ]
            ];
            return $orders;
        }
    }