<?php
include "../../../bos/Function/function.php"

?>

<body class="hold-transition sidebar-mini">
    <div class="container-fluid">
        <div class="row mx-auto ">
            <div class="col-12 p-0 m-0">
                <div class="col-12">
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
                                    <button type="button" name="create_folder" id="create_folder"
                                        class="btn btn-success" data-target="#exampleModal"
                                        data-toggle="modal">+เพิ่มอัลบั้ม </button>
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
                    <div class="col-12 col-md-4 pb-3 m-0">
                        <div class="card">
                            <div class="card-header border-left-primary   ">
                                <b>
                                    <i class="fas fa-rss-square p-0"></i>
                                    จำนวนภาพทั้งหมด
                                </b>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h1 class="p-0 text-right" style="font-size: 3.5rem;">
                                            <?php echo  total_banner_online($conn) ?>
                                        </h1>
                                    </div>
                                    <div class="col-4">
                                        <p class="p-0 m-0 text-right">/ ไฟล์</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 pb-3 m-0">
                        <div class="card">
                            <div class="card-header border-left-primary   ">
                                <b>
                                    <i class="fas fa-rss-square p-0"></i>
                                    ถังขยะ
                                </b>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h1 class="p-0 text-right" style="font-size: 3.5rem;">
                                            <?php echo  total_banner_online($conn) ?>
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

        <!-- <div class="card mb-4">
            <div class="card-header  border-left-primary text-primary ">
                <div class="row mx-auto">
                    <div class="col-6 p-0 ">
                        <h4 class="m-0 p-0 font-weight-bold ">
                            <i class="fas fa-rss-square m-0 p-0"></i>
                            สร้างอัลบั้มรูปภาพ
                        </h4>
                    </div>
                    <div class="col-6 text-right">
                        <a href="./gallery.php" class="btn btn-danger text-white">กลับ</a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card-body">


                    <div class="col" id="middle_line">
                        <p class="text-primary"><span>กรุณาอัพโหลดภาพ</span></p>

                    </div>

                    <div class="form-group col-md-12">
                        <div class="custom-form-group">
                            <div class="custom-file-drop-area ">
                                <form action="" method="" enctype="multipart/for-data">
                                    <label for="filephotos">วางไฟล์ลงตรงนี้</label>
                                    <input class="form-control" type="file" id="filephotos" name="files[]" multiple />
                                </form>
                            </div>
                            <div class="row m-0 p-0 ">
                                <div id="preview" class="col-12 p-0 ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button id="submit" value='Upload' type="submit" class="btn-submit">อัพโหลดรูปภาพ</button>

                </div>
            </div>


        </div> -->

    </div>


    </div>
    <div id="uploadModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Upload File</h4>
                </div>
                <div class="modal-body">
                    <form method="post" id="upload_form" enctype='multipart/form-data'>
                        <p>Select Image
                            <input type="file" name="upload_file" />
                        </p>
                        <br />
                        <input type="hidden" name="hidden_folder_name" id="hidden_folder_name" />
                        <input type="submit" name="upload_button" class="btn btn-info" value="Upload" />
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="filelistModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">File List</h4>
                </div>
                <div class="modal-body" id="file_list">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
                    console.log(files);
                });
            } else {
                alert("Your browser doesn't support to File API")
            }
        });

        $(document).ready(function() {

            $('#submit').click(function() {

                var form_data = new FormData();

                // Read selected files
                var totalfiles = document.getElementById('filephotos').files.length;
                for (var index = 0; index < totalfiles; index++) {
                    form_data.append("files[]", document.getElementById('filephotos').files[index]);
                }

                // AJAX request
                $.ajax({
                    url: '../../Service/Gallery/create.php',
                    type: 'post',
                    data: form_data,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        console.log(response)
                    }
                });

            });

        });
        </script>
</body>
</body>