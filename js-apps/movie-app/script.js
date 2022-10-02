const APIKEY = '6c147458a042d7ec288e88f63c986e4c';
const APIURL =  'https://api.themoviedb.org/3/movie/popular?api_key=6c147458a042d7ec288e88f63c986e4c';
const SEARCHAPI = 'https://api.themoviedb.org/3/search/movie?api_key=6c147458a042d7ec288e88f63c986e4c&query='

const IMGPATH = 'https://image.tmdb.org/t/p/w1280'

const main = document.querySelector('main');
const form = document.querySelector('#form');
const search = document.querySelector('.search');


// initially get movies by popular
getMovies(APIURL);

async function getMovies(url) {
    const resp = await fetch(url);
    const respData = await resp.json();
    console.log(respData);
    showMovies(respData);
   

}

function showMovies(movies) {
    //  clear main 
    main.innerHTML = '';
    movies.results.forEach((movie) => {
        const {poster_path, title, vote_average, overview} = movie;

        const movieEl = document.createElement('div');
        movieEl.classList.add('movie');

        console.log(IMGPATH + poster_path !== null);

        movieEl.innerHTML = `
            <img src="${IMGPATH + poster_path != null ? IMGPATH + poster_path : `https://via.placeholder.com/300x450`}" alt="">
            <div class="movie-info">
                <h3>${title}</h3>
                <span class="${getClassByRate(vote_average)}">${vote_average}</span>
            </div>
            <div class="overview">
            <h4>Overview:</h4>
            ${overview}</div>
            `;
        
        main.appendChild(movieEl);
        
    })
}


function getClassByRate(vote) {
    if(vote > 8) {
        return 'green';
    }else if(vote >= 5) {
        return 'orange';
    }else {
        return 'red';
    }
}



form.addEventListener('submit', (e) => {
    e.preventDefault();

    const searchTerm = search.value;

    if(searchTerm) {
        getMovies(SEARCHAPI + searchTerm)
        search.value = '';
    }
    
})