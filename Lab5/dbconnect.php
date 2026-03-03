<?php
// กำหนดค่าการเชื่อมต่อฐานข้อมูล
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'Mydata');

// เชื่อมต่อฐานข้อมูล
$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

// ตรวจสอบการเชื่อมต่อ (คอมเมนต์ออกเพื่อไม่ให้โชว์ error เมื่อมีปัญหา)
// if(!$connect){
//     die("เชื่อมต่อพลาด: " . mysqli_connect_error());
// }

// ตั้งค่า charset เป็น UTF-8
mysqli_set_charset($connect, 'utf8mb4');
?>