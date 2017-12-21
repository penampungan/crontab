<?php
use yii\helpers\Url;
?>
<div id="home-view"></div>
<?php
	$url_dev = Url::base(true);
	//$path='/site/ambil-data';
	$path='/site/home-front';
	$this->registerJs("			
		$(document).ready(function()
		{
			
			 //$('#signup').on('load', function() {
				$.ajax({
					
					url: '".$url_dev.$path."',
				   type: 'GET',
				  // data: {searchname: $('#searchname').val() , searchby:$('#searchby').val()},
				  // data: {searchname: $('#searchname').val() , searchby:$('#searchby').val()},
				   success: function (data) {
					  //concole.log(data);
						//alert(data);	
						//return data;
						var element = document.getElementById('home-view').innerHTML=data ;
						//document.getElementById('home');
						//element.appendChild(data);
				   }

			  });
			//});
		}) 	
	",$this::POS_READY);

?>
	