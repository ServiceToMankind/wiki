<?php defined('BLUDIT') or die('Bludit CMS.'); ?>

<div class="d-flex align-items-center mb-4">
	<h2 class="m-0"><i class="bi bi-bookmark"></i><?php $L->p('New category') ?></h2>
	<div class="ms-auto">
		<button id="btnSave" type="button" class="btn btn-primary btn-sm"><?php $L->p('Save') ?></button>
		<a id="btnCancel" class="btn btn-secondary btn-sm" href="<?php echo HTML_PATH_ADMIN_ROOT . 'categories' ?>" role="button"><?php $L->p('Cancel') ?></a>
	</div>
</div>

<?php
echo Bootstrap::formInputText(array(
	'id' => 'name',
	'name' => 'name',
	'label' => $L->g('Name'),
	'value' => isset($_POST['category']) ? $_POST['category'] : ''
));

echo Bootstrap::formTextarea(array(
	'id' => 'description',
	'name' => 'description',
	'label' => $L->g('Description'),
	'value' => isset($_POST['description']) ? $_POST['description'] : '',
	'rows' => 5
));
?>

<script>
	$(document).ready(function() {
		$('#btnSave').on('click', function() {
			var name = $('#name').val();

			if (name.length < 1) {
				showAlertError("<?php $L->p('Complete all fields') ?>");
				return false;
			}

			var args = {
				name: name,
				description: $('#description').val()
			};
			api.createCategory(args).then(function(key) {
				logs('Category created. Key: ' + key);
				window.location.replace('<?php echo HTML_PATH_ADMIN_ROOT . 'categories' ?>');
			});
			return true;
		});
	});
</script>