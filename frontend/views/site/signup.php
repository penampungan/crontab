<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
dmstr\web\AdminLteAsset::register($this);
use frontend\models\SignupForm;
	$model = new SignupForm();
?>

<div class="register-box">
	<div class="register-box-body">
		<div class="row">			
			<p>Please fill out the following fields to signup:</p>
			<?php $form = ActiveForm::begin(['id' => 'form-signup','action'=>'/site/signup']); ?>

				<?= $form->field($model, 'username')->textInput() ?>

				<?= $form->field($model, 'email') ?>

				<?= $form->field($model, 'password')->passwordInput() ?>

				<div class="form-group">
					<?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
				</div>

			<?php ActiveForm::end(); ?>
		</div>
		<div class="social-auth-links text-center">
			<p>- OR -</p>
			<a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
			Facebook</a>
			<a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
			Google+</a>
		</div>

		<a href="login.html" class="text-center">I already have a membership</a>	
	</div>		
</div>

<?php
$this->registerJs("			
	/* $(document).ready(function()
	{		
		 $('sss').focus();
		// document.getElementById('sss').focus();
		
	}); */
",$this::POS_READY);

?>