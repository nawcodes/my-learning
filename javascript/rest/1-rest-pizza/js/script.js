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

