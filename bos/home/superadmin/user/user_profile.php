<?php
include "../../../bos/function/function.php"

?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header  border-left-primary  ">
                <div class="row  mx-auto">
                    <div class="col-lg-12  ">
                        <h4>
                            <i class="fas fa-user-edit text-primary"></i>
                            อัพเดตข้อมูลส่วนตัว
                        </h4>
                        <small>หน่วยงานสุขภาพอาเซียน มหาวิทยาลัยมหิดล</small>

                    </div>

                </div>

            </div>

            <form id="edit_userform">
                <div class="row py-3 p-0 m-0">
                    <div class="col-12 col-md-4 m-auto">
                        <!-- <div class="container"> -->
                        <p class="text-center">รูปประจำตัว</p>
                        <div class="profile-name">
                            <img src="https://scontent.fbkk12-1.fna.fbcdn.net/v/t39.30808-6/260284501_461086452110209_5998823695527518410_n.jpg?_nc_cat=106&ccb=1-5&_nc_sid=09cbfe&_nc_eui2=AeF7dkCBqJPE2yfAe3xSRFran4TDBiv2d_ifhMMGK_Z3-FUONH-d6Ve9Ws78y-utCwQT4AzdD8v-LFRrQ84jlqmE&_nc_ohc=Zqp4cxPiAPgAX83j8aq&_nc_zt=23&_nc_ht=scontent.fbkk12-1.fna&oh=00_AT_o6WV8hY26PFXpxCxLpx-hnhn71dpP1hBQHuq3XEZQZg&oe=62383035"
                                id="photo" alt="..." class="img-circle profile-img">
                            <div class="middle">
                                <label for="file" class="text" id="uploadBtn">เลือกรูปภาพ</label>
                                <input type="file" id="file">
                            </div>
                        </div>
                        <!-- <img src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" alt="..." class="img-circle profile-img"> -->
                        <!-- </div> -->
                    </div>
                    <div class="col-12 col-md-8 px-3 p-2">
                        <h5 class="text-center text-sm-left ">รายละเอียดข้อมูลส่วนตัว</h5>
                        <hr>
                        <div class="form-group col-md-12 m-1">
                            <div class="row">
                                <div class="col-12  col-md-6 p-0 m-0 py-1">
                                    <div class="form-group">
                                        <p class="text-primary">ตำแหน่งผู้ใช้งาน :</p>
                                        <p class="text-dark text-uppercase" id="duser_role_id"></p>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 p-0 m-0 py-1">
                                    <div class="form-group">
                                        <p class="text-primary">ชื่อ-นามสกุล :</p>
                                        <p class="text-dark" id="dfull_name"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12  col-md-6 p-0 m-0 py-1">
                                    <div class="form-group">
                                        <p class="text-primary">อีเมลผู้ใช้งาน :</p>
                                        <p class="text-dark" id="duser_email"></p>
                                    </div>
                                </div>
                                <div class="col-12  col-md-6 p-0 m-0 py-1">
                                    <div class="form-group">
                                        <p class="text-primary">ชื่อผู้ใช้งาน :</p>
                                        <p class="text-dark" id="duser_name"></p>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-12  col-md-6 p-0 m-0 py-1">

                                    <div class="form-group">
                                        <p class="text-primary">วันเดือนปีเกิด :</p>
                                        <p class="text-dark" id="duser_name">19 jun 1992</p>
                                    </div>
                                </div>
                                <div class="col-12  col-md-6 p-0 m-0 py-1">
                                    <div class="form-group">
                                        <p class="text-primary">เพศ :</p>
                                        <p class="text-dark" id="duser_name">ชาย</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class=" col-6 p-0 m-0 py-1">
                                    <div class="form-group">
                                        <p class="text-primary">ลงทะเบียนวันที่ :</p>
                                        <p class="text-dark" id="duser_name">12 jan 1992</p>
                                    </div>
                                </div>
                                <div class=" col-6 p-0 m-0 py-1">
                                    <div class="form-group">
                                        <p class="text-primary">สถานะการใช้งาน :</p>
                                        <p class="badge badge-pill badge-success">ใช้งานอยู่</p>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="col-8 mx-auto py-2">
                                <button class="btn btn-primary w-100" id="submit">อัพเดตข้อมูล</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>