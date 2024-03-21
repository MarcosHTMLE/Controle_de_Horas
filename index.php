<?php 

require_once("ClasseFuncionario.php");
require_once("ClasseSQL.php");

ini_set('display_errors', 'Off');

error_reporting(E_ALL & ~E_WARNING);



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Horas</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <header>
        <h1>Controle de Horas</h1>
    </header>
    <div class="containers">
        <div class="funcionario">
         
                <section class="container">
                    <h2>Dados do Funcionário</h2>
                    <form action="index.php" method="POST" id="formFuncionario" >
                        <div class="input-group">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" name="nome" required>
                        </div>
                        <div class="input-group">
                            <label for="cpf">CPF:</label>
                            <input type="text" id="cpf" name="cpf" required>
                        </div>
                        <div class="input-group">
                            <label for="horasTrabalhadas">Data inicial:</label>
                            <input id="date" type="date" name="data_inicial" required/>
                            
                        </div>
                        <div class="input-group">
                            <label for="horasTrabalhadas">Hora inicial:</label>
                            <input type="time" class="hora" name="hora_inicial" required>
                            <time></time>
                        </div>
                        <div class="input-group">
                            <label for="horasTrabalhadas">Data Final:</label>
                            <input id="date" type="date" name="data_final"  required/>
                        </div>
                        <div class="input-group">
                            <label for="horasTrabalhadas">Hora Final:</label>
                            <input type="time" class="hora"  name="hora_final" required>
                        </div>
                        <div class="input-group">
                            <button type="submit">Registrar</button>
                        </div>
                    </form>
                </section>
    
        </div>

        <?php 




        setlocale(LC_ALL, "portuguese");
        
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $data_inicial = $_POST["data_inicial"];
        $hora_inicial = $_POST["hora_inicial"];
        $data_final = $_POST["data_final"];
        $hora_final = $_POST["hora_final"];

        $inicio = strtotime($data_inicial . " " . $hora_inicial);
        $final = strtotime($data_final . " " . $hora_final);
        $diferenca_segundos = $final - $inicio;
        $diferenca_horas = $diferenca_segundos / (60 * 60);

        $horas_trabalhadas = $diferenca_horas;

        $funcionario = new Funcionario();
        $funcionario->setNome($nome);
        $funcionario->setCpf($cpf);
        $funcionario->setDataInicial($data_inicial);
        $funcionario->setHoraInicial($hora_inicial);
        $funcionario->setDataFinal($data_final);
        $funcionario->setHoraFinal($hora_final);
        $funcionario->setHorasTrabalhadas($horas_trabalhadas);

        $sql = new SQL();
        $sql->Conexao();
       


        if($horas_trabalhadas < 0 ){
            echo "<script>alert('Período incorreto!');</script>";
        }else{
            if($nome == "" || $cpf == "" || $data_inicial == "" || $hora_inicial == "" || $data_final == "" || $hora_final == ""){

            }else{
                $sql->Inserir($funcionario->getNome(), $funcionario->getCpf(), $funcionario->getDataInicial(), $funcionario->getHoraInicial(), $funcionario->getDataFinal(), $funcionario->getHoraFinal(), $funcionario->getHorasTrabalhadas());
                header("Location:index.php");
            }
    
        }


      



       
        
        
       
        

        ?>
         



        <div class="dados">
                <section class="container2">
                    <h2>Registros de Trabalho</h2>
                    
                    <div class="registros">
                    <?php 
                        
                        
            
                              
                                $sql->Listar();
                           
                        
                      
                           
                        
                        
                        
                       
                    
                            
                        


                       
                    

                    
                    ?>

                    
                    </div>
                </section>
        </div>
    </div>

    
</body>

</html>
