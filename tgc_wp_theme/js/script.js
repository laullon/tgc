var jq = jQuery.noConflict();

jq(document).ready(function(){
    jq("ul#menu-menu-arriba").superfish();

    jq("a.ir").click(function(){
        var path=jq(this).attr("href");
        var id=jq(this).attr("id");
        var ele=jq("input[name='"+id+"']").attr("value");
        if(!ele) return false;
        ele = ele.toUpperCase().split(' ').join('');
        //        var regExPattern = /^([a-zA-Z0-9]{16})$/;
        //        if(ele.match(regExPattern)){
        var des=path+ele+"/";
        jq(this).attr("href",des);
    //            return true;
    //        }else{
    //            alert("TARJETA INCORRECTA");
    //            muestra(jq("p.tarjIncorrecta").attr("id"));
    //            return false;
    //        }
    });

    function muestra(id)
    {
        var mostrar = document.getElementById(id);
        mostrar.style.display='block';
    }
	
    jq("#login a.tab_control").click(function(){
        jq("#login a.tab_control").removeClass("selec");
        jq("#login div.tab").hide();
        jq(this).addClass("selec");
        jq("#login "+jq(this).attr("href")).show();
        return false;
    });

    jq.datepicker.setDefaults( jq.datepicker.regional[ "es" ] );
    jq( "#tgc_date" ).datepicker({
        maxDate:"+0d"
    });

    jq('form').submit(function(){
        jq(':submit', this).toggle();
        jq(this).append("enviando...");
    });

});
