<?php
require('dbconnect.php');

$q_id = 1;
if(isset($_GET['query'])){
    $q_id = $_GET['query'];
}

// กำหนดข้อความโจทย์สำหรับแสดงผล
$questions = [
    1 => "1. จงเขียนคำสั่งเพื่อดึงข้อมูลทุกคอลัมน์จากตาราง city",
    2 => "2. จงแสดงรายชื่อเมือง (Name) และเขตการปกครอง (District) ของทุกเมือง",
    3 => "3. จงหาชื่อเมืองที่อยู่ในรหัสประเทศ (CountryCode) เป็น 'THA'",
    4 => "4. จงหาเมืองที่มีจำนวนประชากร (Population) มากกว่า 1,000,000 คน",
    5 => "5. จงหาเมืองในรหัสประเทศ (CountryCode) เป็น 'BEL' และที่มีจำนวนประชากร (Population) มากกว่า 2,000,000 คน",
    6 => "6. จงแสดงชื่อประเทศ (Name) และทวีป (Continent) ของทุกประเทศ",
    7 => "7. จงหาข้อมูลของประเทศที่ตั้งอยู่ในทวีป 'Asia'",
    8 => "8. จงหาชื่อประเทศที่อยู่ในภูมิภาค (Region) 'Southeast Asia' และมีประชากรมากกว่า 50 ล้านคน",
    9 => "9. จงหาชื่อประเทศที่มีอายุขัยเฉลี่ย (LifeExpectancy) สูงกว่า 80 ปี",
    10 => "10. จงหาชื่อประเทศที่ไม่มีข้อมูลปีที่ได้รับเอกราช (IndepYear เป็น NULL)",
    11 => "11. จงหาชื่อประเทศที่มีค่า GNP ในปัจจุบัน มากกว่าค่า GNP เก่า (GNPOld)",
    12 => "12. จงแสดงภาษา (Language) ทั้งหมดที่ใช้ในรหัสประเทศ 'USA'",
    13 => "13. จงหาภาษาที่เป็นภาษาทางการ (IsOfficial = 'T')",
    14 => "14. จงหาภาษาที่มีสัดส่วนการใช้ (Percentage) มากกว่า 50% ขึ้นไป",
    15 => "15. จงหาภาษาที่ไม่ใช่ภาษาทางการ (IsOfficial = 'F') แต่มีสัดส่วนการใช้มากกว่า 30%"
];

$current_question = isset($questions[$q_id]) ? $questions[$q_id] : "ไม่พบข้อมูลโจทย์";

// กำหนดคำสั่ง SQL
if($q_id == 1){ $sql = "SELECT * FROM city"; }
elseif($q_id == 2){ $sql = "SELECT Name, District FROM city"; }
elseif($q_id == 3){ $sql = "SELECT Name FROM city WHERE CountryCode = 'THA'"; }
elseif($q_id == 4){ $sql = "SELECT * FROM city WHERE Population > 1000000"; }
elseif($q_id == 5){ $sql = "SELECT * FROM city WHERE CountryCode = 'BEL' AND Population > 2000000"; }
elseif($q_id == 6){ $sql = "SELECT Name, Continent FROM country"; }
elseif($q_id == 7){ $sql = "SELECT * FROM country WHERE Continent = 'Asia'"; }
elseif($q_id == 8){ $sql = "SELECT Name FROM country WHERE Region = 'Southeast Asia' AND Population > 50000000"; }
elseif($q_id == 9){ $sql = "SELECT Name FROM country WHERE LifeExpectancy > 80"; }
elseif($q_id == 10){ $sql = "SELECT Name FROM country WHERE IndepYear IS NULL"; }
elseif($q_id == 11){ $sql = "SELECT Name FROM country WHERE GNP > GNPOld"; }
elseif($q_id == 12){ $sql = "SELECT Language FROM countrylanguage WHERE CountryCode = 'USA'"; }
elseif($q_id == 13){ $sql = "SELECT Language FROM countrylanguage WHERE IsOfficial = 'T'"; }
elseif($q_id == 14){ $sql = "SELECT Language FROM countrylanguage WHERE Percentage > 50"; }
elseif($q_id == 15){ $sql = "SELECT Language FROM countrylanguage WHERE IsOfficial = 'F' AND Percentage > 30"; }
else { $sql = "SELECT * FROM city"; }

$result = mysqli_query($connect, $sql);
$count = mysqli_num_rows($result);
$order = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>ผลลัพธ์ข้อที่ <?php echo $q_id; ?></title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-2 text-primary">ผลลัพธ์ Assignment 5: ข้อที่ <?php echo $q_id; ?></h2>
        
        <div class="card mb-3 shadow-sm">
            <div class="card-body bg-white border-start border-primary border-5">
                <h5 class="card-title mb-0"><?php echo $current_question; ?></h5>
            </div>
        </div>

        <div class="alert alert-secondary py-2 mb-3">
            <strong>SQL Query:</strong> <code class="text-danger"><?php echo $sql; ?></code>
        </div>
        
        <div class="table-responsive">
            <table class="table table-striped table-bordered bg-white shadow-sm">
                <thead class="table-dark text-center">
                    <tr>
                        <th width="80px">ลำดับ</th>
                        <?php 
                        if($result) {
                            while ($field = mysqli_fetch_field($result)) {
                                if (strtoupper($field->name) != 'ID') {
                                    echo "<th>" . $field->name . "</th>";
                                }
                            }
                        }
                        ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if($count > 0) {
                        while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td class="text-center"><?php echo $order++; ?></td>
                            <?php foreach($row as $key => $data) { 
                                if (strtoupper($key) != 'ID') {
                                    echo "<td>$data</td>"; 
                                }
                            } ?>
                        </tr>
                    <?php } 
                    } else {
                        echo "<tr><td colspan='10' class='text-center text-muted'>-- ไม่พบข้อมูล --</td></tr>";
                    } ?>
                </tbody>
            </table>
        </div>
        
        <div class="mt-3 mb-5">
            <p class="text-secondary">จำนวนข้อมูลทั้งหมด: <strong><?php echo $count; ?></strong> รายการ</p>
            <hr>
            <a href="L5index.php" class="btn btn-dark">กลับหน้าเมนูหลัก</a>
        </div>
    </div>
</body>
</html>