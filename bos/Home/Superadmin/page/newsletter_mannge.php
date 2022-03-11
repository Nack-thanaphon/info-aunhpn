<?php
include "../../../bos/Function/function.php"

?>

<body class="hold-transition sidebar-mini">
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto">
                <div class="col-12">

                    <div class="card-header  border-left-primary  ">
                        <div class="row mx-auto">
                            <div class="col-6 p-0 ">
                                <h2 class="m-0 p-0 font-weight-bold text-primary">
                                    <i class="fas fa-envelope-open-text m-0 p-0"></i>
                                    จัดการจดหมายข่าว
                                </h2>
                                <small>จัดการจดหมายข่าว (Newsletter) : สำนักงานสุขภาพอาเซียน</small>
                            </div>
                            <div class="col-6 text-right">
                                <a href="#" class="btn btn-primary text-white">เพิ่มจดหมายข่าว</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">

                    <div class="card-body">
                        <table id="file_t" class="table table-hover" width="100%">
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>







    <div class="container-fluid">
        <div id="adfile_t" class="modal fade" role="dialog">
            <div class=" modal-dialog  modal-md mx-auto">
                <div class="row">
                    <div class="modal-content">
                        <div class="modal-header bg-primary  text-white border-0 pt-4">
                            <h4>
                                <i class="fas fa-plus"></i>
                                เพิ่มชนิดเอกสาร
                            </h4>
                            <button type="button" class="close  text-white" data-dismiss="modal">&times;</button>
                        </div>
                        <form id="file_type" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="form">

                                        <div class="form-group col-md-12">
                                            <label for="n_name">ชื่อชนิดเอกสาร</label>
                                            <input type="text" class="form-control" name="t_name" id="t_name"
                                                placeholder="กรุณากรอกชื่อชนิดเอกสาร" required>
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12 w-100 ">
                                        <button type="submit" class="btn btn-primary btn-block mx-auto w-100"
                                            name="submit">บันทึกข้อมูล</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div id="eadfile_t" class="modal fade" role="dialog">
            <div class=" modal-dialog  modal-md mx-auto">
                <div class="row">
                    <div class="modal-content">
                        <div class="modal-header bg-warning text-white border-0 pt-4">
                            <h4>
                                <i class="fas fa-edit"></i>
                                แก้ไขชนิดเอกสาร
                            </h4>
                            <button type="button" class="close  text-white" data-dismiss="modal">&times;</button>
                        </div>
                        <form id="efile_type" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="form">

                                        <div class="form-group col-md-12">
                                            <label for="n_name">ชื่อชนิดเอกสาร</label>
                                            <input type="text" class="form-control" name="et_name" id="et_name"
                                                placeholder="กรุณากรอกชื่อชนิดเอกสาร" required>
                                        </div>

                                    </div>

                                    <div class="form-group col-sm-12 w-100 ">
                                        <input type="hidden" name="et_id" id="et_id" />

                                        <button type="submit" class="btn btn-primary btn-block mx-auto w-100"
                                            name="submit">บันทึกข้อมูล</button>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>







    <?php include "./include/footer.php"; ?>
</body>