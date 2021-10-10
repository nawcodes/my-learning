const mealsEl = document.getElementById('meals');

const favoriteContainer = document.getElementById('fav-meals')



async function getRandomMeal() {
    const resp = await fetch("https://www.themealdb.com/api/json/v1/1/random.php");

    const respData = await resp.json();
    const randomMeal = respData.meals[0];

    addMeal(randomMeal, true);
}

getRandomMeal();
fetchFavMeals();


async function getMealById(id) {
    const resp = await fetch('https://www.themealdb.com/api/json/v1/1/lookup.php?i=' + id);
    const respData = await resp.json();

    const meal = respData.meals[0];
    return meal;
}

async function getMealsBySearch(input) {
    const meals = await fetch('https://www.themealdb.com/api/json/v1/1/search.php?s=' + input);
}


function addMeal(mealData, random = false) {
    const meal = document.createElement('div');

    meal.innerHTML = `
    <div class="meal">
        <div class="meal-header">
        ${random ? `<span class="random">
        Random Recipe
        </span>` : ''}
            <img src="${mealData.strMealThumb}" alt="${mealData.strMeal}">
        </div>
        <div class="meal-body">
            <h4>${mealData.strMeal}</h4>
             <button class="fav-btn">
            <i class="fas fa-heart"></i>
            </button>
        </div>  
    </div>`;

    const btn = meal.querySelector('.meal-body .fav-btn');

    btn.addEventListener('click', () => {
        if(btn.classList.contains('active')) {
            removeMealLS(mealData.idMeal);
            btn.classList.remove('active');

        }else {
            addMealLS(mealData.idMeal);
            btn.classList.toggle('active');
        }

        fetchFavMeals();

    });

    mealsEl.appendChild(meal);
}


function addMealLS(mealId) {
    const mealIds = getMealLS();
    localStorage.setItem('mealIds', JSON.stringify(
        [...mealIds, mealId]
    ));

}


function removeMealLS(mealId) {
    const mealIds = getMealLS();
    localStorage.setItem('mealIds', JSON.stringify(
        mealIds.filter((id) => id !== mealId))
    );
}

function getMealLS() {
    const mealIds = JSON.parse(localStorage.getItem("mealIds"));

    return mealIds === null ? [] : mealIds;

}


// when a function have been relating async , set a next function with the async
async function fetchFavMeals() {
    favoriteContainer.innerHTML = '';
    const mealIds = getMealLS();

    // const meals = [];

    for (let i = 0; i < mealIds.length; i++) {
        const mealId = mealIds[i];
        meal = await getMealById(mealId);

        // meals.push(meal)

        addMealtoFav(meal);
        
    }



}


function addMealtoFav(mealData) {
    const favMeal = document.createElement('li');

    favMeal.innerHTML = `
                    <img src="${mealData.strMealThumb}" alt="${mealData.strMeal}">
                    <span>${mealData.strMeal}</span>
                    <button class="clear"><i class="fa fa-window-close"></i></button>  
                    `;   

    const btn = favMeal.querySelector('button');
    btn.addEventListener('click', () => {
        removeMealLS(mealData.idMeal);
        fetchFavMeals();
    });


    favoriteContainer.appendChild(favMeal);
}

