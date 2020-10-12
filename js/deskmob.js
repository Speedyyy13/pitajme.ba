$(document).ready(function(){


  $(window).resize(function(){

    //console.log(window.innerWidth);

    setMob();
    sliderDeskMob();

  });


});

function setMob(){

  var screenwidth = window.innerWidth;

  //console.log(screenwidth);

  if(screenwidth < 768){




    if(findrez == 0){
      $("#map").css("display", "none");
      $("#lista").css("display", "none");
      $("#god").css("display", "grid");
      $("#mje").css("display", "grid");
      $("#nov").css("display", "grid");
      $("#mini-nemarezultata").css("display", "none");
      $(".listamapa").css("display", "none");
    }

    if(findrez == 1){


      if($("#map").css('display') == "block"){

        $("#map").css("display", "block");
        $("#lista").css("display", "none");
        $("#god").css("display", "none");
        $("#mje").css("display", "none");
        $("#nov").css("display", "none");
        $("#mini-nemarezultata").css("display", "none");
        $(".listamapa").css("display", "block");

      }else{

        $("#map").css("display", "none");
        $("#lista").css("display", "block");
        $("#god").css("display", "none");
        $("#mje").css("display", "none");
        $("#nov").css("display", "none");
        $("#mini-nemarezultata").css("display", "none");
        $(".listamapa").css("display", "block");
      }

    }

    if(findrez == 2){
      $("#map").css("display", "none");
      $("#lista").css("display", "none");
      $("#god").css("display", "grid");
      $("#mje").css("display", "grid");
      $("#nov").css("display", "grid");
      $("#mini-nemarezultata").css("display", "block");
      $(".listamapa").css("display", "none");
    }

  }else{



    if(findrez == 0){
      $("#map").css("display", "inline-block");
      $("#lista").css("display", "inline-block");
      $("#god").css("display", "grid");
      $("#mje").css("display", "grid");
      $("#nov").css("display", "grid");
      $("#mini-nemarezultata").css("display", "none");
      $(".listamapa").css("display", "none");

    }

    if(findrez == 1){
      $("#map").css("display", "inline-block");
      $("#lista").css("display", "inline-block");
      $("#god").css("display", "none");
      $("#mje").css("display", "none");
      $("#nov").css("display", "none");
      $("#mini-nemarezultata").css("display", "none");
      $(".listamapa").css("display", "none");
      $("#pgnpmeny").css("display", "block");
      $("#pgnpmeny1").css("display", "block");
    }

    if(findrez == 2){
      $("#map").css("display", "inline-block");
      $("#lista").css("display", "inline-block");
      $("#god").css("display", "grid");
      $("#mje").css("display", "grid");
      $("#nov").css("display", "grid");
      $("#mini-nemarezultata").css("display", "none");
      $(".listamapa").css("display", "none");
      $("#pgnpmeny").css("display", "none");
      $("#pgnpmeny1").css("display", "none");
    }



  }
}

function sliderDeskMob(){

  var screenwidth = window.innerWidth;


  if(screenwidth < 768){

    //console.log(s);

    for (var i = 0; i <= s; i++) {

      let altslide = $("#slide"+i).attr("alt");
       $("#slide"+i).attr("src", "img/mobilnibaneri/"+altslide);
    }



  }else{

    for (var i = 0; i <= s; i++) {

      let altslide = $("#slide"+i).attr("alt");
       $("#slide"+i).attr("src", "img/desktopbaneri/"+altslide);
    }


  }
}
