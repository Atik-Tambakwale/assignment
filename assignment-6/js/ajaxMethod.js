
$("#imageUpload").submit(function (e) {
	e.preventDefault();
	$("#imageUpload").ajaxSubmit({
		dataType: 'JSON',
		beforeSubmit: function () {
			// $(progressbar).children().html('0%');
		},
		uploadProgress: function (event, position, total, percentComplete) {
			// $(progressbar).children().html(percentComplete + '%');
			// $(progressbar).children().css('min-width', percentComplete + '%');
		},
		success: function (data) {
			document.write(data);
		},
	});
});