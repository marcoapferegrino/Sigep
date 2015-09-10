/**
 * Created by Marco on 08/09/15.
 */
$(document).ready(function(){
//console.log("Ya cargue document");

/*Necesitamos que el body este construido patra aplicar Jquery sobre el modal de bootstrap
* ya que el codigo no funciona por que e lmodal no esta construido.*/
    $('body').on('change', '#tipo', function() {
        var tipoModal = $(this).val();
        var label = $('<label for="escuelaMovilidad" id="labelEscuelaMovilidad">Escuela de movilidad</label>');
        var input = $('<input type="text" class="form-control"  name ="escuelaMovilidad" id="escuelaMovilidad" placeholder="Escuela movilidad">');
        if(tipoModal === "movilidad"){
            $('#inputEscuelaMovilidad').append(label).append(input);
        }
        else{
            $('#labelEscuelaMovilidad').remove();
            $('#escuelaMovilidad').remove();
        }
    });



});
