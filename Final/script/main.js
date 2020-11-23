$(document).ready(function(){

    $("div#learnmore").hide();

    $("article > button").click(function(e){

        e.preventDefault();

        var classname = $(this).attr("class");

        var thisdiv = $("div." + classname);
        thisdiv.toggle(700);

        $("div").not(thisdiv).hide();

        return false;
    })

    $('html').click(function(){
        $("div").hide();
        $("#search").val() == "";
    })

    $("h1").click(function(){
        window.location.replace("./index.php");
    })
})