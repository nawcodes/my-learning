

// fetch

    // ambil tombol
const searchButton = document.querySelector('.btn-search');

searchButton.addEventListener('click', async function() {
    try {
    const inputKeyword = document.querySelector('.input-keyword');
    const movies = await getMovies(inputKeyword.value);
    updateUI(movies);
    } catch(err) {
        alert(err);
    }
});


function getMovies(keyword) {
    return fetch('http://www.omdbapi.com/?apikey=93670083&s=' + keyword) 
    .then(response => {
        // console.log(response);
        if(!response.ok) {
            throw new Error(response.statusText);
        }
        return response.json();
    })
    .then(response => {
        if(response.Response === "False"); {
            throw new Error(response.Error);
        }
        return response.Search;
    });
}

function updateUI(movies) {
    let cards = '';
    movies.forEach(m => cards+= showCards(m) );
    const movieContainer = document.querySelector('.movie-content');
    movieContainer.innerHTML = cards;
}

// event binding
document.addEventListener('click', async function(e) {
    if(e.target.classList.contains('btn-modal-show')){
       const imdbid = e.target.dataset.imdbid;
       const movieDetail = await getMovieDetail(imdbid);
       updateUIDetail(movieDetail);
    }
})


function getMovieDetail(imdbid) {
    return fetch('http://www.omdbapi.com/?apikey=93670083&i=' + imdbid) 
    .then(response => response.json())
    .then(response => response);
}

function updateUIDetail(m) {
    const movieDetail = showMovieDetail(m);
    const modalBody = document.querySelector('.modal-body');
    modalBody.innerHTML = movieDetail;
}







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