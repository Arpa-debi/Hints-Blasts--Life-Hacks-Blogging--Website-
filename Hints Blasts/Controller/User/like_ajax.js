
function ajax_date(e){
	e.preventDefault();
	var ajax=new XMLHttpRequest();
    ajax.addEventListener('readystatechange',function(){
	if(ajax.readyState==4 && ajax.status==200){
		respone(ajax.responseText);
	}
});
ajax.open("post",ajax.php,true);
	ajax.send();
}

function respionse(result){
	alert(result);
}
