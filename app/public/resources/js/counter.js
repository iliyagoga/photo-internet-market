let input=document.querySelectorAll('.counter input')

let span=document.querySelectorAll('.counter span')

let minus=document.querySelectorAll('.counter .minus')

let plus=document.querySelectorAll('.counter .plus')

let price=document.querySelectorAll('table .price')

let summ=document.querySelectorAll('.summ')
s()
for(let i=0;i<span.length;i++){
    minus[i].addEventListener('click',(e)=>{
        if(span[i].innerHTML>1){
            span[i].innerHTML=Number(span[i].innerHTML)-1
            input[i].value=Number(input[i].value)-1
            summ[i].innerHTML=Number(price[i].innerHTML.split(' ')[0])*Number(span[i].innerHTML)+' '+price[i].innerHTML.split(' ')[1]
            s()
        }
    })
    
    plus[i].addEventListener('click',(e)=>{
        span[i].innerHTML=Number(span[i].innerHTML)+1
        input[i].value=Number(input[i].value)+1
        summ[i].innerHTML=Number(price[i].innerHTML.split(' ')[0])*Number(span[i].innerHTML)+' '+price[i].innerHTML.split(' ')[1]
        s()
    })
}
