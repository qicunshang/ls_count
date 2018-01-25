function ls_count(appid,secret_key){
    var source_page = window.location.href;
    $.get('http://www.ls_count.com/count', {appid:appid,secret_key:secret_key,source_page:source_page},function(res){
        if(res.code=='200'){
            //document.write(res.data.count);
            $('#ls_count').text(res.data.count);
        }else{

        }
    },'json');
}