let k = 1;
var q = -1;
$(document).ready(function (){
    change_slide();
    var x = setInterval(function () {
        if (++k == 4)
            k = 1;
        change_slide(true);
    }, 5000);

    $("#stanga").click(function (){
        if(!--k)
            k = 3;
        change_slide(true);
    });

    $("#dreapta").click(function (){
        if(++k == 4)
            k = 1;
        change_slide(true);
    });

    function change_slide(ok=false) {
        let slides = $(".slide");

        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }

        slides[k-1].style.display = "block";
        if(ok) {
            clearInterval(x);
            x = setInterval(function () {
                if (++k == 4)
                    k = 1;
                change_slide(true);
            }, 5000);
        }
    }

    function movement() {
        $("#bottom_logo").css("left", (Number($("#bottom_logo").css("left").slice(0, -2)) + q * 1) + "px");

        if (Number($("#bottom_logo").offset().left) < (Number($("#marg").offset().left) + Number($("#marg").width()) + 25) && q==-1)
            q = -q;
        if (Number($("#bottom_logo").css("left").slice(0, -2)) >= 0)
            q = -q;
    }
    setInterval(movement, 8);
});