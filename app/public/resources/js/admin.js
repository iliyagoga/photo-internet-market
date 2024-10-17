document.querySelector('.add').addEventListener('click',(e)=>{
    document.querySelector('.modal').classList.toggle('hidden')
})
for(let elem of document.querySelector('.modal').children){
    const ttt= (e)=>{
        let c=0;
        for(let t of document.querySelectorAll('.table .title')){
            console.log(elem.getAttribute('id'),t.getAttribute('id'))
            if(elem.getAttribute('id')==t.getAttribute('id')){
                c++
            }
        }
        if(c==0){
            document.querySelector('.table').appendChild(elem)
            elem.removeEventListener('click',ttt)
        }
    }
    elem.addEventListener('click',ttt)
}

