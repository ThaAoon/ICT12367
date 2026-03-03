<?php
// เชื่อมต่อฐานข้อมูล
require('dbconnect.php');

// รับฟิลส์ข้อมูล และ trim ความว่าง
$fname = isset($_POST['fname']) ? trim($_POST['fname']) : '';
$lname = isset($_POST['lname']) ? trim($_POST['lname']) : '';

// Validation - ตรวจสอบการว่าง
$errors = [];

if (empty($fname)) {
    $errors[] = 'กรุณากำดัหมัดรชื่อ';
}

if (empty($lname)) {
    $errors[] = 'กรุณากำดัหมัดรนามสกุล';
}

if (count($errors) > 0) {
    // มีฟิลด์ขัดข้อผิดพลาด
    echo '<!DOCTYPE html>';
    echo '<html lang="th">';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<title>ผิดพลาดการบันทึก</title>';
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">';
    echo '</head>';
    echo '<body>';
    echo '<div class="container my-3">';
    echo '<div class="alert alert-danger">';
    echo '<h4>ผิดพลาดการบันทึก</h4>';
    echo '<ul>';
    foreach ($errors as $error) {
        echo '<li>' . htmlspecialchars($error) . '</li>';
    }
    echo '</ul>';
    echo '<a href="L5insertform.php" class="btn btn-primary">กลับมาตำหนং</a>';
    echo '</div>';
    echo '</div>';
    echo '</body>';
    echo '</html>';
    exit();
}

// ใช้ Prepared Statement เพื่อความปลอดภัย SQL Injection
$sql = "INSERT INTO employees (fname, lname) VALUES (?, ?)";
$stmt = mysqli_prepare($connect, $sql);

if ($stmt) {
    // Bind Parameters (s = string)
    mysqli_stmt_bind_param($stmt, "ss", $fname, $lname);
    
    // Execute
    if (mysqli_stmt_execute($stmt)) {
        // สำเร็จ - แสดงฉบับที่สำเร็จ
        echo '<!DOCTYPE html>';
        echo '<html lang="th">';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>บันทึกสำเร็จ</title>';
        echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">';
        echo '</head>';
        echo '<body>';
        echo '<div class="container my-5">';
        echo '<div class="alert alert-success" role="alert">';
        echo '<h4 class="alert-heading">คณายินดี !</h4>';
        echo '<p>บันทึกข้อมูลพนักงานสำเร็จได้แล้ว</p>';
        echo '<h5>ข้อมูลที่บันทึก:</h5>';
        echo '<ul>';
        echo '<li>ชื่อ: ' . htmlspecialchars($fname) . '</li>';
        echo '<li>นามสกุล: ' . htmlspecialchars($lname) . '</li>';
        echo '</ul>';
        echo '<hr>';
        echo '<a href="L5insertform.php" class="btn btn-primary">บันทึกข้อมูลอื่น</a> ';
        echo '<a href="L5index.php" class="btn btn-secondary">กลับหน้าหลัก</a>';
        echo '</div>';
        echo '</div>';
        echo '</body>';
        echo '</html>';
    } else {
        // ผิดพลาด execute
        echo '<!DOCTYPE html>';
        echo '<html lang="th">';
        echo '<head>';
        echo '<meta charset="UTF-8">';
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
        echo '<title>ผิดพลาด</title>';
        echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">';
        echo '</head>';
        echo '<body>';
        echo '<div class="container my-3">';
        echo '<div class="alert alert-danger">';
        echo '<h4>เกิดผิดพลาด</h4>';
        echo '<p>' . htmlspecialchars(mysqli_error($connect)) . '</p>';
        echo '<a href="L5insertform.php" class="btn btn-primary">กลับมาตำหนัง</a>';
        echo '</div>';
        echo '</div>';
        echo '</body>';
        echo '</html>';
    }
    
    mysqli_stmt_close($stmt);
} else {
    // ผิดพลาด prepare
    echo '<!DOCTYPE html>';
    echo '<html lang="th">';
    echo '<head>';
    echo '<meta charset="UTF-8">';
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
    echo '<title>ผิดพลาด</title>';
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">';
    echo '</head>';
    echo '<body>';
    echo '<div class="container my-3">';
    echo '<div class="alert alert-danger">';
    echo '<h4>เกิดผิดพลาด</h4>';
    echo '<p>' . htmlspecialchars(mysqli_error($connect)) . '</p>';
    echo '<a href="L5insertform.php" class="btn btn-primary">กลับมาตำหนัง</a>';
    echo '</div>';
    echo '</div>';
    echo '</body>';
    echo '</html>';
}

mysqli_close($connect);
?>