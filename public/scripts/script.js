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
            // console.log( $("#recherche").val())
    $.get(
        "index.php?action=recherche",
        {
            nb : $("#recherche").val()
        },
        function(result){
            $(".affich").html('');
           i = 0
        //    console.log(Array.isArray(JSON.parse(result)))
           if(!Array.isArray(JSON.parse(result))){
               photo = JSON.parse(result)["photo"]
               $(".affich").append("<div><div><a href='?action=voir&id="+JSON.parse(result).id+"><div class='voiture_js'><img src="+photo+">"+JSON.parse(result).immat+"</a></div></div>")
               console.log(JSON.parse(result).immat)
            }
            else if(JSON.parse(result).length != 0){
                
               //    $.get(
                   //        "index.php.action=liste_recherche&id="+JSON.parse(result)+""
                   //    )
                   while(i < JSON.parse(result).length){
                        // console.log(JSON.parse(result)[i]["photo"])
                        photo = JSON.parse(result)[i]["photo"]
                        $(".affich").append("<div><div><a href='?action=voir&id="+JSON.parse(result)[i]["id"]+"'>"+JSON.parse(result)[i]["immat"]+"<img src="+photo+"></a></div></div>")
                        i++    
                   }
                   if($("#recherche").val() == 0){
                       $(".affich").empty()
                   }
            }
            else{
            $(".affich").append("<div>pas de résultats</div>")
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

