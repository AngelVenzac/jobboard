$(document).ready(function(){

    $("div#learnmore").hide();

    $("button#add").click(function (e) {

        e.preventDefault();

        var classname = $(this).attr("class");

        var thisdiv = $("div." + classname);
        thisdiv.toggle(700);

        $("div").not(thisdiv).hide();

        return false;
    });
    
    $("h1").click(function () {
        window.location.replace("../index.php");
    });
})