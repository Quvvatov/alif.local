<?php
    echo '<h3>Это консольное приложения на PHP!</h3>';
    echo '<hr />';
    echo '<p>Для того чтобы пользоваться Вам нужно запустить коммандную строку в папке alif.local.</p>';
    echo '<p>Комманда send принимает 3 обязательных аргументов.</p>';
    echo '<p>Первый это (int)userid, второй (string)sendby = phone OR mail, третий (int)orderid.</p>';
    echo '<p>Например: php bin/console send 1 phone 1 - отправляет: userid=1, отпраить по смс, orderid=1.</p>';
    echo '<hr />';
    echo '<p>AUTHOR Dilshod Quvvatov.</p>';