const ratingsForm = document.querySelector('#ratings').children

var ratingsArr = new Array();

for (el of ratingsForm) {
    ratingsArr.push(el.value)
}

console.log('ratingsArr: ', ratingsArr);

new Chart(document.querySelector('#ratingsChart'), {
    type: 'pie',
    data: {
        labels: ["1 star", "2 star", "3 star", "4 star", "5 star"],
        datasets: [
            {
                // borderColor: "rgba(196, 88, 80, 1)",
                backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                data: ratingsArr,
            },
        ],
    },
    options: {
        title: { display: false },
        animation: {
            duration: 750, // general animation time
        },
        hover: {
            animationDuration: 100, // duration of animations when hovering an item
        },
        responsiveAnimationDuration: 250, // animation duration after a resize
    },
});
