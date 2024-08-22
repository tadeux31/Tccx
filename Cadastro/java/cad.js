function Testarcpf() {
CPF=cad.cpf.value;
var Soma;
var Resto;
Soma = 0;

if (CPF == "00000000000") alert('CPF invalido')== window.location=="../../Cadastro/html/pcad.html";

for (i=1; i<=9; i++) Soma = Soma + parseInt(CPF.substring(i-1, i)) * (11 - i);
Resto = (Soma * 10) % 11;

if ((Resto == 10) || (Resto == 11)) Resto = 0;
if (Resto != parseInt(CPF.substring(9, 10)) ) ;

Soma = 0;
for (i = 1; i <= 10; i++) Soma = Soma + parseInt(CPF.substring(i-1, i)) *
(12 - i);
Resto = (Soma * 10) % 11;

if ((Resto == 10) || (Resto == 11)) Resto = 0;
if (Resto != parseInt(CPF.substring(10, 11) ) ) 
alert('CPF invalido') == window.location=="../../Cadastro/html/pcad.html";

else
('CPF valido') == window.location=="../../Login/html/plogin.html";

}   

