<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script src="jquery.js" type="text/javascript"></script>
	<script type="text/javascript">
	//jquery
		;$(function(){
			$('#t1').on('keyup',function(){
				var v = $(this).val();
				var stateobj = {text:v};
				var title = 'testtitle';
				var url  = v ? '?t1='+v : 'index.php';
				history.pushState(stateobj,title,url);
				$.get('handle.php',{val:v},function(data){
					$('#t1').val(data);
					$('#d1').text(data);
				})
			})
			$(window).on('popstate',function(){
				if($(event)[0].state){
					value=$(event)[0].state.text;
					t1.value=value;
					$.get('handle.php',{val:value},function(data){
						$('#t1').val(data);
						$('#d1').text(data);
					})
				}else{
					$('#t1').val('');
					$('#d1').text('');
				}
			})
		})
	//origin
	    // window.onload=function(){
	    // 	t1.addEventListener('keyup',function(){
	    // 		var v=this.value;
	    // 		var stateobj={text:v};
	    // 		var title='testtitle';
	    // 		var url='?t1='+v;
	    // 		history.pushState(stateobj,title,url);
	    // 		$.get('handle.php',{val:v},function(data){
	    // 			t1.value=data;
	    // 			d1.innerHTML=data;
	    // 		});
	    // 	})
	    // 	window.addEventListener('popstate',function(){
	    // 		if(event.state){
		   //  		value=event.state.text;
		   //  		t1.value=value;
		   //  		$.get('handle.php',{val:value},function(data){
		   //  			d1.innerHTML=data;
		   //  		})
		   //  	}else{
		   //  		t1.value='';
		   //  		d1.innerHTML='';
		   //  	}
	    // 	})
	    // }
	</script>
</head>
<body>
	<input type="text" id="t1">
	<div id="d1"></div>
</body>
</html>