/**
 * Created by Marco on 01/09/15.
 */

$(document).ready(function(){
    var rfc = "";
    function getRandomNumber(lowerBound,upperBound){
        aleatorio = Math.floor(Math.random() * (upperBound - lowerBound)) + lowerBound;
        return aleatorio;
    }
    function getRandomChar() {
        var numCaracts = "0123456789";
        var minus = "abcdefghijklmnopqrstuvwxyz!/&%$·?=)(";
        var mayus = "ABCDEFGHIJKLMNOPQRSTUVWXYZ!/&%$·?=)(";
        var token = "";
        token += numCaracts;    token += minus;    token += mayus;
        caracter = token.charAt(getRandomNumber(0, token.length));
        return caracter;
    }

    $('#buttonCurp').click(function(){
        var tok = "";
        var rfc = "";
        var name = $('#name').val();
        var apellidoP = $('#apellidoP').val();
        var apellidoM = $('#apellidoM').val();
        var fechaNac = $('#fechanac').val().split("-").join("");
        fechaNac = fechaNac.substring(2);
        var genero = $('#genero').val().charAt(0);

        var nombre1l = name.charAt(0);
        var apellidoM1l = apellidoM.charAt(0);
        var apellidoP1l = apellidoP.charAt(0);
        var vocalApellidoP = "";

        for(var i=0; i<apellidoP.length;i++){
            if(apellidoP.charAt(i)=='a' ||apellidoP.charAt(i)=='e' || apellidoP.charAt(i)=='i'||apellidoP.charAt(i)=='o'||apellidoP.charAt(i)=='u')
            {
                vocalApellidoP = apellidoP.charAt(i).toUpperCase();
                break;
            }
        }
        for(var j=0; j<6;j++) {
            tok += getRandomChar();
        }
        rfc += apellidoP1l+vocalApellidoP+apellidoM1l+nombre1l+fechaNac+genero+tok;
        $('#password').val(rfc);



    });



});
