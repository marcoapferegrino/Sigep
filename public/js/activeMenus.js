
$(document).ready(function(){
    //eval(function(p,a,c,k,e,r){e=function(c){return c.toString(a)};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('j 0=$(k).l(\'r\');j q=$(k).l(\'p\');5(0==\'/a\'||0==\'/c\'||0==\'/b\'){$(\'#n\').1(\'2\');6(0){3\'/a\':$(\'.a\').1(\'2\');4;3\'/c\':$(\'.c\').1(\'2\');4;3\'/b\':$(\'.b\').1(\'2\');4}}7 5(0==\'/f\'||0==\'/g\'||0==\'/h\'){$(\'.m\').1(\'2\');6(0){3\'/f\':$(\'.f\').1(\'2\');4;3\'/g\':$(\'.g\').1(\'2\');4;3\'/h\':$(\'.h\').1(\'2\');4}}7 5(0==\'/i\'||0==\'/e\'){$(\'#o\').1(\'2\');6(0){3\'/i\':$(\'.i\').1(\'2\');4;3\'/e\':$(\'.e\').1(\'2\');4}}7 5(0==\'/8\'||0==\'/d\'||0==\'/9\'){$(\'#s\').1(\'2\');6(0){3\'/8\':$(\'.8\').1(\'2\');4;3\'/d\':$(\'.d\').1(\'2\');4;3\'/9\':$(\'.9\').1(\'2\');4}}7 5(0==\'/t\'){$(\'#u\').1(\'2\')}',31,31,'route|addClass|active|case|break|if|switch|else|getAddInscripcion|getGrupos|horarios|homeSA|asignaturas|getInscritos|getAddSalon|showUsuarios|getAddAlumno|getAddDocente|getAddGrupo|var|location|attr|dropUsuarios|dropCatalogos|dropEstructAca|href|url|pathname|dropInscrip|getAlumnosCalificar|menuCalifAlumno'.split('|'),0,{}))
    var route = $(location).attr('pathname');

    if(route == '/horarios' || route == '/asignaturas' || route == '/homeSA')
    {
        $('#dropCatalogos').addClass('active');
        switch (route)
        {
            case '/horarios':
                $('.horarios').addClass('active');
                break;
            case '/asignaturas':
                $('.asignaturas').addClass('active');
                break;
            case '/homeSA':
                $('.homeSA').addClass('active');
                break;
        }
    }
    else if(route == '/showUsuarios' || route == '/getAddAlumno' || route == '/getAddDocente')
    {
        $('.dropUsuarios').addClass('active');
        switch (route)
        {
            case '/showUsuarios':
                $('.showUsuarios').addClass('active');
                break;
            case '/getAddAlumno':
                $('.getAddAlumno').addClass('active');
                break;
            case '/getAddDocente':
                $('.getAddDocente').addClass('active');
                break;
        }

    }
    else if(route == '/getAddGrupo' || route == '/getAddSalon')
    {
        $('#dropEstructAca').addClass('active');

        switch (route)
        {
            case '/getAddGrupo':
                $('.getAddGrupo').addClass('active');
                break;
            case '/getAddSalon':
                $('.getAddSalon').addClass('active');
                break;
        }
    }
    else if(route == '/getAddInscripcion' || route == '/getInscritos'|| route == '/getGrupos')
    {
        $('#dropInscrip').addClass('active');

        switch (route)
        {
            case '/getAddInscripcion':
                $('.getAddInscripcion').addClass('active');
                break;
            case '/getInscritos':
                $('.getInscritos').addClass('active');
                break;
            case '/getGrupos':
                $('.getGrupos').addClass('active');
                break;
        }
    }
    else if(route=='/getAlumnosCalificar')
    {
        $('#menuCalifAlumno').addClass('active');
    }
});