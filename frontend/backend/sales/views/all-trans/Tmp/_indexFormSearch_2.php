<?php
 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
 
/* @var $this yii\web\View */
/* @var $model app\models\Countries */
/* @var $form yii\widgets\ActiveForm */
?>
 
<?php
 
$this->registerJs('
	/* $("document").ready(function(){ 
        $("#sales-form-search").on(function() {
            //$.pjax.reload({container:"#gv-sales-rpt"});  //Reload GridView
			// var form = $("sales-form-search").serializeArray();
			 
			 // view = {};
			  // for (var i in form) {
				// view[form[i].TGL] = form[i].value;
			  // }
			  // console.log(view);
				// var values = {};

				// $.each($("sales-form-search").serializeArray(), function (i, field) {
					// values[field.TGL] = field.value;
				// });
				// var getValue = function (valueName) {
					// return values[valueName];
				// };
				// var first = getValue("TGL");
				// console.log(values);
				
				// var dataArray = $("#sales-form-search").serializeArray(),
					// dataObj = {};

				// $(dataArray).each(function(i, field){
				  // dataObj[field.name] = field.value;
				// });
				
				 // console.log(dataObj["TGL"]);
        });
    }); */
',$this::POS_READY);

$this->registerJs('
	$("document").ready(function(){ 
      $("#new_country").on("pjax:end", function() {
			//$.fn.modal.Constructor.prototype.enforceFocus = function(){};	
				//$(document).on("submit","#x",function(event){   
				   // $.pjax.reload({container:"#countries"});  //Reload GridView
					//var dataObjX = $("#x").serializeObject();
					//var dataArray = JSON.stringify($("#x").serializeArray());
					
					//SERIALIZER -ptr.nov
					var dataArray = $("#x").serializeArray();
					dataObj = {};

					$(dataArray).each(function(i, field){
					  dataObj[field.name] = field.value;
					 // dataObj["asd"] = "123";
					});
					
					// $.map(dataArray, function(n, i){
						// dataObj[n["name"]] = n["value"];
					// });
				   //console.log(dataObj);
					
					//return false; 
				   //var form = $("#x").serializeArray();
				   // var values = {};
				   // $.each($("#x").serializeArray(), function (i, field) {
						// dataObj[field.TGL] = field.value;
					// });
					var getValue = function (valueName) {
						return dataObj[valueName];
					};
						var first = getValue("TransAllStoreSearch[TGL]");
				   // console.log(first);
				//});
        });
    });
',$this::POS_END);

?>
 
<div class="countries-form">
 
<?php yii\widgets\Pjax::begin(['id' => 'new_country']) ?>
<?php $form = ActiveForm::begin([
		'id' => 'x',
	'options' => ['data-pjax' => true ]
	
	]); ?>
 
    <?= $form->field($model, 'ACCESS_UNIX')->textInput([]) ?>
 
 
    <div class="form-group">
        <?=Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
 
<?php ActiveForm::end(); ?>
<?php yii\widgets\Pjax::end() ?>
</div>