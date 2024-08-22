<?php
session_start();
//include "../../Conexao/conexao.php";
$filePath = $_SERVER['DOCUMENT_ROOT'] . '/Ap.Final/Conexao/conexao.php';

if (file_exists($filePath)) {
    include $filePath;
} else {
    echo "O arquivo não foi encontrado.";
}


$valorpagx= 19.99;

$data_vencx = $_SESSION['data_venc'];

$datax =$_SESSION['data_compra'];


// DADOS DO BOLETO PARA O SEU CLIENTE
$dias_de_prazo_para_pagamento = 7;
$taxa_boleto = 2.95;
$data_venc = $data_vencx; 
$valor_cobrado =  $valorpagx; 
$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

$dadosboleto["nosso_numero"] = '12345678';  // Nosso numero - REGRA: Máximo de 8 caracteres!
$dadosboleto["numero_documento"] = '0123';	// Num do pedido ou nosso numero
$dadosboleto["data_vencimento"] = $data_venc; 
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emissão do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = "Nome do seu Cliente";
$dadosboleto["endereco1"] = "Endereço do seu Cliente";
$dadosboleto["endereco2"] = "Cidade - Estado -  CEP: 09000-410";

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = "Pagamento de Assinatura Mensal no Site Tucas - Valor referente ao codigo do usuário ".$_SESSION['id_usuario']."";
$dadosboleto["demonstrativo2"] = "Mensalidade referente a compra <br>Taxa bancária - R$ ".number_format($taxa_boleto, 2, ',', '');
$dadosboleto["demonstrativo3"] = "Tucas - http://www.tucas.com.br";
$dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% após o vencimento";
$dadosboleto["instrucoes2"] = "- Receber até 10 dias após o vencimento";
$dadosboleto["instrucoes3"] = "- Em caso de dúvidas entre em contato conosco: tucascorporacao@gmail.com";
$dadosboleto["instrucoes4"] = "&nbsp; Emitido pelo sistema Tucas - www.boletotucas.com.br";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "";
$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"] = "";		
$dadosboleto["especie"] = " ";
$dadosboleto["especie_doc"] = "";


// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //


// DADOS DA SUA CONTA - ITAÚ
$dadosboleto["agencia"] = "1565"; // Num da agencia, sem digito
$dadosboleto["conta"] = "13877";	// Num da conta, sem digito
$dadosboleto["conta_dv"] = "4"; 	// Digito do Num da conta

// DADOS PERSONALIZADOS - ITAÚ
$dadosboleto["carteira"] = "175";  // Código da Carteira: pode ser 175, 174, 104, 109, 178, ou 157

// SEUS DADOS
$dadosboleto["identificacao"] = "Projeto Tucas";
$dadosboleto["cpf_cnpj"] = "123.456.789-32";
$dadosboleto["endereco"] = " Avenida dos reis 56";
$dadosboleto["cidade_uf"] = "São Bernardo do Campo/SP";
$dadosboleto["cedente"] = "Projeto Tucas";


include("funcoes_itau.php"); 
include("layout_itau.php");
?>
