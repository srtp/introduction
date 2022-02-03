// Change img

let thumbnailImg =  document.querySelectorAll('.thumbnail-img')
let bigImg = document.querySelector('.big-img')


let changeImg = (event) => {
    bigImg.src = event.target.src
}

let removeImg = () => {
    bigImg.src = ''
}

thumbnailImg.forEach ((thumnail)=>{
    thumnail.addEventListener('mouseout',removeImg)
    thumnail.addEventListener('mouseover',changeImg)
})