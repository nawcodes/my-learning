// get JSONData
$.getJSON('data/pizza.json', function(result) {
    // get menu 
    let menu = result.menu;
    $.each(menu, function (key , val) {
        $('#menu-list').append(
        `<div class="col-md-4">
            <div class="card mb-3">
                <img src="img/menu/${val.gambar}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">${val.nama}</h5>
                    <p class="card-text">${val.deskripsi}</p>
                    <h5>Rp. ${val.harga},-</h5>
                    <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                </div>
            </div>
        </div>`
        );
    });
});


// when LI clicked
$('.nav-link').on('click', function () {
    $('.nav-link').removeClass('active'); 
    $(this).addClass('active');
    
    let category = $(this).html();
    $('h1').html(category);
    
    $.getJSON('data/pizza.json', function(result) {
        let menu = result.menu;
        let content = '';

        $.each(menu, function (i, val) {
            if(val.kategori == category.toLowerCase()) {
                content += `<div class="col-md-4">
                <div class="card mb-3">
                    <img src="img/menu/${val.gambar}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">${val.nama}</h5>
                        <p class="card-text">${val.deskripsi}</p>
                        <h5>Rp. ${val.harga},-</h5>
                        <a href="#" class="btn btn-primary">Pesan Sekarang</a>
                    </div>
                </div>
            </div>`;
            $('#menu-list').html(content);
            }
        })
    });


});
