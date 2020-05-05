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
                    'phone' => '+992 918252514',
                    'mail' => 'safar@mail.ru'
                ],
                1 => [
                    'id' => 2,
                    'name' => 'Daler',
                    'phone' => '+992 918445588',
                    'mail' => 'daler@mail.ru'
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
                    'userid' => 2,
                ],
                1 => [
                    'id' => 2,
                    'productid' => 2,
                    'userid' => 1,
                ]
            ];
            return $orders;
        }
    }