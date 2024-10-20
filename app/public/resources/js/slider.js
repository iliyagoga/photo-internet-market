let leftThrow = document.querySelector('.left_thr')
let rightThrow = document.querySelector('.right_thr')

let slider= document.querySelector('.slider .line')
let c=0
const width = document.querySelector('.b').clientWidth
const widthSlider= document.querySelector('.line').clientWidth
rightThrow.addEventListener('click',(e)=>{
    if(c<widthSlider/width){
        if(Math.floor(widthSlider/width)==c){
            slider.style.left=-1*(widthSlider/width-c)+'px'
            c=0;
        }else{
            c++;
            slider.style.transitionDuration='.5s'
            slider.style.left=-1*width*c+'px'
            if(c==slider.children.length/3){
                slider.append(slider.children[0]);
            }
        }
      
    }

 
})
leftThrow.addEventListener('click',(e)=>{
    if(c>0){
        c--;
            slider.style.transitionDuration='.5s'
            slider.style.left=-1*width*c+'px'
    }
    

})
