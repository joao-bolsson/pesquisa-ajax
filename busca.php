<?php
  session_start();
	include_once 'conexao.php';

	$busca = $_GET['busca'];
//se a busca for diferente de vazio é porque o funcionário quer ver todos os clientes
	if($busca != "") {

		$query = mysql_query("SELECT * FROM cliente WHERE nome_cliente LIKE '%$busca%' ORDER BY nome_cliente ASC ", $conexao);

		//variavel para zebrar as linhas
		$cont = 0;
		while($lista_cliente = mysql_fetch_array($query)) {
      echo "
        <tr>
          <td>$lista_cliente[cpf_cliente]</td>
          <td>$lista_cliente[nome_cliente]</td>
          <td>$lista_cliente[email_cliente]</td>
          <td>$lista_cliente[telefone_cliente]</td>
        ";
        if($lista_cliente["status_cliente"] == 'Inativo'){
          echo "
          <td><span class=\"badge bg-red\">Inativo</span></td>
          <td>
            <button onclick=\"setIdCliente($lista_cliente[id_cliente])\" type=\"button\" class=\"btn btn-default\" data-toggle=\"modal\" data-target=\"#exampleModal\" data-whatever=\"$lista_cliente[id_cliente]\">
              <i class=\"fa fa-dollar\"></i> Opção Inativo
            </button>
          </td>
          ";
        }else {
          echo "
          <td><span class=\"badge bg-green\">Ativo</span></td>
          <td>
            <a class=\"btn btn-default\" href=\"#\" ><i class=\"fa fa-edit\"></i> Opção 1</a>
            <a class=\"btn btn-default\" href=\"#\"><i class=\"fa fa-bolt\"></i> Opção 2</a>
            <a class=\"btn btn-default\" href=\"#\" ><i class=\"fa fa-print\"></i> OPção 3</a>
          </td>
          ";
        }
        echo "
        </tr>";
			$cont ++;
			}
		}else{
			$query = mysql_query("select * from cliente",$conexao);
			mysql_close();
			while($lista_cliente = mysql_fetch_array($query)) {
        echo "
          <tr>
            <td>$lista_cliente[cpf_cliente]</td>
            <td>$lista_cliente[nome_cliente]</td>
            <td>$lista_cliente[email_cliente]</td>
            <td>$lista_cliente[telefone_cliente]</td>
          ";
          if($lista_cliente["status_cliente"] == 'Inativo'){
            echo "
            <td><span class=\"badge bg-red\">Inativo</span></td>
            <td>
              <button onclick=\"setIdCliente($lista_cliente[id_cliente])\" type=\"button\" class=\"btn btn-default\" data-toggle=\"modal\" data-target=\"#exampleModal\" data-whatever=\"$lista_cliente[id_cliente]\">
                <i class=\"fa fa-dollar\"></i> Opção Inativo
              </button>
            </td>
            ";
          }else {
            echo "
            <td><span class=\"badge bg-green\">Ativo</span></td>
            <td>
              <a class=\"btn btn-default\" href=\"#\" ><i class=\"fa fa-edit\"></i> Opção 1</a>
              <a class=\"btn btn-default\" href=\"#\"><i class=\"fa fa-bolt\"></i> Opção 2</a>
              <a class=\"btn btn-default\" href=\"#\" ><i class=\"fa fa-print\"></i> OPção 3</a>
            </td>
            ";
          }
          echo "
          </tr>";
			}
		}
?>
