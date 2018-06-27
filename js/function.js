$(function(){
	
	var atual_fs,next_fs, prev_fs;
	
	$('.next').click(function(){
		
		atual_fs = $(this).parent();
		next_fs = $(this).parent().next();
		
		$('#progress li').eq($('fieldset').index(next_fs)).addClass('ativo');
		atual_fs.hide(800);
		next_fs.show(800);
	});

	
	
		$('.prev').click(function(){
		
		atual_fs = $(this).parent();
		prev_fs = $(this).parent().prev();
		
		$('#progress li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
		atual_fs.hide(800);
		prev_fs.show(800);
	});
	
	
		//$('#formulario input[type=submit]').click(function(){
		//return false;
	//});
	
	
	setTimeout(function() {
    $("#mensagem").fadeOut().empty();
    }, 5000);
});


function confirmacao(id) {
     var resposta = confirm("Deseja remover esse registro?");
 
     if (resposta == true) {
          window.location.href = "deleta.php?id="+id;
     }
}


var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");
  

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Senhas diferentes!");
	document.getElementById('botao').style.display = 'none';

	
  } else {
    confirm_password.setCustomValidity('');
	document.getElementById('botao').style.display = 'block';
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup =  validatePassword;




function mascaraData( campo ) {
        campo.value = campo.value.replace( /[^\d]/g, '' )
		                         .replace( /(\d{2})(\d)/, '$1/$2' )
                                .replace( /(\d{2})(\d)/, '$1/$2' );
        if ( campo.value.length > 10) campo.value = stop;
        else stop = campo.value;   
}

		 
		 
function mascaraTelefone( campo ) {
        campo.value = campo.value.replace( /[^\d]/g, '' )
                                 .replace( /^(\d\d)(\d)/, '($1) $2' )
                                 .replace( /(\d{5})(\d)/, '$1-$2' );
        if ( campo.value.length > 15 ) campo.value = stop;
        else stop = campo.value;    
}


