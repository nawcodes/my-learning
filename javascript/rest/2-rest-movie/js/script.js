$('#search-button').on('click' , function() {
      searchMovies();
});


$('#search-input').on('keyup', function(event) {
    if(event.keyCode === 13) {
        searchMovies();
    }
})


function searchMovies() {
    $('#movie-list').html('');
    $.ajax(
        {
            url: 'http://www.omdbapi.com/',
            type: 'GET',
            dateType: 'json',
            data: {
               'apikey': 93670083,
               's' : $('#search-input').val(),
            },
            success: function (result) {
                if( result.Response == "True") {
                   let movies = result.Search;
                   $.each(movies, function(i, key) {
                       
                       $('#movie-list').append(`
                           <div class="col-md-4">
                           <div class="card mb-3">
                           <img src="${key.Poster}" class="card-img-top" alt="">
                           <div class="card-body">
                           <h5 class="card-title">${key.Title}</h5>
                           <p class="card-subtitle">${key.Years}</p>
                           <a href="" class="btn btn-primary">Detail</a>
                           </div>
                           </div>
                           </div>  
                       `);
                       
                       $('#search-input').val('');
                   });
               } else {
                    $('#movie-list').html(`<h1 class="text-center"> ${result.Error} </h1>`);
                }
            }
        }
       )
}

