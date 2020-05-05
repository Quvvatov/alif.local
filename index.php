<?php
    echo '<h3>Это консольное приложения на PHP!</h3>';
    echo '<hr />';
    echo '<p>Для того чтобы пользоваться Вам нужно запустить коммандную строку в папке alif.local.</p>';
    echo '<p>Комманда send принимает 2 обязательных аргументов.</p>';
    echo '<p>Первый это (int)orderid, второй (string)sendby = phone OR mail.</p>';
    echo '<p>Например: комманда <b>php bin/console send 1 phone</b> - отправляет: orderid=1, отправить по смс.</p>';
    echo '<hr />';
    echo '<p>AUTHOR Dilshod Quvvatov.</p>';