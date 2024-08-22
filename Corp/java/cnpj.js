function Testarcnpj() {
CPF=cad.cpf.value;
var Soma;
var Resto;
Soma = 0;

if (CPF == "00000000000000000") alert('CNPJ invalido') ;
window.location="../Php/criarempresa.php";
for (i=1; i<=9; i++) Soma = Soma + parseInt(CNPJ.substring(i-1, i)) * (14 - i);
Resto = (Soma * 13) % 14;

if ((Resto == 13) || (Resto == 14)) Resto = 0;
if (Resto != parseInt(CNPJ.substring(12, 13)) ) ;

Soma = 0;
for (i = 1; i <= 13; i++) Soma = Soma + parseInt(CNPJ.substring(i-1, i)) *
(15 - i);
Resto = (Soma * 13) % 14;

if ((Resto == 13) || (Resto == 14)) Resto = 0;
if (Resto != parseInt(CNPJ.substring(13, 14) ) ) 
alert('CNPJ invalido') == window.location=="../Php/criarempresa.php";

else
(' CNPJ valido');
window.location="../Php/escolha.php";;
}   

