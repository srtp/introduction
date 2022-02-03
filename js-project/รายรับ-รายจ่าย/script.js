const balance = document.getElementById('balance')
const moneyPlus = document.getElementById('money-plus')
const moneyMinus = document.getElementById('money-minus')
const list = document.getElementById('list')
const form = document.getElementById('form')
const name = document.getElementById('input-name')
const money = document.getElementById('input-money')
let errorMessage = document.querySelector('.error-message')



let transactions = []

function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
  }

function init(){
    list.innerHTML =''
    transactions.forEach(addTransaction)
    calculateMoney()
    
}

function addTransaction(transactions){
    const symbol = transactions.money < 0 ? '-' : '+'
    // const status =  transactions.money <0 ? 'minus' : 'plus'
    // item.classList.add(status)
    // console.log(transactions);
    resultFormat = formatNumber(Math.abs(transactions.money))
    const item = document.createElement('li')
    item.innerHTML = `${transactions.name}<span>${symbol}${resultFormat}
    </span><button class="btn btn-sm btn-danger" onclick="removeTransaction(${transactions.id})">x</button>`
    // item.innerHTML = 'ค่าซ่อมรถ <span> -฿400 </span> <button class="btn btn-danger btn-sm">x</button>';
    list.appendChild(item)
}

function calculateMoney (){
    const moneys =  transactions.map(transactions=>transactions.money)
    // total +++ 
   const total = moneys.reduce((result,item) =>(result+=item),0).toFixed(2)
    // Plus
    const income = moneys.filter(item =>item>0).reduce((result,item) =>(result+=item),0).toFixed(2)
    // Minus

    const payout = (moneys.filter(item => item < 0).reduce((result,item) =>(result+=item),0)*-1).toFixed(2)

    // Display bra bra
    balance.innerText = `฿`+formatNumber(total)
    moneyPlus.innerText = `฿`+formatNumber(income)
    moneyMinus.innerText =  `฿`+formatNumber(payout)

}
function genID (){
    return Math.floor(Math.random()*10000)
}
function diaryTransaction(e){
    e.preventDefault();
    if(name.value.trim() === '' || money.value.trim() === ''){
        errorMessage.style.display = 'block'
        
    }else{
        const data={
            id:genID(),
            name:name.value,
            money:+money.value
        }
        
        transactions.push(data);
        addTransaction(data);
        calculateMoney();
        name.value='';
        money.value='';
        errorMessage.style.display = 'none'
    }
}

function removeTransaction(id){
   transactions=transactions.filter(transactions=>transactions.id !==id)
   init();
}

form.addEventListener('submit',diaryTransaction);
init()
