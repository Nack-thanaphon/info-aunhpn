<?php
include "../../function/function.php"

?>

<div class="row mx-auto ">
    <div class="col-12 p-0 m-0">
        <div class="card mb-4">
            <div class="card-header  border-left-primary text-primary ">
                <div class="row mx-auto">
                    <div class="col-6 p-0 ">
                        <h4 class="m-0 p-0 font-weight-bold ">
                            <i class="fas fa-rss-square m-0 p-0"></i>
                            ระบบจัดการคลังภาพ
                        </h4>
                    </div>
                    <div class="col-6 text-right">
                        <button type="button" name="create_folder" id="create_folder" class="btn btn-success"
                            data-target="#exampleModal" data-toggle="modal">+เพิ่มอัลบั้ม </button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table id="g_table" class="table table-hover" width="100%">
                </table>
            </div>

        </div>
    </div>
</div>
<div class="col-12 p-0 m-0 d-none d-sm-block d-flex justify-content-between">
    <div class="row mx-auto">
        <div class="col-12 col-md-4 pb-3 m-0">
            <div class="card">
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
                                <?php echo  count_total_gallery($conn) ?>
                            </h1>
                        </div>
                        <div class="col-4">
                            <p class="p-0 m-0 text-right">/ อัลบั้ม</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 pb-3 m-0">
            <div class="card">
                <div class="card-header border-left-primary   ">
                    <b>
                        <i class="fas fa-camera p-0"></i>
                        จำนวนภาพทั้งหมด
                    </b>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h1 class="p-0 text-right" style="font-size: 3.5rem;">
                                <?php echo  count_total_images($conn) ?>
                            </h1>
                        </div>
                        <div class="col-4">
                            <p class="p-0 m-0 text-right">/ ภาพ</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 pb-3 m-0">
            <div class="card">
                <div class="card-header border-left-primary   ">
                    <b>
                        <i class="fas fa-trash p-0"></i>
                        ถังขยะ
                    </b>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h1 class="p-0 text-right" style="font-size: 3.5rem;">
                                <?php echo  count_prepare_delete($conn) ?>
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
</div>
</div>
</div>




<div id="exampleModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header  border-left-primary text-primary ">

                <h4 class="m-0 p-0 font-weight-bold ">
                    <i class="fas fa-rss-square m-0 p-0"></i>
                    สร้างอัลบั้มรูปภาพ
                </h4>
            </div>


            <form id="create_gallery">
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <label for="" class="text-primary"> <label for="">ชื่ออัลบั้ม</label>
                        </label>
                        <input type="text" name="folder_name" id="folder_name" class="form-control"
                            placeholder="กรุณากรอกชื่ออัลบั้ม" />
                    </div>
                    <div class="form-group col-md-12">
                        <div class="form-group">
                            <label for="n_name" id="text_header" class="text-primary">รายละเอียดอัลบั้ม</label>

                            <textarea class="form-control" id="d_gallary" type="text" name="d_gallary" rows="3"
                                placeholder="กรุณากรอกรายละเอียดอัลบั้ม"></textarea>
                        </div>
                    </div>

                    <input type="hidden" name="action" id="action" />
                    <input type="hidden" name="old_name" id="old_name" />
                    <button type="submit" name="folder_button" id="c_gallery" class="btn-submit"
                        value="Create">เรียบร้อย</button>

                </div>
            </form>

        </div>
    </div>



</div>


</div>
<div id="uploadModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header  border-left-primary text-primary ">

                <h4 class="m-0 p-0 font-weight-bold ">
                    <i class="fas fa-rss-square m-0 p-0"></i>
                    อัพโหลดภาพ
                </h4>
            </div>


            <div class="col-12">
                <div class="card-body">


                    <div class="col" id="middle_line">
                        <p class="text-primary"><span>กรุณาอัพโหลดภาพ</span></p>

                    </div>


                    <form method="post" id="upload_form" enctype='multipart/form-data'>

                        <div class="form-group col-md-12">
                            <div class="custom-form-group">
                                <div class="custom-file-drop-area ">
                                    <form id="uploads_form" action="" method="" enctype="multipart/for-data">
                                        <label for="filephotos">วางไฟล์ลงตรงนี้</label>
                                        <input type="hidden" name="folder" id="hidden_folder_name" />

                                        <!-- <input type="file" id='filephotos' name="files[]" multiple><br> -->
                                        <input type="file" id='files' name="files[]" multiple><br>

                                        <input type="hidden" id="g_id" name="g_id">
                                        <button id="submit" type="button" class="btn-submit">อัพโหลดรูปภาพ</button>
                                    </form>
                                </div>
                                <div class="row m-0 p-0 ">
                                    <div id="preview" class="col-12 p-0 ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <button id="submit" value='Upload' type="submit" class="btn-submit">อัพโหลดรูปภาพ</button> -->

                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="filelistModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header  border-left-primary text-primary ">

                <h4 class="m-0 p-0 font-weight-bold ">
                    <i class="fas fa-rss-square m-0 p-0"></i>
                    รายการภาพ
                </h4>
            </div>
            <div class="modal-body">
                <table>
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <!-- <tr>
                    <td>1</td>
                    <td>Movie name</td>
                    <td>Horror</td>
                    <td>
                        <div class="btn-control">
                            <div onclick="open_modal_edit()" class="btn-edit">Edit</div>
                            <div onclick="delete_movielist()" class="btn-delete">Delete</div>
                        </div>
                    </td>
                </tr> -->
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>





<div id="exampleModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header  border-left-primary text-primary ">

                <h4 class="m-0 p-0 font-weight-bold ">
                    <i class="fas fa-rss-square m-0 p-0"></i>
                    สร้างอัลบั้มรูปภาพ
                </h4>
            </div>


            <form id="create_gallery">
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <label for="" class="text-primary"> <label for="">ชื่ออัลบั้ม</label>
                        </label>
                        <input type="text" name="folder_name" id="folder_name" class="form-control"
                            placeholder="กรุณากรอกชื่ออัลบั้ม" />
                    </div>
                    <div class="form-group col-md-12">
                        <div class="form-group">
                            <label for="n_name" id="text_header" class="text-primary">รายละเอียดอัลบั้ม</label>

                            <textarea class="form-control" id="d_gallary" type="text" name="d_gallary" rows="3"
                                placeholder="กรุณากรอกรายละเอียดอัลบั้ม"></textarea>
                        </div>
                    </div>

                    <input type="hidden" name="action" id="action" />
                    <input type="hidden" name="old_name" id="old_name" />
                    <button type="submit" name="folder_button" id="c_gallery" class="btn-submit"
                        value="Create">เรียบร้อย</button>

                </div>
            </form>

        </div>
    </div>



</div>




<div id="gedit_name" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header  border-left-primary text-primary ">

                <h4 class="m-0 p-0 font-weight-bold ">
                    <i class="fas fa-edit m-0 p-0"></i>
                    แก้ไขชื่ออัลบั้ม
                </h4>
            </div>

            <div class="modal-body">
                <div class="form-group col-md-12">
                    <label for="" class="text-primary"> <label for="">ชื่ออัลบั้ม</label>
                    </label>
                    <input type="hidden" name="old_name" id="old_name" />
                    <input type="text" name="folder_name" id="efolder_name" class="form-control"
                        placeholder="กรุณากรอกชื่ออัลบั้ม" />
                </div>
                <div class="form-group col-md-12">
                    <div class="form-group">
                        <label>รายละเอียดอัลบั้ม</label>

                        <textarea class="form-control" id="ed_gallary" type="text" name="ed_gallary" rows="3"
                            placeholder="กรุณากรอกรายละเอียดอัลบั้ม"></textarea>
                    </div>
                </div>

                <input type="hidden" name="eid" id="eid" />
                <button type="submit" name="eg_update" id="eg_update" class="btn-submit"
                    value="Create">เรียบร้อย</button>

            </div>


        </div>
    </div>



</div>






<scrip src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
    </script>

    <script>
    $(document).ready(function() {
        if (window.File && window.FileList && window.FileReader) {
            $("#filephotos").on("change", function(e) {
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                        var file = e.target;
                        $("<div class=\"img-thumb-wrapper card shadow m-2 \">" +
                            "<img class=\"img-thumb\" src=\"" + e.target.result +
                            "\" title=\"" + file.name + "\"/>" +
                            "<br/><span class=\"remove\">ลบ</span>" +
                            "</div>").insertAfter("#preview");
                        $(".remove").click(function() {
                            $(this).parent(".img-thumb-wrapper").remove();
                        });

                    });
                    fileReader.readAsDataURL(f);
                }
            });
        } else {
            alert("Your browser doesn't support to File API")
        }
    });
    </script>