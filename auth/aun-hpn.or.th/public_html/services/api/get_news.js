var html, data;
$(document).ready(function() {
    newsrender();
})

function newsrender() {

    $.ajax({
        type: "GET",
        dataType: "json",
        url: "https://www.info-aun-hpn.com/api/get_news.php",
        data: {},
        success: function(data) {
            data = data.result;
            for (var i = 0; i < data.length; i++) {
                $news = `
            <div class="col-12 col-md-4 p-0 m-0 my-1 ">
            <a href="./single_news.php?id=${data[i].id}" data-id="${data[i].id}" id="singlenews"
                class="btn col-12 p-0 m-0 ">
                
                <div class="card shadow-md" >
                <img class="card-img-top p-0 m-0" src="https://info-aun-hpn.com/bos/${data[i].image}"alt="${data[i].name}">
               
                <div class="card-body p-0 py-2">
                <p class="badge badge-pill badge-primary">${data[i].date}</p>
                    <br>
                  <p class="card-title p-2 news">${data[i].name}</p>

                  </div>
                  </div>
                  </a>
            </div>           
       `
                $('#news').append($news);
            };

        },
        error: function(err) {

            $('#news').html('-ไม่มีข่าวสาร-');
        }
    })

}