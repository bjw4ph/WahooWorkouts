$(document).ready(function(){
// $.when().
// $.when( $("#navbar").load("/static/html/navbar.html") ).done(function(x){
//     var pathname = window.location.pathname;
//     if (pathname.indexOf("/task") >= 0){
//         console.log("if");
//         $("#nav1").parent().addClass("active");
//     }
// });


    var pathname = window.location.pathname;
    // console.log($("#authPresent").data("auth"))
    // if($("#authPresent").data("auth") == "yes"){
    //     console.log("if statement")
    //     $("#nav5").html("Logout")
    //     $("#nav5").attr("href", "/logout")
    // } 
    if (pathname.indexOf("/index") >= 0){
        $("#theBody").addClass("homepage")
        $("#nav1").parent().addClass("active");
    }
    else if (pathname.indexOf("/trainer") >= 0){
        $("#theBody").addClass("no-sidebar")
        $("#nav2").parent().addClass("active");
    }
    else if (pathname.indexOf("/aboutus") >= 0){
        $("#theBody").addClass("no-sidebar")
        $("#nav3").parent().addClass("active");
    }
    else if (pathname.indexOf("/login") >= 0){
        $("#theBody").addClass("no-sidebar")
        $("#nav5").parent().addClass("active");
    }
    else if (pathname.indexOf("/signup") >= 0){
        $("#theBody").addClass("no-sidebar")
        $("#nav4").parent().addClass("active");
    }
    else {
        $("#theBody").addClass("no-sidebar")
    }
});

// console.log(pathname)

