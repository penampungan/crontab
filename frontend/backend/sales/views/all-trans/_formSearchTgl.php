<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
?>

<div class="col-lg-12" style="padding-top:10px;margin-button:0px; height:35px; float:left">
<!--<div class="col-lg-3">!-->
	<?php $form = ActiveForm::begin([
			'id' => $model->formName().'tgl',
			'action'=>'/sales/all-trans',
			'options' => ['data-pjax' => true ]	
		]); ?>
	 
		<?php //=$form->field($model, 'TGL')->textInput([]) ?>
		<?=$form->field($model, 'TGL')->widget(DatePicker::classname(), [
						'options' => ['id'=>'form-tgl','placeholder' => 'Cari Tanggal'],
						'type' => DatePicker::TYPE_BUTTON,
							'pluginOptions' => [
								'todayHighlight' => true,
								'autoclose'=>true,
								'format' => 'yyyy-m-dd'						
							],
							'pluginEvents'=>[
								'show' => "function(e) {show}",
							],
						])->label(false);
			?>	
	 
	   
	 
	<?php ActiveForm::end(); ?>
</div>
<!--</div>!-->


<?php
$this->registerJs("
	$('form#".$model->formName()."tgl').on('change',function(e){
		var \$form=$(this);
		$.post(
			\$form.attr('action'),
			\$form.serialize()
		)
		.done(function(result){
			console.log(result);
			//if(result==1){
				 $.pjax.reload({container:'#gv-sales-rpt'});
			// }else{
				// $('#message').html(result.message);
			// } 
			
		}).fail(function(){
			console.log('Server Error');
		});		
		return false;
	});
",$this::POS_READY);	
?>