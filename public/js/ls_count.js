function ls_count(appid,secret_key){
    var source_page = window.location.href;
    $.get('http://ls_count.qicunshang.com/count', {appid:appid,secret_key:secret_key,source_page:source_page},function(res){
        if(res.code=='200'){
            //document.write(res.data.count);
            $('#ls_count').html(res.data.count);
            $('#page_count').html(res.data.page_count);
        }else{
            $('#ls_count').html('null');
            $('#page_count').html('null');
        }
    },'json');
}