let Slide = document.getElementsByClassName('slider');
let arrow = document.getElementsByClassName('arrow');
let SlideAfficher = 0;

function view_right() {
    SlideAfficher = (SlideAfficher === Slide.length - 1) ? 0 : SlideAfficher + 1;
    for (let SlideIndex = 0; SlideIndex < Slide.length; SlideIndex++) {
        if (SlideIndex === SlideAfficher) {
            Slide[SlideIndex].style.display = 'flex';
        } else {
            Slide[SlideIndex].style.display = 'none';
        }
    }
}

$(document).ready(function () {
    $('#animate').animate({
        marginLeft: "20px",
        opacity: "1",
    }, 1200);
    $('#animateTwo').animate({
        marginLeft: "20px",
        opacity: "1",
    }, 1200);
    setTimeout(function () {
        $('#BuyBtn').removeAttr('id');
    }, 1300)



})

