function myMap() {
    const coord = {lat: 47.078116, lng: 21.917875};
    const map = new google.maps.Map(document.getElementById("googleMap"), {
        zoom: 17,
        center: coord,
        controlSize: 24,
    });
    const marker = new google.maps.Marker({
        position: coord,
        map: map,
    });
}
$(document).ready(function (){
    k = -1;
    function movement() {
        $("#bottom_logo").css("left", (Number($("#bottom_logo").css("left").slice(0, -2)) + k * 1) + "px");
        if (Number($("#bottom_logo").offset().left) < (Number($("#marg").offset().left) + Number($("#marg").width()) + 25) && k==-1)
            k = -k;
        if (Number($("#bottom_logo").css("left").slice(0, -2)) >= 0)
            k = -k;
    }
    setInterval(movement, 8);
    $("#btn").click(function (){
       $("#mesaj").attr("placeholder", "Mesajul a fost submis către o adresă de email.");
    });
});