<?php $confirmacao = empty($_POST['dataimg']) ? true : false; ?>
<!DOCTYPE html>
<html>
<head>

	<title>Popule seu planeta</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta property="og:url"           content="http://www.populeseuplaneta.com.br/index.php" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Povoe seu planeta" />
	<meta property="og:description"   content="Quais os 5 profissionais você escolheria para te ajudar a povoar um novo planeta?" />

	<meta property="og:image"         content="http://localhost:8888/_imagens/1462154932068.jpg"/>
	
	
    <link href="_bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="_css/estilo.css">
</head>
<body>

    	<!-- Script para compartilhamento gerado pelo proprio facebook -->
		<script>
		  window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '755201107955943',
		      xfbml      : true,
		      version    : 'v2.6'
		    });
		  };

		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "//connect.facebook.net/en_US/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
		</script>

			    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	    <!-- Include all compiled plugins (below), or include individual files as needed -->
	    <script src="_bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
		<script src="_js/funcoes.js"></script>
		<script src="_js/html2canvas.js"></script>


	<div id="interface">
	
		<header id="cabecalho">
		    <h1>Povoe seu planeta</h1>
		</header>
	    <div id="texto">
		    <p>
		    	Você foi escolhido para povoar um planeta recentemente descoberto. Este planeta é perfeitamente igual a Terra, porém, como nunca foi habitado, não possui nenhum tipo de tecnologia ou produtos criados pelo homem, possui apenas os recursos naturais (animais, árvores, frutas, água, etc.).
		    	Você deve escolher mais 5 adultos, profissionais em alguma área, para te acompanharem nessa missão. Você e estes adultos serão os responsáveis por povoar e transmitir conhecimento para os futuros habitantes desse novo planeta.	<br>	    	
		    </p>
		    <br>
		    <h2>
		    	Quais os 5 profissionais você levaria com você?
		    </h2>
		</div>

		<!-- Aqui é onde escreve as profissoes e o botao add -->
		<div id="form">
		    <p><label for="campoProfissao">Profissão:</label><input type="text" onfocus="scroll()" onkeypress="return searchKeyPress(event)" name="txtProfissao" id="campoProfissao" size="20" maxlength="100" placeholder="diferencie masculino e feminino"/></p>

		    <button type="submit" class="btn btn-primary-outline center-block" onclick="adicionaProfissao()"   id="btnOk">Adicionar</button>
		    
		   	<form method="POST" action="" id="meuForm">
		   		<input id="dataimg" name="dataimg" type="hidden" value="we">
		   		<input type="hidden" name="uid" id="uid"  value="">	
		    	<input type="submit" id="btnConfirma" disabled="true" class="btn btn-success-outline center-block" value="Confirmar" /> 	
		    </form>
	    </div>
	    <br>
	    <br>

	    <!-- aqui é a tabela que recebe as profissoes. É dela que se tira a imagem, e ela eh ocultada no fim -->
	    <div class="col-md-8 col-md-offset-2" id="tabela">
	          <table class="table table-inverse" id="tabelaProf" <?php echo $confirmacao ? '' : 'style="display:none"';?>>
	            <thead>
	              <tr>
	                <th>#</th>
	                <th>Profissões</th>
	              </tr>
	            </thead>
	            <tbody >
	            	<tr>
	            		<td>1</td>
	            		<td class="valor"></td>
	            	</tr>
	            	<tr>
	            		<td>2</td>
	            		<td class="valor"></td>
	            	</tr>
	            	<tr>
	            		<td>3</td>
	            		<td class="valor"></td>
	            	</tr>
	            	<tr>
	            		<td>4</td>
	            		<td class="valor"></td>
	            	</tr>
	            	<tr>
	            		<td>5</td>
	            		<td class="valor"></td>
	            	</tr>	              
	            </tbody>
	          </table>
	    </div>

	    <!-- Aqui é a div que receberá a foto gerada pela tabela -->
		<div class="col-md-8 col-md-offset-2" id="result">
			<?php if(!$confirmacao): ?>
			<img src="<?php echo $_POST['dataimg']; ?>"/>
			<?php endif; ?>
		</div>

		<!-- Aqui é o botão de comaprtilhar que aparece ao final  -->
		<?php if(!$confirmacao): ?>
		<div id="compartilhar" class="fb-share-button" data-href="http://populeseuplaneta.com.br/" data-layout="box_count" data-mobile-iframe="true"></div>
		<?php endif; ?>

		<div class="clearfix"></div>

		<!-- Script de propaganda do google adsense -->
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- Teste -->
		<ins class="adsbygoogle"
		     style="display:inline-block;width:300px;height:600px"
		     data-ad-client="ca-pub-4339315490262395"
		     data-ad-slot="8420159869"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>

	</div>
</body>
</html>