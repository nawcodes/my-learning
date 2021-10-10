$('#search-button').on('click' , function() {
      searchMovies();
});


$('#search-input').on('keyup', function(event) {
    if(event.keyCode === 13) {
        searchMovies();
    }
})


$('#movie-list').on('click', '#btn-detail',  function () {
    $.ajax( 
        {
            url:'http://www.omdbapi.com/',
            dataType: 'json',
            data: {
                'apikey': 93670083,
                'i' : $(this).data('id'),
            },
            success: function(result) {
                console.log(result);
                if(result.Response === "True") {
                    $('.modal-body').html(
                        `<div class="container-fluid">
                        <div class="row">
                          <div class="col-md-4">
                              <img src="${result.Poster}" alt="" class="img-thumbnail">
                          </div>
                          <div class="col-md-8">
                            <ul class="list-group">
                              <li class="list-group-item">Title : ${result.Title}</li>
                              <li class="list-group-item">${result.Year}</li>
                              <li class="list-group-item">${result.Actors}</li>
                              <li class="list-group-item">${result.Released}</li>
                              <li class="list-group-item">${result.Plot}</li>
                              <li class="list-group-item">${result.Genre}</li>
                            </ul>
                          </div>
                        </div>
                      </div>`
                    )
                }
            }
        }
    )
});


function searchMovies() {
    $('#movie-list').html('');
    $.ajax(
        {
            url: 'http://www.omdbapi.com/',
            type: 'GET',
            dataType: 'json',
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
                           <p class="card-subtitle">${key.Year}</p>
                           <button type="button" id="btn-detail" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="${key.imdbID}">
                            Detail
                           </button>
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

