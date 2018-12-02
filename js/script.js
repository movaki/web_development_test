$(document).ready(function () {
	$('form').submit(function (e) {
		console.log('Отправка формы...');
		e.preventDefault();
		var data = $(this).serialize()
		$.post(
			'calc.php',
			data,
			function (res) {
				console.log(res);
				$('.result samp').text(res);
			}
		);
	});


	$('input[type="text"]').on('keyup change', function () {
		let obj = $(this).next().children().first();
		obj.val($(this).val());
	});

	$('input[type="range"]').on('input', function () {
		let obj = $(this).parent().prev().first();
		obj.val($(this).val());
	});


	$('input[name="isCap"]').on('change', function () {
		if ($('#summadd').prop('disabled') == false) {
			$('#summadd').val('');
			$('#summadd').prop('disabled', true);
			$('input[type="range"]').eq(1).prop('disabled', true);
		}
		else {
			$('#summadd').prop('disabled', false)
			$('input[type="range"]').eq(1).prop('disabled', false);
		};
	});


});
