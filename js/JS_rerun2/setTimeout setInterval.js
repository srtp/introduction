let lyricArray = [
    'นั่งชิวอยู่ริมหาดทราย นั่งยิ้มเเล้วจากไป <br>ดันไปคิดถึงอยู่เเต่เขา ไอ้เราไม่อยากจะเหงา',
    'อยากโดนแทงแล้วไปโผล่โรงพยาบาล <br>เฮ้ย เฮ้ย อยากคลานไปงานบวช',
    'อยากหลับแล้วไม่ตื่นว่ะ <br>เฮ้ อยากหลับแล้วไม่ตื่นว่ะ',
    'ฉันจองทั้งโซนรอบตัว ทุกทีนั้นมีแค่เพียงเรา <br>และเธอบอกกับฉันอย่ากลัว ความกลัวนั้นเป็นแค่เพียงเงา',
    'จากคนนั้น จากคนนู้น เธอเอาของมาจากหลายคน <br>ฉันอดทน ที่ไม่พูด เรื่องราวที่แสนจะเขียวขจี อี้ อี'


]

let randomBtn = document.getElementById('random')
let randomStop = document.getElementById('random-stop')
let output = document.getElementById('output')

let timeoutId = 0

randomBtn.addEventListener('click' , () => {
    // setTimeout(() => {
    // let n = lyricArray.length
    // let index =Math.floor(Math.random() * n)
    // let lyric = lyricArray[index]
    // output.innerHTML = lyric
    // }, 3000); 
    timeoutId = setInterval(() => {
        let n = lyricArray.length
        let index =Math.floor(Math.random() * n)
        let lyric = lyricArray[index]
        output.innerHTML = lyric
        }, 3000); 
    
})

randomStop.addEventListener('click',()=>{
    clearInterval(timeoutId)
})