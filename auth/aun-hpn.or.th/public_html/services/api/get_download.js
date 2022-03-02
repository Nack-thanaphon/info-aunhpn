var html, data;

$(document).ready(function() {
    download();
})

function download() {

    $.ajax({
        type: "GET",
        dataType: "json",
        url: "https://www.info-aun-hpn.com/api/get_download.php",
        data: {},
        success: function(data) {
            data = data.result;
            for (var i = 0; i < data.length; i++) {
                $fd = `
                <li class="card p-2 my-1 shadow-sm">
                <div class="row m-0 d-flex justify-content-between">
                <div class="col-4 text-center my-auto">
                    <a href="https://info-aun-hpn.com/bos/uploads/docs/${data[i].file}">
                        <button class="btn btn-success ">
                            <h1 class="fas fa-arrow-down"></h1>
                        </button>
                    </a>
                </div>
                <div class="col-8 p-0 m-0">
                    <p class="p-0 m-0">${data[i].name}</p>
                    <p class="badge badge-pill badge-success">${data[i].group}</p>
                </div>
            </div>    
            </li>    
       `
                $('#downloads').append($fd);
            };

        },
        error: function(err) {
            $('#downloads').html('-ไม่มีข่าวสาร-');
        }
    })

}