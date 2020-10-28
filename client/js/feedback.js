function hover(num) {
    let stars = document.querySelectorAll('.fa-star')
    console.log('stars: ', stars[0].id);
    for (let i = 0; i < num; i++) {
        stars[i].style.backgroundColor = "red";
    }
}

function setRating(num) {
    console.log('num: ', num);
    const inputElement = document.querySelector('#rating')
    inputElement.value = num;
}