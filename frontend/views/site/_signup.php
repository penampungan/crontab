<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use frontend\assets\AppAsset;
AppAsset::register($this);


?>
<div id="rslt-sign-view"></div>
<?php
	$url_dev = Url::base(true);
	//$path='/site/ambil-data';
	$path='/site/signup-front';
	$this->registerJs("			
		$(document).ready(function()
		{			
			
						$('SignupForm').on('beforeSubmit','SignupForm', function () {
							console.log('error');
							/* var form = $('SignupForm');
							 var stt = true;
							 // return false if form still have some validation errors
							 if (form.find('.has-error').length) {
								  return false;
							 };
							$.ajax({
								url:'/site/valid-signup-front',
								type: 'post',						
								data   : form.serialize(),
								success: function (response) 
								{
									 document.getElementById('rslt-sign-view').innerHTML=response;
									// console.log('internal server error');
								},
								error: function (xhr, ajaxOptions, thrownError) {
									alert(xhr.status);
									alert(thrownError);
								}
							});	 */
							//return false; 
							$.ajax({					
								url: '".$url_dev.$path."',
								type: 'GET',
								// data: {searchname: $('#searchname').val() , searchby:$('#searchby').val()},
								success: function (data) {
									document.getElementById('rslt-sign-view').innerHTML=data ;
									
								}
						  });
						});
			  });
			
	",$this::POS_READY);

?>
	


		
