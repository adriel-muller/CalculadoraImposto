<!DOCTYPE html>
    <html lang="pt_br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>Calculadora INSS/IRPF</title>
    </head>
    <body>
        <div class="container"> 
            <div class="title"> 
                <h1> Calculadora INSS/IRPF </h1>
            </div>

            <?php 
            if (isset ( $_GET [ "mensagem" ] ) && $_GET [ "mensagem" ] == 1 ) { ?>
                <div class="alert alert-success" role="alert"> Insira um valor válido para salário! </div>
            <?php } ?>


            <div class="form"> 
                <form action="server/calculo.php" method="POST" class="form-register">
                   
                    <div class= nome> 
                        <input type="text" name="nome" required="required" autocomplete="off" value="" placeholder="Nome Completo" required>
                    </div>

                    <div class = salario>
                        <input type="number" min="1" name="salario-bruto" placeholder="Salário Bruto" required="required" autocomplete="off" value="" pattern="[+-]?([0-9]*[.])?[0-9]+" required>
                    </div>
                    
                    <input type="submit" name="submit" value="Enviar" class="button">

                </form> 
            </div>
        <div class= box>
            <div class = "table">
            <table>
                <th id=nome-th>
                    Nome   
                </th>
                
                <th id=salario-th>
                    Salário Liquido
                </th>
                

        <?php 
            if(file_exists ("./server/arquivo/dados.txt")){
                $file = file_get_contents("./server/arquivo/dados.txt");
            if($file){
                $dados = explode("|", $file);
                foreach($dados as $key => $value){
                    if($key%2 == 0){
                        echo ("<tr> <td>".$value."</td>");
                    }
                    else{
                        echo ("<td>".$value."</td> </tr>");
                    }
                } 
            }
        }
        
        ?>
        </table>
        </div>
        </div>   
        <div class=limpar> 
            <form action="./server/calculo.php" method="POST">
                <input type="submit" name="Limpar" value="Limpar" class="button-limpar">
            </form>
        </div>
        </div>
        
        <form>
    </body>
</html>