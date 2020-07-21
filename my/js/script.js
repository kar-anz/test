$( document ).ready(function() {
    $("#check1").click(
		function(){
			sendAjaxForm('result_form', 'register', '../wp-content/themes/your_theme/my/index1.php');
			return false; 
		}
	);
});
 
function sendAjaxForm(result_form, register, url) {
    jQuery.ajax({
        url:     url, //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        data: jQuery("#"+register).serialize(),  // Сеарилизуем объект
        success: function(response) { //Данные отправлены успешно
        	result = jQuery.parseJSON(response);
        	document.getElementById(result_form).innerHTML = "Имя: "+result.name+"<br>login: "+result.login+"<br>email: "+result.email+"<br>password: "+result.passwordone;
    	},
		    	error: function(response) { // Данные не отправлены
    		document.getElementById(result_form).innerHTML = "Ошибка. Данные не отправленны.";
    	}
 	});
}