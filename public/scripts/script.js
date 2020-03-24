$("#ajaxbtn").on("click", function(){
    $.get(
        "index.php?action=ajax",
        {
            nb : $("#nbajax").text()
        },
        function(result){
            $("#nbajax").text(result)
            console.log(result)
            if(result == '20'){ 
                $("#nbajax").append("<img src='./public/images/dge.png'>")
            }
        }
    )
})
$("#recherche").on("keyup", function(){
            console.log( $("#recherche").val())
            // var jqxhr = $.ajax( "index.php?action=recherche",
            // {
            //     nb : $("#recherche").val()
            // } )
            // .done(function(result) {
            //     console.log(result)
            //     alert( "success" );
            // })
            // .fail(function() {
            //     alert( "error" );
            // })
            // .always(function() {
            //     alert( "complete" );
            // });
            
            // // Perform other work here ...
            
            // // Set another completion function for the request above
            // jqxhr.always(function() {
            // alert( "second complete" );
            // });
    $.get(
        "index.php?action=recherche",
        {
            nb : $("#recherche").val()
        },
        function(result){
            console.log( result.length)
            if(result.length == 0){
                $(".affich").html("aucun résultat")
            }
            else{
                $(".affich").html('')
               $(".affich").html(result)

            }
            if($("#recherche").val() == ''){
                $(".affich").html('')
            }
        }
    )
})
// window.addEventListener('scroll', function() {
//     $(".menu").removeClass("hide")
//     $(".nav").addClass("hide")
// })
// $(".menu").on("click",function(){
//     console.log('toto')
//     $(this).addClass("hide")
//     $(".nav").removeClass("hide")
// })
$(".upload").on('click',function(){
    $(".up").toggleClass('hide');
    $(".link").toggleClass('hide');
})
$(".link").on('click',function(){
    $(".lien").toggleClass('hide');
    $(".upload").toggleClass('hide');
})
$(".choixPlus").on("click",function(){
    console.log("toto")
    $(".couleur_suppl").append('<div class = "suppl"> <label for="">couleur n° 2</label>'+
    '<input type="color" name="couleurs[]" placeholder="couleur" value=""></div>')
})

