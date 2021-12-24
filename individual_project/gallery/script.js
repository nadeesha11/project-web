
$(document).ready(function(){
$(".mob-menu button").click(function(){

    $(".mob-nav ul").slideToggle();
});

$(".material-icons.l").click(function(){
   
    var x = $(".material-icons.l h1").text();
    if (x=="view_headline"){
        $(".material-icons.l h1").text("close");
    }
    else{
        $(".material-icons.l h1").text("view_headline");
    }
   
})

});
