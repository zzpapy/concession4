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
           else{
               while(i < JSON.parse(result).length){
                   $.get(
                       "index.php.action=voir&id="+JSON.parse(result)[i][1]+""
                   )
                console.log(JSON.parse(result)[i])
                $(".affich").append("<div><a href='?action=voir&id="+JSON.parse(result)[i][1]+"'>"+JSON.parse(result)[i][0]+"</a>")
                i++    
               }
           }
        }
    )
})