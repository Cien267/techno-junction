function searchMedicine(event){
    var inputId = $("[name='"+event.target.name+"']");
    var text = $("[name='"+event.target.name+"']").val();
    inputId.css('position','relative')
    $.ajax({
        url : "/search_medicine",
        type : "POST",
        dataType:"text",
        data : {
            textSearch : text
        },
        success : function (data){
            result =  JSON.parse(data);
            if(result.length > 0){
                $('.resultSearch').remove();
                var inputName = inputId.attr("name");
                var html = '<div class="resultSearch">';
                for (var i = 0;i < result.length;i++){
                    var name = result[i]['name'];
                    var fill = "'"+name+"','"+inputName+"'";
                    html += ' <p onclick="fillText('+fill+')"><i class="dripicons-pill"></i> '+name+'</p>';
                }
                html +='</div>';
                inputId.after(html)
            }else{
                $('.resultSearch').remove();
            }
        }
    });
}

function fillText(name,inputName) {
    if(name){
        var inputId = $("[name='"+inputName+"']");
        $(inputId).val(name);
        $('.resultSearch').remove();
    }
}