const s=()=>{
    let prices=document.querySelectorAll('.price')

let counts=document.querySelectorAll('.counter span')

let num = document.querySelector('.total .num')
let total=0;
for( let i=0; i<prices.length; i++){
    total+=Number(counts[i].innerHTML)*Number(prices[i].innerHTML.split(' ')[0])
}

num.innerHTML = total+' '+num.innerHTML.split(' ')[1]
}