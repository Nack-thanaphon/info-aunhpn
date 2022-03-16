$(function() { // เรียกใช้งาน datatable
    var action = "fetch";
    $.ajax({
        type: "POST",
        dataType: "JSON",
        url: "../../services/Gallery/create.php",
        data: {
            action: action
        },
    }).done(function(data) {
        let tableData = []
        data = data.result;
        for (var i = 0; i < data.length; i++) {
            tableData.push([
                `${data[i].id}`,
                `${data[i].name}`,
                `${data[i].total}`,
                `${data[i].size}`,
                `<div class="btn-group" role="group">
                <button type="button" name="update"  data-id="${data[i].id}" data-name="${data[i].name}"  class="update btn btn-warning "><p class="m-0 p-0 font-weight-bold ">
                <i class="fas fa-pen m-0 p-0"></i>
                </p></button>
                <button type="button" name="delete"  data-id="${data[i].id}" data-name="${data[i].name}" class="delete btn btn-danger"><p class="m-0 p-0 font-weight-bold ">
                <i class="fas fa-trash m-0 p-0"></i>
                </p></button>
                </div>`,

                `<div class="btn-group mx-auto  " role="group">
                <button type="button" name="upload" data-id="${data[i].id}" data-name="${data[i].name}" class="upload btn btn-primary"><p class="m-auto p-0 font-weight-bold ">
                <i class="fas fa-upload m-0 p-0"></i>
                </p></button> 
                <button type="button" name="view_files" data-id="${data[i].id}" data-name="${data[i].name}" class="view_files btn btn-success "><p class="m-0 p-0 font-weight-bold ">
                <i class="fas fa-eye"></i>
                </p></button>
                </div>`,
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
            columns: [{
                    title: "ลำดับที่",
                    className: "align-middle",

                },
                {
                    title: "ชื่ออัลบั้ม",
                    className: "align-middle",
                    width: "40%"

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
                    title: "จัดการ",
                    className: "align-middle"
                },

                {
                    title: "อัพโหลด | เรียกดู",
                    className: "align-middle"
                },
            ],


            initComplete: function() { // เรียกใช้งาน ลบข้อมูล datatable
                // $(document).on('click', '.delete', function() {
                //     let id = $(this).data('id')
                //     var folder_name = $(this).data("name");
                //     var action = "delete";
                //     Swal.fire({
                //         text: "คุณแน่ใจหรือไม่...ที่จะลบรายการนี้?",
                //         icon: 'warning',
                //         showCancelButton: true,
                //         confirmButtonColor: '#3085d6',
                //         cancelButtonColor: '#d33',
                //         confirmButtonText: 'ใช่! ลบเลย',
                //         cancelButtonText: 'ยกเลิก'
                //     }).then((result) => {
                //         if (result.isConfirmed) {
                //             $.ajax({
                //                 type: "POST",
                //                 url: "../../services/Gallery/delete.php",

                //                 data: {
                //                     id: id,
                //                     folder_name: folder_name,
                //                     action: action
                //                 }
                //             }).done(function() {
                //                 Swal.fire({
                //                     text: 'รายการของคุณถูกลบเรียบร้อย',
                //                     icon: 'success',
                //                     confirmButtonText: 'ตกลง',
                //                 }).then((result) => {
                //                     location.reload();
                //                 });
                //             })
                //         }
                //     })
                // }).on('change', '.toggle-event', function() {
                //     toastr.success('อัพเดทข้อมูลเสร็จเรียบร้อย')
                // })
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

    $(document).on('click', '#c_gallery', function() {
        var folder_name = $('#folder_name').val();
        var g_detail = $('#d_gallary').val();
        var old_name = $('#old_name').val();
        var action = "create";

        if (folder_name != '') {
            $.ajax({
                url: "../../services/Gallery/create.php",
                method: "POST",
                data: {
                    folder_name: folder_name,
                    gd_name: g_detail,
                    old_name: old_name,
                    action: action
                },
                success: function(data) {

                    alert(data);
                }
            });
        } else {
            alert("Enter Folder Name");
        }
    });



    $(document).on("click", ".update", function() {
        let id = $(this).data('id');

        $.ajax({
            url: "../../services/Gallery/update.php",
            method: "GET",
            data: {
                id: id
            },
            dataType: "json",
            success: function(data) {
                $('#eid').val(data[0].g_id);
                $('#old_name').val(data[0].g_name);
                $('#efolder_name').val(data[0].g_name);
                $('#ed_gallary').val(data[0].g_detail);
                $('#gedit_name').modal("show");

            }
        });
    });

    $('#eg_update').on('click', function(e) { // เรียกใช้งาน [บันทึกข้อมูลแก้ไข] (สำคัญ)

        e.preventDefault();
        $.ajax({
            type: "POST",
            dataType: "JSON",
            url: "../../services/Gallery/update.php",
            data: {

                id: $('#eid').val(),
                eold_name: $('#old_name').val(),
                efolder_name: $('#efolder_name').val(),
                ed_gallary: $('#ed_gallary').val()
            },
            success: function(response) {
                Swal.fire({
                    text: 'อัพเดตข้อมูลเรียบร้อย',
                    icon: 'success',
                    confirmButtonText: 'ตกลง',
                }).then((result) => {
                    // location.assign('./news.php');
                });
                // console.log("good", response);

            },
            error: function(err) {
                // console.log("bad", err);
            }
        })

    })




    $(document).on('click', '.upload', function() {
        var folder_name = $(this).data("name");
        let id = $(this).data('id')
        $('#hidden_folder_name').val(folder_name);
        $('#uploadModal').modal('show');
        $('#g_id').val(id);

    });




    $('#submit').on('click', function() {

        var form_data = new FormData();

        let id = $('#g_id').val();
        let folder = $('#hidden_folder_name').val();
        var totalfiles = document.getElementById('files').files.length;
        form_data.append("id", id)
        form_data.append("folder", folder)

        // Read selected files
        for (var index = 0; index < totalfiles; index++) {
            form_data.append("files[]", document.getElementById('files').files[index]);
        }
        $.ajax({
            url: "../../services/Gallery/upload.php",
            type: 'POST',
            data: form_data,
            id,
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                alert(response);
            }
        });
    });



    $(document).on("click", ".view_files", function() {
        let id = $(this).data('id');

        $.ajax({
            url: "../../services/Gallery/image_update.php",
            method: "GET",
            data: {
                id: id,
            },
            dataType: "json",
            success: function(response) {

                let html = '';

                data = response.result;

                for (var i = 0; i < data.length; i++) {
                    html += `
                     <tr>
                        <td>${data[i].id}</td>
                        <td><img src="../../services/Gallery/${data[i].image}" class="img-thumbnail" height="50" width="50" /></td>
                        <td>${data[i].name}</td>
                        
                        <td><button name="remove_file" class="remove_file btn btn-danger" data-id="${data[i].id}" id="../../services/Gallery/${data[i].image}">  
                            <p class="m-0 p-0 font-weight-bold ">
                            <i class="fas fa-trash m-0 p-0"></i>
                            </p>
                        </button>
                        </td>
                    </tr> 
                    `
                }
                $('#tbody').html(html);
                $('#filelistModal').modal('show');

            },
            error: function(err) {
                // console.log("bad", err);
            }
        })
    })





    $(document).on('click', '.remove_file', function() {
        let id = $(this).data('id');
        var path = $(this).attr("id");
        var action = "remove_file";

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
                    url: "../../services/Gallery/delete.php",
                    method: "POST",
                    data: {
                        id: id,
                        path: path,
                        action: action
                    },
                    success: function(data) {
                        alert(data);
                        $('#filelistModal').modal('hide');
                        // load_folder_list();
                    }
                });
            }

        });
    });



    $(document).on('click', '.delete', function() {
        let id = $(this).data('id');
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
                    url: "../../services/Gallery/status.php",
                    method: "POST",
                    data: {
                        id: id,
                    },
                    success: function(data) {
                        alert(data);
                        // $('#filelistModal').modal('hide');
                        // load_folder_list();
                    }
                });
            }

        });
    });




})