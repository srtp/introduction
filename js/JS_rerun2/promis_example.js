const lyricBox = document.querySelector('.lyric-box')

function lyricPromise(lyric) {
    return new Promise((resolve) => {
        setTimeout(() => {
            const lyricElement = document.createElement('h3')
            lyricElement.innerHTML = lyric;
            lyricBox.append(lyricElement)
            resolve();
        }, 3000);
    })
}

lyricPromise('นั่นๆๆ............')
.then(() =>{
    return lyricPromise('ในวันที่ฉันนั่งกินไก่อยู่กลางร้านนนนนนน')
})

.then (() => {
    return lyricPromise ('งงมากๆๆ งงๆๆ')
})

.then (() => {
    lyricPromise('เรื่องของคุณสิครับ')
})