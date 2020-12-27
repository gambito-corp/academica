let slider_index = 0;
show_slide(slider_index);
//esto lo extraigo
function show_slide(index){
    let slides = document.querySelectorAll('.slide');
    let dots = document.querySelectorAll('.dot-nav');
    //reset del slide
    if (index >= slides.length) slider_index = 0;
    if (index < 0) slider_index = slides.length - 1;
    //hago funcionar el slide
    for(let i=0 ; i<slides.length; i++){
        slides[i].style.display = 'none';
        dots[i].classList.remove('active-dot');
    }
    //Lo Muestro
    slides[slider_index].style.display = 'block';
    dots[slider_index].classList.add('active-dot');
}

//anterior
document.querySelector('#arrow-prev').addEventListener('click', ()=>{
    show_slide(--slider_index);
});
//Siguiente
document.querySelector('#arrow-next').addEventListener('click', ()=>{
    show_slide(++slider_index);
});
//Dots
document.querySelectorAll('.dot-nav').forEach((element)=>{
    element.addEventListener('click', function(){
        let dots = Array.prototype.slice.call(this.parentElement.children),
            dot_index = dots.indexOf(element);
        show_slide(slider_index = dot_index);
    })
});
//Automatico
// setInterval(() =>{
//     show_slide(++slider_index);
// }, 4000);
