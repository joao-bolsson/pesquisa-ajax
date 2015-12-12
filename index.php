<?php
    include_once "conexao.php";
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <title>João Bolsson | Pesquisa Ajax</title>

    <!-- SCRIPT DA BUSCA POR CLIENTE -->
    <script>
        //função para pegar o objeto ajax do navegador
        function xmlhttp(){
        	// XMLHttpRequest para firefox e outros navegadores
        	if (window.XMLHttpRequest){
        		return new XMLHttpRequest();
        	}
        	// ActiveXObject para navegadores microsoft
        	var versao = ['Microsoft.XMLHttp', 'Msxml2.XMLHttp', 'Msxml2.XMLHttp.6.0', 'Msxml2.XMLHttp.5.0', 'Msxml2.XMLHttp.4.0', 'Msxml2.XMLHttp.3.0','Msxml2.DOMDocument.3.0'];
        	for (var i = 0; i < versao.length; i++){
        		try{
        			return new ActiveXObject(versao[i]);
        		}catch(e){
        			alert("Seu navegador não possui recursos para o uso do AJAX!");
        		}
        	} // fecha for
        	return null;
        } // fecha função xmlhttp

        //função para fazer a requisição da página que efetuará a consulta no DB
        function carregar(){
           a = document.getElementById('busca').value;
           ajax = xmlhttp();
           if (ajax){
        	   ajax.open('get','busca.php?busca='+a, true);
        	   ajax.onreadystatechange = trazconteudo;
        	   ajax.send(null);
           }
        }
        //função para incluir o conteúdo na pagina
        function trazconteudo(){
        	if (ajax.readyState==4){
        		if (ajax.status==200){
        			document.getElementById('resultados').innerHTML = ajax.responseText;
        		}
        	}
        }
      </script>
  </head>
  <body>
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-12 connectedSortable">
        <div class="box box-solid box-primary">
          <div class="box-header">
            <h3 class="box-title" style="text-align: center">Lista de Clientes</h3>
            <div class="box-tools">
              <div class="input-group" style="width: 150px; margin-left: 20%">
                <input id="busca" type="text" name="table_search" onkeyUp="carregar()" class="form-control input-sm" placeholder="Pesquisar por Nome">
                <div class="input-group-btn">
                  <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </div>
          </div><!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover" style="margin-left: 5%; width: 90%">
              <thead>
                <!--  a matrícula será o cpf do cliente -->
                <th>Matrícula</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Telefone</th>
                <th>Status</th>
                <th>Opções</th>
              </thead>
              <tbody id="resultados">
                <?php
                    $query_cliente = mysql_query("select id_cliente, cpf_cliente, nome_cliente, telefone_cliente, status_cliente, email_cliente
                    from cliente", $conexao);
                    mysql_close();
                    if(mysql_num_rows($query_cliente) < 1){
                      echo "
                      <tr>
                        <td collspan='2'>Nenhum cliente cadastrado</td>
                      </tr>
                      ";
                    }else{
                      while($lista_cliente = mysql_fetch_array($query_cliente)) {
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
                            <a class=\"btn btn-default\" href=\"#\" ><i class=\"fa fa-print\"></i> Opção 3</a>
                          </td>
                          ";
                        }
                        echo "
                        </tr>";
                      }
                    }
                 ?>
              </tbody>
            </table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->
      </section><!-- /.Left col -->
    </div><!-- /.row (main row) -->
  </body>
</html>
