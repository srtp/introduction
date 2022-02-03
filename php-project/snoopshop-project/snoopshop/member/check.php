<head><script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script></head>
<?php 
if($_SESSION['username']=='') { ?>
	
    <script>
    Swal.fire({
        icon: 'error',
        title: 'ไม่สามารถเข้ามายังหน้าเพจนี้ได้!',
        text: 'กรุณา login ใหม่อีกครั้ง',
		confirmButtonText: 'ตกลง'	,
		allowEscapeKey: false,
        footer: '<a href="index.php">ย้อนกลับไปหน้าแรก</a>'
	}).then(function() {
            window.location.href = "../index.php";
    });
	
    </script> <?php } ?>