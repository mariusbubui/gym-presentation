$(document).ready(function (){
    $( ".index div" ).hover(
        function() {
            $(this).css("background-color", "#01b1a6");
            $("#c"+this.id[1]).css("background-color", "rgb(28, 34, 37)");
            $("#c"+this.id[1]).css("color", "white");
        }, function() {
            $( this ).css("background-color", "rgb(28, 34, 37)");
            $("#c"+this.id[1]).css("background-color", "white");
            $("#c"+this.id[1]).css("color", "black");
        }
    );
    k = -1;
    function movement() {
        $("#bottom_logo").css("left", (Number($("#bottom_logo").css("left").slice(0, -2)) + k * 1) + "px");
        if (Number($("#bottom_logo").offset().left) < (Number($("#marg").offset().left) + Number($("#marg").width()) + 25) && k==-1)
            k = -k;
        if (Number($("#bottom_logo").css("left").slice(0, -2)) >= 0)
            k = -k;
    }
    setInterval(movement, 8);
});