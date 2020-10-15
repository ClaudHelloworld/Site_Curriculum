<!DOCTYPE html>
<html>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<meta charset="utf-8">
<?php
if($_POST){
    $nome = $_POST['nome'];
    
    $dt = $_POST['dt_nascimento'];
    $logradouro = $_POST['company'];
    $RG = $_POST['RG'];
    $CPF = $_POST['nome'];
    $Civil = $_POST['subject'];
    $Email = $_POST['email'];
    $Celular = $_POST['phone'];
    $Filhos = $_POST['filhos'];
    $Cursos = implode("<br>", $_POST['curso']);

    $nasc = $_POST['dt_nascimento'];
    //função responsavel por criar ou abrir um arquivo
	$arquivo = fopen('./arquivos/'.$nome.'.html', 'a+');
    //função responsavel por escrever nesse arquivo manipulado
    


    $texto = "<!DOCTYPE html>
                <html>
                <head>
                    <title>$nome</title>
                    
                    <meta charset='utf-8'>
                    <link rel='stylesheet' href='../css/curriculo.css'>
                </head>
                <body>
                <div>
                <h1 style='color:Black;'>". $nome."<hr></h1>
                
                <p>Endereço: ". $logradouro."</p>
                <p>Data de Nascimento: ". $dt."</p>
                <p>RG: ". $RG."</p>
                <p>CPF: ". $CPF."</p>
                <p>Civil: ". $Civil."</p>
                <p>Filhos: ". $Filhos."</p>
                <p>Email: ". $Email."</p>
                <p>Celular: ". $Celular."</p>
                <p>Cursos: ". $Cursos."</p>


                </body>
                </html>             
                "
                ;
 
 	
 	fwrite($arquivo, $texto);
	$url = './arquivos/'.$nome.'.html';
	header("location: $url");

	//Cabeçalhos para envio do email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: claudineigomes.contato@outlook.com' . "\r\n";

    



    if(mail($Email, "Curriculo", $texto, $headers))
    {
        echo '<p><div>Seu currículo foi enviado a você por email.</p><div>';
	}
	else
	{
		echo '<p><div>Ocorreu um erro ao enviar seu curriculo por email.<div></p>';
	}
}

?>
</center>
</html>
