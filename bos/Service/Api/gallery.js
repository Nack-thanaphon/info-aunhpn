$(function() { // เรียกใช้งาน datatable
    var action = "fetch";
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "../../Service/Gallery/create.php",
        data: {
            action: action
        },
    }).done(function(data) {

        let tableData = []
        data = data.result;
        for (var i = 0; i < data.length; i++) {
            tableData.push([

                `${data[i].name}`,
                `${data[i].total}`,
                `${data[i].size}`,
                `<button type="button" name="delete" data-name="${data[i].name}" class="delete btn btn-warning">update</button>`,
                `<button type="button" name="delete" data-name="${data[i].name}" class="delete btn btn-danger">Delete</button>`,
                `<button type="button" name="upload" data-name="${data[i].name}" class="upload btn btn-info">Upload File</button>`,
                `<button type="button" name="view_files" data-name="${data[i].name}" class="view_files btn btn-default">View Files</button>`,

            ]);
        };

        initDataTables(tableData);
    }).fail(function() {
        // Swal.fire({
        //     text: 'ไม่สามารถเรียกดูข้อมูลได้',
        //     icon: 'error',
        //     confirmButtonText: 'ตกลง',
        // }).then(function() {
        //     location.assign('./')
        // })
    })

    function initDataTables(tableData) { // สร้าง datatable
        $('#g_table').DataTable({
            data: tableData,
            columns: [

                {
                    title: "ชื่ออัลบั้ม",
                    className: "align-middle",

                },

                {
                    title: "จำนวนภาพ",
                    className: "align-middle",

                },

                {
                    title: "ขนาดอัลบั้ม",
                    className: "align-middle"
                },
                {
                    title: "อัพเดต",
                    className: "align-middle"
                },
                {
                    title: "ลบ",
                    className: "align-middle"
                },
                {
                    title: "อัพโหลด",
                    className: "align-middle"
                },
                {
                    title: "เรียกดู",
                    className: "align-middle"
                }
            ],
            initComplete: function() { // เรียกใช้งาน ลบข้อมูล datatable
                $(document).on('click', '#delete', function() {
                    let id = $(this).data('id')
                    Swal.fire({
                        text: "คุณแน่ใจหรือไม่...ที่จะลบรายการนี้?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'ใช่! ลบเลย',
                        cancelButtonText: 'ยกเลิก'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "../../Service/News/delete.php",

                                data: {
                                    id: id
                                }
                            }).done(function() {
                                Swal.fire({
                                    text: 'รายการของคุณถูกลบเรียบร้อย',
                                    icon: 'success',
                                    confirmButtonText: 'ตกลง',
                                }).then((result) => {
                                    location.reload();
                                });
                            })
                        }
                    })
                }).on('change', '.toggle-event', function() {
                    toastr.success('อัพเดทข้อมูลเสร็จเรียบร้อย')
                })
            },
            fnDrawCallback: function() {
                $('.toggle-event').bootstrapToggle();
            },
            responsive: {
                details: {

                    renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            },
            language: {
                "lengthMenu": "แสดงข้อมูล _MENU_ แถว",
                "zeroRecords": "ไม่พบข้อมูลที่ต้องการ",
                "info": "แสดงหน้า _PAGE_ จาก _PAGES_",
                "infoEmpty": "ไม่พบข้อมูลที่ต้องการ",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "search": 'ค้นหา',
                "paginate": {
                    "previous": "ก่อนหน้านี้",
                    "next": "หน้าต่อไป"
                }
            }
        })
    }
})




$(document).ready(function() {


    $(document).on('click', '#create_folder', function() {
        $('#action').val("create");
        $('#folder_name').val('');
        $('#folder_button').val('Create');
        $('#folderModal').modal('show');
        $('#old_name').val('');
        $('#change_title').text("Create Folder");
    });

    $(document).on('click', '#folder_button', function() {
        var folder_name = $('#folder_name').val();
        var old_name = $('#old_name').val();
        var action = $('#action').val();
        if (folder_name != '') {
            $.ajax({
                url: "../../Service/Gallery/create.php",


                method: "POST",
                data: {
                    folder_name: folder_name,
                    old_name: old_name,
                    action: action
                },
                success: function(data) {
                    $('#folderModal').modal('hide');
                    load_folder_list();
                    alert(data);
                }
            });
        } else {
            alert("Enter Folder Name");
        }
    });

    $(document).on("click", ".update", function() {
        var folder_name = $(this).data("name");
        $('#old_name').val(folder_name);
        $('#folder_name').val(folder_name);
        $('#action').val("change");
        $('#folderModal').modal("show");
        $('#folder_button').val('Update');
        $('#change_title').text("Change Folder Name");
    });

    $(document).on("click", ".delete", function() {
        var folder_name = $(this).data("name");
        var action = "delete";
        if (confirm("Are you sure you want to remove it?")) {
            $.ajax({
                url: "../../Service/Gallery/create.php",



                method: "POST",
                data: {
                    folder_name: folder_name,
                    action: action
                },
                success: function(data) {
                    load_folder_list();
                    alert(data);
                }
            });
        }
    });

    $(document).on('click', '.upload', function() {
        var folder_name = $(this).data("name");
        $('#hidden_folder_name').val(folder_name);
        $('#uploadModal').modal('show');
    });

    $('#upload_form').on('submit', function() {
        $.ajax({
            url: "../../Service/Gallery/upload.php",

            method: "POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                load_folder_list();
                alert(data);
            }
        });
    });

    $(document).on('click', '.view_files', function() {
        var folder_name = $(this).data("name");
        var action = "fetch_files";
        $.ajax({
            url: "../../Service/Gallery/create.php",


            method: "POST",
            data: {
                action: action,
                folder_name: folder_name
            },
            success: function(data) {
                $('#file_list').html(data);
                $('#filelistModal').modal('show');
            }
        });
    });

    $(document).on('click', '.remove_file', function() {
        var path = $(this).attr("id");
        var action = "remove_file";
        if (confirm("Are you sure you want to remove this file?")) {
            $.ajax({
                url: "../../Service/Gallery/create.php",


                method: "POST",
                data: {
                    path: path,
                    action: action
                },
                success: function(data) {
                    alert(data);
                    $('#filelistModal').modal('hide');
                    load_folder_list();
                }
            });
        }
    });

    $(document).on('blur', '.change_file_name', function() {
        var folder_name = $(this).data("folder_name");
        var old_file_name = $(this).data("file_name");
        var new_file_name = $(this).text();
        var action = "change_file_name";
        $.ajax({
            url: "../../Service/Gallery/create.php",


            method: "POST",
            data: {
                folder_name: folder_name,
                old_file_name: old_file_name,
                new_file_name: new_file_name,
                action: action
            },
            success: function(data) {
                alert(data);
            }
        });
    });

});