    <!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกข้อมูลพนักงาน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .form-container { max-width: 500px; margin: 50px auto; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container">
            <a href="L5index.php" class="navbar-brand">Phetphisut Tinlalux</a>
        </div>
    </nav>

    <div class="container form-container">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">บันทึกข้อมูลพนักงาน</h3>
            </div>
            <div class="card-body">
                <form action="L5insertData.php" method="post" novalidate>
                    <div class="mb-3">
                        <label for="fname" class="form-label">ชื่อ <span class="text-danger">*</span></label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="fname" 
                            name="fname" 
                            placeholder="กรุณากำดัหมัดรชื่อ" 
                            required
                        >
                    </div>
                    <div class="mb-3">
                        <label for="lname" class="form-label">นามสกุล <span class="text-danger">*</span></label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="lname" 
                            name="lname" 
                            placeholder="กรุณากำดัหมัดรนามสกุล" 
                            required
                        >
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                        <button type="reset" class="btn btn-warning">ล้างข้อมูล</button>
                        <a href="L5index.php" class="btn btn-secondary">กลับ</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>