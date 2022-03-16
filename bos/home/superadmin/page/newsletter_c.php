<?php
include "../../../bos/Function/function.php"

?>
<div class="container-fluid">

    <div class="row">
        <div class="col-12   p-1 m-0 pb-5">
            <div class="card m-0 p-0">
                <div class="card-header  border-left-primary text-primary ">
                    <div class="row mx-auto">
                        <div class="col-6 p-0 ">
                            <h4 class="m-0 p-0 font-weight-bold ">
                                <i class="fas fa-envelope-open-text m-0 p-0"></i>
                                เพิ่มจดหมายข่าว
                            </h4>
                        </div>
                        <div class="col-6 text-right">
                            <a href="./newsletter.php" class="btn btn-danger text-white">กลับ</a>
                        </div>
                    </div>
                </div>
                <form id="Newsletter_ad">
                    <div class="card-body">
                        <div class="form-group col-md-12">
                            <div class="row">
                                <div class="col">
                                    <label for="url">ประจำเดือน</label>
                                    <input type="text" class="form-control" name="n_date" placeholder="March">
                                </div>
                                <div class="col">
                                    <label for="url">วันเดือนปี</label>
                                    <div class="input-group">
                                        <div id="datepicker" class="input-group date">
                                            <input class="form-control" type="date" name="n_create" readonly />
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
                            <label for="b_name">ชื่อจดหมายข่าว</label>
                            <input type="text" class="form-control" name="n_title" placeholder="กรุณากรอกชื่อจดหมายข่าว"
                                required>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <label for="">รายละเอียดจดหมายข่าว</label>
                                <textarea class="form-group col-md-12" class="textarea" name="n_detail" value=""
                                    id="detail" name="n_detail"></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="n_user_id" value="<?php echo $_SESSION['user']['id'] ?>" />
                        <button type="submit" class="btn-submit">เรียบร้อย</button>
                </form>
            </div>
        </div>
    </div>


    <!-- <div class="col-12  p-1 m-0 ">
        <div class="row">
            <div class="col">

                <div class="card p-0  m-0 mb-3 ">
                    <div class="card-header border-left-primary ">
                        <b>
                            <i class="fas fa-rss-square p-0"></i>
                            จำนวนจดหมายข่าวทั้งหมด
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
            <div class="col">
                <div class="card p-0 m-0">
                    <div class="card-header border-left-primary ">
                        <b>
                            <i class="fas fa-rss-square p-0"></i>
                            ยอดเข้าชมสูงสุด
                        </b>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">ประจำเดือน</th>
                                            <th scope="col">ยอดเขาชม</th>
                                            <th scope="col">ดาวน์โหลด</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>1500</td>
                                            <td>
                                                <button type="button" class="upload btn btn-primary w-100">
                                                    <i class="fas fa-upload m-0 p-0"></i>
                                                </button>
                                            </td>


                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Jacob</td>
                                            <td>1500</td>

                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Larry</td>
                                            <td>1500</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 ">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> -->
</div>


<?php include "./include/footer.php"; ?>