function hover(num) {
    let stars = document.querySelectorAll('.fa-star')
    console.log('stars: ', stars[0].id);
    for (let i = 0; i < 5; i++) {
        stars[i].style.color = "#aaaaaa";
    }
    for (let i = 0; i < num; i++) {
        stars[i].style.color = "yellow";
    }
}

function setRating(num) {
    const inputElement = document.querySelector('#rating')
    inputElement.value = num;
}