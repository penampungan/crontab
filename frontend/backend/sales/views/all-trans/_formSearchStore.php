<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use yii\helpers\ArrayHelper;

use common\models\Store;
use common\models\StoreSearch;

//$qryStore = Store::find()->select('OUTLET_CODE')->Where('FIND_IN_SET("'.Yii::$app->getUserOpt->user()['ACCESS_UNIX'].'", ACCESS_UNIX)');
$qryStore = Store::find()->Where('FIND_IN_SET(ACCESS_UNIX,"'.Yii::$app->getUserOpt->user()['ACCESS_UNIX'].'")')->all();
$valStoreMap = ArrayHelper::map($qryStore, 'OUTLET_CODE', 'OUTLET_NM');
$urlx = \yii\helpers\Url::to(['/master/satuan-select']);
$searchModel = new StoreSearch(['ACCESS_UNIX'=>Yii::$app->getUserOpt->user()['ACCESS_UNIX']]);
			$dataProvider1 = $searchModel->searchUserStore(Yii::$app->request->queryParams);
			$modelMenu=$dataProvider1->getModels();
print_r($valStoreMap);
?>

<div class="col-lg-4" style="padding-top:10px;margin-button:0px; height:35px; float:left">
<!--<div class="col-lg-3">!-->
	<?php $form = ActiveForm::begin([
			'id' => $model->formName().'store',
			'action'=>'/sales/all-trans',
			'options' => ['data-pjax' => true ]	
		]); ?>
	 
		<?php //=$form->field($model, 'TGL')->textInput([]) ?>
		<?= $form->field($model, 'OUTLET_ID')->widget(Select2::classname(), [
					'data' => $valStoreMap,
					'options'=>['placeholder'=>'Select ...'],
					'pluginOptions' => [
						'allowClear' => true,
						// 'ajax' => [
							// 'url' =>$urlx,
							// 'dataType' => 'json',
							// 'data' => new JsExpression('function(params) { 
									// return {q:params.term,outlet_code:0001}; 
								// }
							// ')
						// ],
					],
				])->label(false);
			?>
	   
	 
	<?php ActiveForm::end(); ?>
</div>
<!--</div>!-->


<?php
$this->registerJs("
	$('form#".$model->formName()."store').on('change',function(e){
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