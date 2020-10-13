showButton = (el) => {
    let btn = document.querySelector(`#btn-${el.className}`)
    btn.style.opacity = '1'
}
hideButton = (el) => {
    let btn = document.querySelector(`#btn-${el.className}`)
    btn.style.opacity = '0'
}
