<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
    $(document).ready(function() {
        var baseUrl = (window.location).href; // You can also use document.URL
        var id = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);
        html = '';
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "../../../Service/Newsletter/update.php",
            data: {
                id: id,
            },
            success: function(data) {
                console.log("good", data);


                $("#newsletter").html(data[0].n_detail)

                // data = response.result;
                // for (var i = 0; i < data.length; i++) {
                //     html += `
                //     <div>${data[0].n_detail}</div>
                //    `
                // }
                // $("#newsletter").html(html);
            },
            error: function(err) {
                console.log("bad", err)

            }
        })
    })
    </script>
</head>

<body>
    <div id="newsletter"></div>
</body>
<?php

require_once('../../../Plugins/TCPDF/tcpdf.php');

// เรียกไฟล์ TCPDF Library เข้ามาใช้งาน กำหนดที่อยู่ตามที่แตกไฟล์ไว้
// เรียกใช้ Class TCPDF กำหนดรายละเอียดของหน้ากระดาษ
// PDF_PAGE_ORIENTATION = กระดาษแนวตั้ง
// PDF_UNIT = หน่วยวัดขนาดของกระดาษเป็นมิลลิเมตร (mm)
// PDF_PAGE_FORMAT = รูปแบบของกระดาษเป็น A4
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8');

// กำหนดคุณสมบัติของไฟล์ PDF เช่น ผู้สร้างไฟล์ หัวข้อไฟล์ คำค้น
$pdf->SetCreator('Mindphp');
$pdf->SetAuthor('Mindphp Developer');
$pdf->SetTitle('Mindphp Example 02');
$pdf->SetSubject('Mindphp Example');
$pdf->SetKeywords('Mindphp, TCPDF, PDF, example, guide');

// กำหนดรายละเอียดของหัวกระดาษ สีข้อความและสีของเส้นใต้
// PDF_HEADER_LOGO = ไฟล์รูปภาพโลโก้
// PDF_HEADER_LOGO_WIDTH = ขนาดความกว้างของโลโก้
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Mindphp Example 02', 'This is PDF Header', array(
    0, 64,
    255
), array(0, 64, 128));

// กำหนดรายละเอียดของท้ายกระดาษ สีข้อความและสีของเส้น
$pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

// กำหนดตัวอักษร รูปแบบและขนาดของตัวอักษร (ตัวอักษรดูได้จากโฟลเดอร์ fonts)
// PDF_FONT_NAME_MAIN = ชื่อตัวอักษร helvetica
// PDF_FONT_SIZE_MAIN = ขนาดตัวอักษร 10
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// กำหนดระยะขอบกระดาษ
// PDF_MARGIN_LEFT = ขอบกระดาษด้านซ้าย 15mm
// PDF_MARGIN_TOP = ขอบกระดาษด้านบน 27mm
// PDF_MARGIN_RIGHT = ขอบกระดาษด้านขวา 15mm
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// กำหนดระยะห่างจากขอบกระดาษด้านบนมาที่ส่วนหัวกระดาษ
// PDF_MARGIN_HEADER = 5mm
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
// กำหนดระยะห่างจากขอบกระดาษด้านล่างมาที่ส่วนท้ายกระดาษ
// PDF_MARGIN_FOOTER = 10mm
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// กำหนดให้ขึ้นหน้าใหม่แบบอัตโนมัติ เมื่อเนื้อหาเกินระยะที่กำหนด
// PDF_MARGIN_BOTTOM = 25mm นับจากขอบล่าง
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// กำหนดตัวอักษรสำหรับส่วนเนื้อหา ชื่อตัวอักษร รูปแบบและขนาดตัวอักษร
$pdf->SetFont('dejavusans', '', 14);

// กำหนดให้สร้างหน้าเอกสาร
$pdf->AddPage();

// ข้อมูลที่จะแสดงในเนื้อหา
$html = '<div id="newsletter"></div>';

// กำหนดการแสดงข้อมูลแบบ HTML
// สามารถกำหนดความกว้างความสูงของกรอบข้อความ
// กำหนดตำแหน่งที่จะแสดงเป็นพิกัด x กับ y ซึ่ง x คือแนวนอนนับจากซ้าย ส่วน y คือแนวตั้งนับจากด้านล่าง
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// กำหนดการชื่อเอกสาร และรูปแบบการแสดงผล
$pdf->Output('Newletter.pdf', 'I');

?>