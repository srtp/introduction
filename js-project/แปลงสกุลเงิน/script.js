const currency_one = document.getElementById('currency-one')
const currency_two = document.getElementById('currency-two')

const amount_one = document.getElementById('amount-one')
const amount_two = document.getElementById('amount-two')

const rateText=document.getElementById('rate')
const swap = document.getElementById('btn')

currency_one.addEventListener('change',calculateMoney) 
currency_two.addEventListener('change',calculateMoney)
amount_one.addEventListener('input',calculateMoney)
amount_two.addEventListener('input',calculateMoney)

function calculateMoney(){
    const one=currency_one.value
    const two = currency_two.value
    let url = `https://v6.exchangerate-api.com/v6/45fcf2954b3c9aba3740906a/latest/${one}`
    fetch(url)
    .then(res=>res.json()).then(data=>{
        const rate=data.conversion_rates[two]
        rateText.innerText=`1 ${one} = ${rate} ${two}`
        amount_two.value =(amount_one.value*rate).toFixed(2)
    })
    // console.log("ลิ้ง = ",url);
    // console.log("สกุลเงินต้นทาง =",one);
    // console.log("สกุลเงินปลายทาง =",two);
}

swap.addEventListener('click',()=>{
    //  USD => THB || THB => USD
    // TEMP => USD || TWO = TEMP (USD)
    const temp = currency_one.value // ต้นทาง
    currency_one.value=currency_two.value
    currency_two.value = temp
    calculateMoney();
})

calculateMoney()

