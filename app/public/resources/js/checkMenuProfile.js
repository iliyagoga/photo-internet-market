let elemsMenu=document.querySelectorAll('.left-menu div')
let partsProfile=document.querySelectorAll('.fields .field')
for(let i=0;i<elemsMenu.length;i++){
    elemsMenu[i].addEventListener('click',(e)=>{
        if(!elemsMenu[i].classList.contains('active')){
            for(let y of elemsMenu){
                y.classList.remove('active')
            }
            elemsMenu[i].classList.add('active')
            for(let y of partsProfile){
                y.classList.add('hidden')
            }
            partsProfile[i].classList.remove('hidden')
        }
    })
}