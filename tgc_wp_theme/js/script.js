var jq = jQuery.noConflict();
jq(document).ready(function(){
    jq("ul#menu-menu-arriba").superfish();

    jq("a.ir").click(function(){
        var path=jq(this).attr("href");
        var id=jq(this).attr("id");
        var ele=jq("input[name='"+id+"']").attr("value");
        if(ele){
            var des=path+ele+"/";
            jq(this).attr("href",des);
            return true;
        }else{
            return false;
        }
    });
});