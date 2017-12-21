<?php
use kartik\helpers\Html;
use kartik\detail\DetailView;
use kartik\widgets\DepDrop;
use yii\helpers\Url;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;
use kartik\widgets\ActiveField;
use kartik\widgets\ActiveForm;

	//echo $paramStore. ' - '.$paramACCESS_GROUP;
	
	 
				
	//Difinition Status.
	$aryStt= [
	  ['STATUS' => 0, 'STT_NM' => 'Disable'],		  
	  ['STATUS' => 1, 'STT_NM' => 'Enable']
	];
	$valStt = ArrayHelper::map($aryStt, 'STATUS', 'STT_NM');
	
	//Result Status value.
	function sttMsg($stt){
		if($stt==0){
			 return Html::decode('<span class="fa-stack fa-xl">
					  <i class="fa fa-circle-thin fa-stack-2x"  style="color:#25ca4f"></i>
					  <i class="fa fa-remove fa-stack-1x" style="color:#ee0b0b"></i>
					</span> Disable','',['title'=>'Disable']);
		}elseif($stt==1){
			return Html::decode('<span class="fa-stack fa-xl">
					  <i class="fa fa-circle-thin fa-stack-2x"  style="color:#25ca4f"></i>
					  <i class="fa fa-check fa-stack-1x" style="color:#01190d"></i>
					</span> Enable','',['title'=>'Enable']);
		}elseif($stt==3){
			return Html::decode('<span class="fa-stack fa-xl">
					  <i class="fa fa-circle-thin fa-stack-2x"  style="color:#25ca4f"></i>
					  <i class="fa fa-close fa-stack-1x" style="color:#ee0b0b"></i>
					</span> Delete','',['title'=>'Delete']);
		}
	};	
	
	
?>
<div style="font-family: verdana, arial, sans-serif ;font-size: 8pt">
<div class="row" >
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		
			<?php $form = ActiveForm::begin([
				'id'=>$model->formName().'input',
				'enableClientValidation' => false,
				//'action'=>'/master/item/create-satuan?id='.$paramStore,
				'options' => ['data-pjax' => false],
			]); ?>
				<?= $form->field($model, 'SATUAN_NM')->textInput(['maxlength' => true]) ?>

				<div class="form-group">
					<?=Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
				</div>
				
			<div id="status-area" style="display:none"></div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>
<?php
$this->registerJs("
	/* $.fn.modal.Constructor.prototype.enforceFocus = function(){};	
	$(document).on('beforeSubmit',".$model->formName()."input,function(event){   
		
		var form = $(".$model->formName()."input);
		$.ajax(
		{
			url : '/master/item/create-satuan?id=".$paramStore."',
			type: 'POST',
			data: form.serialize(),
			// contentType: false,
			// processData: false,
			success:function(output) 
			{
				$(".$model->formName()."input).trigger('reset');
				$('#message').html(output.meesage);
				//$('#resultForm').replaceWith(data);
				$('#status-area').fadeIn();
				$('#status-area').html('');
				$('#status-area').append('Added successfully');
				$('#status-area').fadeOut(3000);
				
	
			},
			error: function(jqXHR, textStatus, errorThrown) 
			{
				alert('gagal');      
			}
		});
		return false;
		//event.preventDefault(); // make stay modal.
	   //$(self).unbind();
	   //event.unbind(); //untuk mencegah berkali kali submit
	   //
	}); */
",$this::POS_READY);

$this->registerJs("
	$('form#".$model->formName()."input')on('beforeSubmit',function(e){
		var \$form=$(this);
		
		
	});
",$this::POS_READY);	 
?>
