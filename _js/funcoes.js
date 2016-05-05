function adicionaProfissao(){
	var profissao = document.getElementById('campoProfissao')
	var cont = 0;
	var verifica = false;	
	$('#tabelaProf > tbody  > tr').each(function() {
		if($(this).find(".valor").text() == "" ){
			$(this).find(".valor").html(profissao.value.toUpperCase());
                        var id = 'op' + (cont+1);		
			document.getElementById(id).value = profissao.value.toUpperCase();
			profissao.value = "";
			profissao.focus();
			if(verifica){
				document.getElementById('btnOk').disabled = true;
				document.getElementById('btnConfirma').disabled = false;
                                document.getElementById('btnConfirma').style.display = 'block';
                                document.getElementById('btnOk').style.display = 'none';
				profissao.disabled = true; 
				var resultDiv = document.getElementById("result");
				html2canvas(document.getElementById("tabelaProf"), {
				  onrendered: function(canvas) {
				     var img = canvas.toDataURL("image/png");
				     $('#dataimg').val(img);
				  }
				});
			}
			return;
		}
		else{
			cont += 1;
                        var id = 'op'+cont;	
                        document.getElementById(id).value = $(this).find(".valor").text();
			if(cont == 4)
				verifica = true;
		}
	});
		
}

function scroll(){
	window.scrollTo(0, 600,10,10,4);
}

function searchKeyPress(e)
{
    // look for window.event in case event isn't passed in
    e = e || window.event;
    if (e.keyCode == 13)
    {
        adicionaProfissao();
        return false;
    }
    return true;
}

function data(){
	var d = new Date();
	var n = d.getTime();
	return n;
}

