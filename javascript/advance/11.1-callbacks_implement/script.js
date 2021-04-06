$('.btn-search').on('click', function() {
    $.ajax({
        url: 'http://www.omdbapi.com/?apikey=93670083&s=' + $('.input-keyword').val(),
        
        
        // ketika success kirim data dari API
        // success adalah callback
        success: result  =>  {
            // console.log(result);
            const movies = result.Search;
            let cards = '';
            movies.forEach(m => {
                // modal cards
                cards += showCards(m);
    
            });
            //   lalu simpan cards ke kumpulan row   
            $('.movie-content').html(cards);      
            
            // ketika btn-modal show di klcik
            // Sebaiknya jangan pake arrow function karena arw fn tidak memiliki scope this
            // fn setelah click itu callback , event handler callback dan didalamnya ada success lagi yaitu callback , (callback hell)
            $('.btn-modal-show').on('click', function() {
                // console.log($(this).data('imdbid'));
                $.ajax( {
                    url: 'http://www.omdbapi.com/?apikey=93670083&i=' + $(this).data('imdbid'),
                    // moviee detail
                    success: m => {
                        const movieDet = showMovieDetail(m);
    
                    $('.modal-body').html(movieDet);
                    },
    
                    error: e => {
                        console.log(e.responseText);
                        
                    }
                    
                });
                
            });
            
    
                    
        },
        // ketika salah maka apa?
        error : (e) => {
            // console.log(e.responseText);
            
        }
    });
});





function showCards(m) {
 return `<div class="col-md-4 my-3">
 <div class="card" style="width: 18rem;">
     <img src="${m.Poster}" class="card-img-top" alt="...">
     <div class="card-body">
       <h5 class="card-title">${m.Title}</h5>
       <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
       <p class="card-text text-muted">${m.Year}</p>
       <button type="button" class="btn btn-primary btn-modal-show" data-bs-toggle="modal" data-bs-target="#movieDetailModal" data-imdbid="${m.imdbID}">Show Details</button>
     </div>
   </div>
</div>`
}


function showMovieDetail(m) {
    return `<div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="${m.Poster}" alt="" class="img-fluid">
                        </div>
                        <div class="col-md">
                          <ul class="list-group">
                              <li class="list-group-item"><h4>${m.Title}</h4></li>
                              <li class="list-group-item"><strong>Directors:</strong>${m.Director}</li>
                              <li class="list-group-item"><strong>Actors:</strong>${m.Actors}</li>
                              <li class="list-group-item"><strong>Writter:</strong>${m.Writter}</li>
                              <li class="list-group-item"><strong>Plot:</strong>${m.Plot}</li>
                            </ul>
                        </div>
                    </div>
                </div>`;
}