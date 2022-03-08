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
                                        class="btn btn-success">+เพิ่มอัลบั้ม </button>
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




    <div id="folderModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><span id="change_title">Create Folder</span></h4>
                </div>
                <div class="modal-body">
                    <p>Enter Folder Name
                        <input type="text" name="folder_name" id="folder_name" class="form-control" />
                    </p>
                    <br />
                    <input type="hidden" name="action" id="action" />
                    <input type="hidden" name="old_name" id="old_name" />
                    <input type="button" name="folder_button" id="folder_button" class="btn btn-info" value="Create" />

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
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


</body>