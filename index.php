<?php
include("FacebookDebugger.php");

if (isset($_GET['request']))
{
    preg_match("/([0-9]+)/", $_GET['request'], $ocorrencias);
    $uid = $ocorrencias[1];
}

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    
    
$servername = "localhost";
$username = "root";
$password = "chuck";
$dbname = "popule";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "oi";
} 



$sql = "SELECT qtd FROM Profissoes WHERE profissao LIKE '".$_POST['op1']."'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $sql = "UPDATE Profissoes SET qtd=qtd+1 WHERE profissao='".$_POST['op1']."'";
        $conn->query($sql);
    }
} else {
    $sql = "INSERT INTO Profissoes (qtd, profissao)
                VALUES (1, '".$_POST['op1']."')";
    $conn->query($sql);
}

$sql = "SELECT qtd FROM Profissoes WHERE profissao LIKE '".$_POST['op2']."'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $sql = "UPDATE Profissoes SET qtd=qtd+1 WHERE profissao='".$_POST['op2']."'";
        $conn->query($sql);
    }
} else {
    $sql = "INSERT INTO Profissoes (qtd, profissao)
                VALUES (1, '".$_POST['op2']."')";
    $conn->query($sql);
}

$sql = "SELECT qtd FROM Profissoes WHERE profissao LIKE '".$_POST['op3']."'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $sql = "UPDATE Profissoes SET qtd=qtd+1 WHERE profissao='".$_POST['op3']."'";
        $conn->query($sql);    
    }
} else {
    $sql = "INSERT INTO Profissoes (qtd, profissao)
                VALUES (1, '".$_POST['op3']."')";
    $conn->query($sql);
}

$sql = "SELECT qtd FROM Profissoes WHERE profissao LIKE '".$_POST['op4']."'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $sql = "UPDATE Profissoes SET qtd=qtd+1 WHERE profissao='".$_POST['op4']."'";
        $conn->query($sql);
    }
} else {
    $sql = "INSERT INTO Profissoes (qtd, profissao)
                VALUES (1, '".$_POST['op4']."')";
    $conn->query($sql);
}

$sql = "SELECT qtd FROM Profissoes WHERE profissao LIKE '".$_POST['op5']."'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $sql = "UPDATE Profissoes SET qtd=qtd+1 WHERE profissao='".$_POST['op5']."'";
        $conn->query($sql);
    }
} else {
    $sql = "INSERT INTO Profissoes (qtd, profissao)
                VALUES (1, '".$_POST['op5']."')";
    $conn->query($sql);
}

$conn->close();
    
    
    $data = $_POST['dataimg'];

    list($type, $data) = explode(';', $data);
    list(, $data) = explode(',', $data);
    $data = base64_decode($data);

    if (!file_put_contents('./_imagens/' . $uid . '.png', $data))
    {
        die("Não foi possível salvar a imagem");
    }

    $confirmacao = true;
}
else
{
    $confirmacao = false;
}
?>
<!DOCTYPE html>
<html>
    <head>

        <title>Popule seu planeta</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
<?php if (isset($uid)): ?>            
            <meta property="og:url"           content="http://www.populeseuplaneta.com.br/<?= $uid ?>.html" />
            <meta property="og:type"          content="article" />
<?php else: ?>
            <meta property="og:url"           content="http://www.populeseuplaneta.com.br/" />
            <meta property="og:type"          content="website" />
        <?php endif; ?>

        <meta property="og:title"         content="Povoe seu planeta" />
        <meta property="og:description"   content="Quais os 5 profissionais você escolheria para te ajudar a povoar um novo planeta?" />

        <?php if (isset($uid)): ?>
            <meta property="og:image"         content="http://populeseuplaneta.com.br/_imagens/<?= $uid ?>.png"/>
            <meta property="og:image:width" content="636"/>
            <meta property="og:image:height" content="339"/>
<?php else: ?>
            <meta property="og:image"         content="http://populeseuplaneta.com.br/_imagens/povoe.png"/>
<?php endif; ?>


        <link href="_bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="_css/estilo.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
    </head>
    <body>
        <div id="teste">
            <!-- Script para compartilhamento gerado pelo proprio facebook -->
            <script>
                window.fbAsyncInit = function () {
                    FB.init({
                        appId: '755201107955943',
                        xfbml: true,
                        version: 'v2.6'
                    });
                };

                (function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) {
                        return;
                    }
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//connect.facebook.net/pt_BR/sdk.js";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));
            </script>

            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="_bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
            <script src="_js/funcoes.js"></script>
            <script src="_js/html2canvas.js"></script>
            <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>

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
                <?php if (!isset($uid)): ?>
                <div id="form">
                    <p><label for="campoProfissao">Profissão:</label><input type="text" onfocus="scroll()" onkeypress="return searchKeyPress(event)" name="txtProfissao" id="campoProfissao" size="20" maxlength="100" placeholder=""/></p>

                    <button type="submit" class="btn btn-primary center-block" onclick="adicionaProfissao()"   id="btnOk">Adicionar</button>

                    <form method="POST" action="<?= date('U') ?>.html" id="meuForm" enctype="multipart/form-data">
                        <input id="dataimg" name="dataimg" type="hidden" value="we">
                        <input type="hidden" name="uid" id="uid"  value="">
                        <input type="hidden" name="op1" id="op1"  value="">
                        <input type="hidden" name="op2" id="op2"  value="">
                        <input type="hidden" name="op3" id="op3"  value="">
                        <input type="hidden" name="op4" id="op4"  value="">
                        <input type="hidden" name="op5" id="op5"  value="">
                        <input type="submit" id="btnConfirma" disabled="true" style="display: none" class="btn btn-success center-block" value="Confirmar" /> 	
                    </form>
                </div>
                <br>
                <br>
                <?php endif; ?>

                <!-- aqui é a tabela que recebe as profissoes. É dela que se tira a imagem, e ela eh ocultada no fim -->
                <?php if (!isset($uid)): ?>
                    <div class="col-md-8 col-md-offset-2" id="tabela">
                        <table class="table table-inverse" id="tabelaProf">                              
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
                                    <td id='ultimatd'>5</td>
                                    <td class="valor" id='ultimatd2'></td>
                                </tr>	              
                            </tbody>
                        </table>
                    </div>
                    <?php endif; ?>

                <!-- Aqui é a div que receberá a foto gerada pela tabela -->
                <div class="col-md-8 col-md-offset-2" id="result">
                <?php if (isset($uid)): ?>
                        <img id="imagemFinal" src="http://populeseuplaneta.com.br/_imagens/<?= $uid ?>.png"/>
                <?php endif; ?>
                </div>

                <!-- Aqui é o botão de comaprtilhar que aparece ao final  -->
                <?php if (isset($uid)): ?>
                    <div id="compartilhar" class="fb-share-button" data-href="http://www.populeseuplaneta.com.br/<?= $uid ?>.html" data-layout="box_count" data-mobile-iframe="true"></div>
                    <div id="btaoJogar" style="clear: both; margin-top: 320px; margin-bottom: 30px;">
                    <button type="submit" class="btn btn-primary center-block" onclick="window.location='/'"   id="btnJogar">JOGAR</button>
                    </div>

                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "chuck";
                    $dbname = "popule";

                    // Create connection
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    $sql = "SELECT DISTINCT profissao, SUM( qtd ) as qtd FROM  Profissoes GROUP BY profissao ORDER BY SUM(qtd) DESC";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    
                    <script>
                    $(document).ready(function() {
                        $('#tabelaFinal').DataTable({
                            "bSort":false
                        });                        
                    } );
                    </script>
                    <script>
                        $.extend(true, $.fn.dataTable.defaults, {
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Portuguese-Brasil.json",
                            select: {
                                rows: {
                                    _: "",
                                    0: "",
                                    1: ""
                                }
                            }
                        },
                        "searching": true,
                        "ordering": true,
                        "responsive": true
                         });
                    </script>
                    
                    <table class="table table-inverse" id="tabelaFinal">
                        <thead> 
                            <tr>
                                <th>Profissões</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody >                           
                        <?php while($row = mysqli_fetch_array($result)): ?>
                                <tr>
                                    <td><?php echo $row['profissao']; ?></td>
                                    <td><?php echo $row['qtd']; ?></td>
                                </tr>   
                        <?php endwhile; ?>
                        </tbody>
                    </table>
                    
                <?php else: ?>
                    <div id="compartilhar" class="fb-share-button" style="display: none" data-href="http://populeseuplaneta.com.br/" data-layout="box_count" data-mobile-iframe="true"></div>
                <?php endif; ?>


                        
                <div id="publicidade" style="clear: both;  height: 120px; width: 100%; ">
                    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-5724611710873191"
                         data-ad-slot="3121466841"
                         data-ad-format="auto"></ins>
                    <script>
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>

                    
                    
                <div class="clearfix"></div>

            </div>


        </div>

        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-66682877-2', 'auto');
            ga('send', 'pageview');
        </script>

    </body>
</html>