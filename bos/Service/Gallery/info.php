<body class="hold-transition sidebar-mini">
    <div class="container-fluid ">
        <div class="row ">
            <div class="col-12 col-md-8 p-0 m-0 mx-auto ">
                <div class="col-12">
                    <div class="card mb-4">
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
                                <div class="form-group col-md-12">
                                    <label for="" class="text-primary"> <label for="">ชื่ออัลบั้ม</label>
                                    </label>
                                    <input type="text" class="form-control" name="n_gallary" id="n_gallary"
                                        placeholder="กรุณากรอกชื่ออัลบั้ม" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="form-group">
                                        <label for="n_name" id="text_header"
                                            class="text-primary">รายละเอียดอัลบั้ม</label>

                                        <textarea class="form-control" id="d_gallary" type="text" name="d_gallary"
                                            rows="3" placeholder="กรุณากรอกรายละเอียดอัลบั้ม"></textarea>
                                    </div>
                                </div>

                                <div class="col" id="middle_line">
                                    <p class="text-primary"><span>กรุณาอัพโหลดภาพ</span></p>

                                </div>

                                <div class="form-group col-md-12">
                                    <div class="custom-form-group">
                                        <div class="custom-file-drop-area ">
                                            <form action="" method="" enctype="multipart/for-data">
                                                <label for="filephotos">วางไฟล์ลงตรงนี้</label>
                                                <input class="form-control" type="file" id="filephotos" name="files[]"
                                                    multiple />
                                            </form>
                                        </div>
                                        <div class="row m-0 p-0 ">
                                            <div id="preview" class="col-12 p-0 ">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button id="submit" value='Upload' type="submit"
                                    class="btn-submit">อัพโหลดรูปภาพ</button>

                            </div>
                        </div>


                    </div>

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