<?php
$db = require __DIR__ . '/db.php';
// test database! Important not to run tests on production or development databases3
$db['dsn'] = 'mysql:host=localhost;dbname=yii2basic_test';

return $db;
