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
           console.log(JSON.parse(result))
           if(JSON.parse(result).length == 2){
            $(".affich").append("<div><a href='?action=voir&id="+JSON.parse(result)[1]+"'>"+JSON.parse(result)[0]+"</a>")
           }
           else if(JSON.parse(result).length != 0){
               console.log(result)
              
                   while(i < JSON.parse(result).length){
                       $.get(
                        //    "index.php.action=voir&id="+JSON.parse(result)[i][1]+""
                       )
                        console.log(JSON.parse(result)[i])
                        $(".affich").append("<div><a href='?action=voir&id="+JSON.parse(result)[i][1]+"'>"+JSON.parse(result)[i][0]+"</a></div>")
                        i++    
                   }
               
            }
            else{
            $(".affich").append("<div>pas de résultats</div>")
            }
        }
    )
})
window.addEventListener('scroll', function() {
    $(".nav").addClass("color_head")
    var test = document.querySelector('.nav')
    bounding = test.getBoundingClientRect();
    if(bounding.top == 8){
        $(".nav").removeClass("color_head")
    }
    console.log(bounding.top)
})
