<?php
include "../../../bos/Function/function.php"

?>

<body class="hold-transition sidebar-mini">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-8">
                <div class="card ">
                    <div class="card-header border-left-primary  ">
                        <h4 class="text-primary">
                            <i class="fas fa-rss-square"></i>
                            ระบบจัดการกิจกรรม
                        </h4>
                        <small>จัดการกิจกรรมต่างๆภายใน : สำนักงานสุขภาพอาเซียน</small>
                    </div>
                    <div class="card-body" id="calendar"></div>
                </div>

            </div>
            <div class="col-12 col-sm-4">
                <div class="col-12 p-0">
                    <form id="event_ad">

                        <div class="card ">
                            <div class=" card-header border-left-primary shadow h-100 py-3">
                                <div class="row">
                                    <div class="col-12">
                                        <b>
                                            <h4 class="p-0 m-0 pl-2 text-left text-primary">
                                                <i class="fas fa-rss-square p-0"></i>
                                                Book Event
                                            </h4>
                                        </b>
                                    </div>
                                    <div class="col-6 text-right">



                                    </div>
                                </div>

                            </div>

                            <div class="card-body">
                                <div class="col-12">
                                    <div class="form">
                                        <label for="n_name" class="py-2" id="e_header">
                                            <h4>รายละเอียดกิจกรรม</h4>
                                        </label>
                                        <div class="form-group col-md-12">
                                            <label for="exampleFormControlSelect1"
                                                class="text-primary">ประเภทกิจกรรม</label>
                                            <select class="form-control" id="e_type" name="f_group">
                                                <?php echo  event_type($conn) ?>
                                            </select>
                                        </div>

                                    </div>


                                    <div class="form-group col-md-12">
                                        <label for="n_name" class="text-primary">ชื่อกิจกรรม</label>
                                        <input type="text" class="form-control" name="e_name" value="" id="e_name"
                                            placeholder="กรุณากรอกชื่อกิจกรรม" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="n_name" class="text-primary">ลิงค์กิจกรรม (*ถ้ามี)</label>
                                        <input type="text" class="form-control" name="e_link" id="e_link"
                                            placeholder="กรุณากรอกลิงค์กิจกรรม" required>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="form-group">
                                            <label for="n_name" id="text_header"
                                                class="text-primary">รายละเอียดกิจกรรม</label>

                                            <textarea class="form-control" id="e_detail" type="text" name="e_detail"
                                                rows="3" placeholder="กรุณากรอกรายละเอียดกิจกรรม"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="n_name" class="text-primary">ชื่อสถานที่ (*จำเป็น)</label>
                                        <input type="text" class="form-control" name="e_address" id="e_address"
                                            placeholder="กรุณากรอกชื่อสถานที่" required>
                                    </div>
                                    <div class="col" id="middle_line">
                                        <p class="text-primary"><span>วัน-เวลา กิจกรรม</span></p>

                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <label for="url">วัน-เริ่มต้น</label>

                                                <div class="input-group">
                                                    <div class="input-group date">
                                                        <input class="form-control" type="date" id="start"
                                                            name="start" />
                                                        <div class="input-group-append">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-6">
                                                <label for="url">วัน-สิ้นสุด</label>

                                                <div class="input-group">
                                                    <div class="input-group date">
                                                        <input class="form-control" type="date" id="end" name="end" />
                                                        <div class="input-group-append">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <div class="row">
                                            <div class="col-12 col-sm-6">
                                                <label for="url">เวลา-เริ่มต้น</label>

                                                <div class="input-group">
                                                    <div class="input-group date">
                                                        <input class="form-control" type="time" id="s_time"
                                                            name="s_time" />
                                                        <div class="input-group-append">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-6">
                                                <label for="url">เวลา-สิ้นสุด</label>

                                                <div class="input-group">
                                                    <div class="input-group date">
                                                        <input class="form-control" type="time" id="e_time"
                                                            name="e_time" />
                                                        <div class="input-group-append">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="url" class="text-primary">เลือกไฟล์เอกสาร(*ถ้ามี)</label>

                                        <div class="custom-file">
                                            <label class="custom-file-label" id="file_name"> *เฉพาะไฟล์
                                                .pdf,.doc,.ptt (ไม่เกิน 15MB เท่านั้น )
                                            </label>
                                            <input id="e_name" type="hidden" name="f_fname">
                                            <input id="e_file" type="file" class="custom-file-input" name="e_file">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group col-sm-12 w-100 ">
                                    <div class="row p-0 m-0">
                                        <div class="col-6">
                                            <button type="submit" class="btn btn-primary btn-block mx-auto w-100"
                                                id="event_submit" name="submit">บันทึกข้อมูล</button>
                                        </div>
                                        <div class="col-6">
                                            <button class="btn btn-danger btn-block mx-auto w-100" id="event_delete"
                                                name="event_delete">ลบข้อมูล</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>






    <?php include "./include/footer.php"; ?>
</body>