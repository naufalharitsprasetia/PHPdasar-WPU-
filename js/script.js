$(document).ready(function() {

	// Hilangkan Tombol Cari
	$('#tombol-cari').hide();

	// event ketika keyword ditulis
	$('#keyword').on('keyup', function() {
		// Munculkan icon Loading
		$('.loader').show();




		// AJAX menggunakan load
		$('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());
	
		// $.get()
		$.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data) {

			$('container').html(data);
			$('.loader').hide();

		})


	});
});
