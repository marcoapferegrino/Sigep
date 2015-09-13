/**
 * Created by Marco on 08/09/15.
 */
$(document).ready(function(){
//console.log("Ya cargue document");

/*Necesitamos que el body este construido patra aplicar Jquery sobre el modal de bootstrap
* ya que el codigo no funciona por que e lmodal no esta construido.*/
    $('body').on('change', '#tipo', function() {

        var tipo = $(this).val();
        var label = $('<label for="escuelaMovilidad" id="labelEscuelaMovilidad">Escuela de movilidad</label>');
        var input = $('<input type="text" class="form-control " id ="escuelaMovilidad"  name ="escuelaMovilidad" placeholder="Escuela movilidad">');
        if(tipo === "movilidad"){
            console.log("Entre movilidad");
            $('#inputEscuelaMovilidad').append(label).append(input);
        }
        else{
            $('#labelEscuelaMovilidad').remove();
            $('#escuelaMovilidad').remove();
        }

    });

    //$('body').on('change', '#tipoEdit', function() {
    //
    //    var tipo = $(this).val();
    //    var tipoData = $(this).data("idasignatura");
    //    var campoDiv ='#inputEscuelaMovilidadEdit'+tipoData;
    //    console.log("Id: "+tipoData);
    //    var label = $('<label for="escuelaMovilidad" id="labelEscuelaMovilidadEdit">Escuela de movilidad</label>');
    //    var input = $('<input type="text" class="form-control " id ="escuelaMovilidadEdit"  name ="escuelaMovilidad" placeholder="Escuela movilidad">');
    //
    //    if(tipo === "movilidad"){
    //        console.log("Entre movilidad Edit");
    //        $(campoDiv).append(label).append(input);
    //    }
    //    else{
    //        console.log("Removi: "+campoDiv);
    //        $(campoDiv+' #labelEscuelaMovilidadEdit').remove();
    //        $(campoDiv+' #escuelaMovilidadEdit').remove();
    //    }
    //
    //});






});
