<?php 


class SQL{

    public function Conexao(){

        $host = "localhost";
        $username = "root";
        $password = "root";
        $dbname = "funcionarios";
        $port = 3306;

        $conn = mysqli_connect($host, $username, $password, $dbname, $port);
        
        return $conn;
        
        }
        
        public function Inserir($nome, $cpf, $data_inicial, $hora_inicial, $data_final, $hora_final, $horas_trabalhadas){
        
          $conn =  $this->Conexao();

          $sql = "INSERT INTO funcionario (nome, cpf, data_inicial, hora_inicial, data_final, hora_final, horas_trabalhadas) values (?, ?, ?, ?, ?, ?, ?)";

          $stmt = $conn->prepare($sql);
          $stmt->bind_param("sssssss", $nome, $cpf, $data_inicial, $hora_inicial, $data_final, $hora_final, $horas_trabalhadas);
          $stmt->execute();
        
        }

        public function Listar(){
            $conn = $this->Conexao();

            $sql = "SELECT * FROM funcionario";

            $stmt = $conn->query($sql);

            while($funcionario = $stmt->fetch_assoc()){
                echo "<div class='registro'>";
                echo "<h2> ".$funcionario ['nome']."</h2>";
                echo "<hr>";
                echo "<h4>Data que Iniciou: <span> ". $funcionario ['data_inicial']."</span> </h4>";
                echo "<h4>Hora que Iniciou: <span> ". $funcionario ['hora_inicial']."</span> </h4>";
                echo "<h4>Data que Finalizou: <span> ". $funcionario ['data_final']."</span> </h4>";
                echo "<h4>Hora que Finalizou: <span> ". $funcionario ['hora_final']."</span> </h4>";
                echo "<h4>Horas Trabalhadas: <span> ". $funcionario ['horas_trabalhadas']."</span> </h4>";
                echo "</div>";
            }
            
            
        }


        public function ListarComData($data){
            $conn= $this->Conexao();

            $sql = "SELECT * FROM funcionario where data_inicial = '$data' ";

            $stmt = $conn->query($sql);

            while($funcionario = $stmt->fetch_assoc()){
   
                echo "<div class='registro'>";
                echo "<h2> ".$funcionario ['nome']."</h2>";
                echo "<hr>";
                echo "<h4>Data que Iniciou: <span> ". $funcionario ['data_inicial']."</span> </h4>";
                echo "<h4>Hora que Iniciou: <span> ". $funcionario ['hora_inicial']."</span> </h4>";
                echo "<h4>Data que Finalizou: <span> ". $funcionario ['data_final']."</span> </h4>";
                echo "<h4>Hora que Finalizou: <span> ". $funcionario ['hora_final']."</span> </h4>";
                echo "<h4>Horas Trabalhadas: <span> ". $funcionario ['horas_trabalhadas']."</span> </h4>";
                echo "</div>";

            }
        }
        

}











?>