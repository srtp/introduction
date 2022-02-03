let imgIndex = 0
let imgLink = ['asset/rabbit.jpg','asset/panda.jpg','asset/bird.jpg']
let img = document.querySelector('.img')


const ButtonNext = () => {
    if (imgIndex < imgLink.length - 1){
        imgIndex++
        img.src =  imgLink[imgIndex]
    }
}

const ButtonPrev = () => {
    if (imgIndex > 0 ){
        imgIndex--
        img.src =  imgLink[imgIndex]
    }
}

const keyup = (event) => {
    if (event.key ==='ArrowLeft'){
        ButtonPrev();
    console.log(event.key);

}
    else if (event.key === 'ArrowRight'){
        ButtonNext();
    }
}
   

document.addEventListener('keyup',keyup)