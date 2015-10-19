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
        var minus = "abcdefghijklmnopqrstuvwxyz!/&%$#?=";
        var mayus = "ABCDEFGHIJKLMNOPQRSTUVWXYZ!/&%$?#=";
        var token = "";
        token += numCaracts;    token += minus;    token += mayus;
        caracter = token.charAt(getRandomNumber(0, token.length));
        return caracter;
    }
    function getRFCandCURP(){
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
        var aux =apellidoP1l+vocalApellidoP+apellidoM1l+nombre1l+fechaNac+genero;
        return aux ;
    }

    function checkPasswords()
    {
        var password = $('#password').val();
        var passwordConfirm = $('#passwordConfirm').val();
        var label =  $('#labelPasswordConfirm').text();

        console.log(password+"----"+passwordConfirm+"-----"+label);
        if(password === passwordConfirm)
        {
            $('#formGroup').removeClass('has-error').addClass('has-success');
            $('#labelPasswordConfirm').text('Verifica Contraseña*       Válido');
            $('#guardar').removeClass('hidden');
        }
        else
        {
            $('#formGroup').addClass('has-error');
            $('#labelPasswordConfirm').text('Verifica Contraseña*    No coincide');
            $('#guardar').addClass('hidden');
        }
    }
    $('#passwordConfirm').keyup(function()
    {
        checkPasswords();
    });

    $('#password').keyup(function()
    {
        checkPasswords();
    });

    $('#buttonCurp').click(function(e){
        e.preventDefault();
        var tok = "";
        var rfc = "";

        for(var j=0; j<6;j++) {
            tok += getRandomChar();
        }

        var aux = getRFCandCURP();
        rfc += aux+tok;
        $('#password').val(rfc);
        $('#passInfo').removeClass('hidden').text(rfc);
        checkPasswords();

    });
    $('#helpCurp').click(function(){

        var aux = getRFCandCURP();
        $('#curp').val(aux);
        $('#rfc').val(aux);
    })


});
