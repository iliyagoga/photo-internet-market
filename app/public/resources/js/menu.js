let icon = document.querySelector('.burger');
let menu = document.querySelector('.list-menu');
document.addEventListener('click',(e)=>{
    if(e.target== icon){
        menu.classList.toggle('hidden')
    }else{
        if(menu.contains(e.target)===false){
            menu.classList.add('hidden')
        }
    }
  
})
