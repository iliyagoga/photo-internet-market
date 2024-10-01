let arrows = document.querySelectorAll('.history .arrow')
let products= document.querySelectorAll('.history .t-products')
for(let i=0; i<arrows.length;i++ ){
    arrows[i].addEventListener('click',function(e){
        e.target.classList.toggle('rotate')
        products[i].classList.toggle('hidden')
    })
        
    
}