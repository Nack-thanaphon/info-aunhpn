<?php
include "../../../bos/Function/function.php"

?>

<div class="container-fluid">

    <div class="row">
        <div class="col-12 col-sm-8   p-1 m-0 pb-5">
            <div class="card m-0 p-0">
                <div class="card-header  border-left-primary text-primary ">
                    <div class="row mx-auto">
                        <div class="col-12 p-0 ">
                            <h4 class="m-0 p-0 font-weight-bold ">
                                <i class="fas fa-envelope-open-text m-0 p-0"></i>
                                เพิ่มจดหมายข่าว
                            </h4>
                        </div>
                        <!-- <div class="col-6 text-right">
                                    <button class="btn btn-primary text-white" data-toggle="modal"
                                        data-target="#adbanner_uploads">+ เพิ่มแบนเนอร์</button>
                                </div> -->
                    </div>
                </div>

                <form action="">
                    <div class="card-body">

                        <div class="form-group col-md-12">
                            <label for="b_name">ชื่อจดหมายข่าว</label>
                            <input type="text" class="form-control" name="eb_title" id="eb_title"
                                placeholder="กรุณากรอกชื่อจดหมายข่าว" required>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="row">
                                <div class="col">
                                    <label for="url">เขียนโดย</label>
                                    <input type="text" class="form-control" name="ef_by" id="ef_by"
                                        placeholder="Thanaphon Kallapapruek">
                                </div>
                                <div class="col">
                                    <label for="url">วันเดือนปี</label>
                                    <div class="input-group">
                                        <div id="datepicker" class="input-group date">
                                            <input class="form-control" type="text" id="ef_date" name="ef_date"
                                                readonly />
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="button"><span
                                                        class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label for="">รายละเอียดจดหมายข่าว</label>
                                <textarea class="form-control" id="eb_detail" type="text" name="eb_detail" rows="3"
                                    placeholder="กรุณากรอกรายละเอียดจดหมายข่าว"></textarea>
                            </div>
                            <div class="form-group col-md-12" id="detail"></div>
                        </div>
                </form>
            </div>
        </div>
    </div>


    <div class="col-12 col-sm-4 p-1 m-0 ">

        <div class="card p-0 m-0">
            <div class="card-header border-left-primary ">
                <b>
                    <i class="fas fa-rss-square p-0"></i>
                    จำนวนอัลบั้มทั้งหมด
                </b>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h1 class="p-0 text-right" style="font-size: 3.5rem;">
                            <?php echo  count_total_banner($conn) ?>
                        </h1>
                    </div>
                    <div class="col-4">
                        <p class="p-0 m-0 text-right">/ ไฟล์</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<?php include "./include/footer.php"; ?>