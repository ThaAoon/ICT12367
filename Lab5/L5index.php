<?php
require('dbconnect.php');
mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Phetphisut Tinlalux 68025930</title>
    <style>
        body { background-color: #f8f9fa; }
        .list-group-item:hover { background-color: #e9ecef; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <a href="L5index.php" class="navbar-brand">Phetphisut Tinlalux</a>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Assignment 5</h1>
        
        <div class="row">
            <div class="col-md-12">
                <div class="list-group">
                    <a href="Result.php?query=1" class="list-group-item list-group-item-action">1. จงเขียนคำสั่งเพื่อดึงข้อมูลทุกคอลัมน์จากตาราง city</a>
                    <a href="Result.php?query=2" class="list-group-item list-group-item-action">2. จงแสดงรายชื่อเมือง (Name) และเขตการปกครอง (District) ของทุกเมือง</a>
                    <a href="Result.php?query=3" class="list-group-item list-group-item-action">3. จงหาชื่อเมืองที่อยู่ในรหัสประเทศ (CountryCode) เป็น 'THA'</a>
                    <a href="Result.php?query=4" class="list-group-item list-group-item-action">4. จงหาเมืองที่มีจำนวนประชากร (Population) มากกว่า 1,000,000 คน</a>
                    <a href="Result.php?query=5" class="list-group-item list-group-item-action">5. จงหาเมืองในรหัสประเทศ (CountryCode) เป็น 'BEL' และที่มีจำนวนประชากร (Population) มากกว่า 2,000,000 คน</a>
                    <a href="Result.php?query=6" class="list-group-item list-group-item-action">6. จงแสดงชื่อประเทศ (Name) และทวีป (Continent) ของทุกประเทศ</a>
                    <a href="Result.php?query=7" class="list-group-item list-group-item-action">7. จงหาข้อมูลของประเทศที่ตั้งอยู่ในทวีป 'Asia'</a>
                    <a href="Result.php?query=8" class="list-group-item list-group-item-action">8. จงหาชื่อประเทศที่อยู่ในภูมิภาค (Region) 'Southeast Asia' และมีประชากรมากกว่า 50 ล้านคน</a>
                    <a href="Result.php?query=9" class="list-group-item list-group-item-action">9. จงหาชื่อประเทศที่มีอายุขัยเฉลี่ย (LifeExpectancy) สูงกว่า 80 ปี</a>
                    <a href="Result.php?query=10" class="list-group-item list-group-item-action">10. จงหาชื่อประเทศที่ไม่มีข้อมูลปีที่ได้รับเอกราช (IndepYear เป็น NULL)</a>
                    <a href="Result.php?query=11" class="list-group-item list-group-item-action">11. จงหาชื่อประเทศที่มีค่า GNP ในปัจจุบัน มากกว่าค่า GNP เก่า (GNPOld)</a>
                    <a href="Result.php?query=12" class="list-group-item list-group-item-action">12. จงแสดงภาษา (Language) ทั้งหมดที่ใช้ในรหัสประเทศ 'USA'</a>
                    <a href="Result.php?query=13" class="list-group-item list-group-item-action">13. จงหาภาษาที่เป็นภาษาทางการ (IsOfficial = 'T')</a>
                    <a href="Result.php?query=14" class="list-group-item list-group-item-action">14. จงหาภาษาที่มีสัดส่วนการใช้ (Percentage) มากกว่า 50% ขึ้นไป</a>
                    <a href="Result.php?query=15" class="list-group-item list-group-item-action">15. จงหาภาษาที่ไม่ใช่ภาษาทางการ (IsOfficial = 'F') แต่มีสัดส่วนการใช้มากกว่า 30%</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>