$(function(){
	// auto reload
		$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
				}
			});
		$.ajax({
				url: '../get_kabupaten',
				type: 'post',
				dataType: 'json',
				success: function(data){
						$('.kabupaten').append(data);
				}
			});

	function detail_piutang(){
		$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
				}
			});
		const id = $('.pinjamanPiutang').val();
		$.ajax({
				url: '../random_anggota',
				data: {id : id},
				type: 'post',
				dataType: 'json',
				success: function(data){
					$('.nama').val(data[0].nama);
					$('.alamat').val(data[0].alamat);
					$('.kelurahan').val(data[0].nama_kelurahan);
				}
			});
	}


	// event

	$('.kabupaten').change(function(){
		$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
				}
			});
		const id = $(this).val();
		$.ajax({
				url: '../get_kecamatan',
				data: {id : id},
				type: 'post',
				dataType: 'json',
				success: function(data){
					$('.kecamatan').append(data);
				}
			});
	});

	$('.kecamatan').change(function(){
		$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
				}
			});
		const id = $(this).val();
		console.log(id);
		$.ajax({
				url: '../get_kelurahan',
				data: {id : id},
				type: 'post',
				dataType: 'json',
				success: function(data){
					$('.kelurahan').append(data);
				}
			});
	});

	$('.select_type').change(function(){
		const type = $(this).val();
		if(type == "1"){
			$('.control_type').attr('hidden', ' ');
			$('.name').attr('placeholder', 'Nama Bagian');
		}
		if(type == "2"){
			$('.control_type').removeAttr('hidden', ' ');
			$('.name').attr('placeholder', 'Nama Sub Bagian');
		}
	});

	$('.klasifikasi').change(function(){
		$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
				}
			});
		const id = $(this).val();
		$.ajax({
				url: '../getKlasifikasi',
				data: {id : id},
				type: 'post',
				dataType: 'json',
				success: function(data){
					$('.angsuran').val(data[0].jangkawaktu);
					$('.bunga').val(data[0].jasa);	
				}
			});
		
	});

	$('.id_anggota').change(function(){
		$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
				}
			});
		const id = $(this).val();
		console.log(id);
		$.ajax({
				url: '../random_anggota',
				data: {id : id},
				type: 'post',
				dataType: 'json',
				success: function(data){
					$('.nama').val(data[0].nama);
					$('.alamat').val(data[0].alamat);
					$('.kelurahan').val(data[0].nama_kelurahan);
				}
			});
		
	});

	$('.pinjaman').change(function(){
		const pinjaman = $(this).val();
		const bunga = $('.bunga').val();
		const angsuran = $('.angsuran').val();
		const total_bunga = bunga * (pinjaman/100);
		const cicilan = pinjaman + total_bunga / angsuran;
		$('.cicilan').val(cicilan);

	});

	$('.pinjamanPiutang').change(function(){
		$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
				}
			});
		const id = $(this).val();
		$.ajax({
				url: '../get_pinjaman',
				data: {id : id},
				type: 'post',
				dataType: 'json',
				success: function(data){
					console.log(data);
					$('.id_anggota').val(data[0].idanggota);
					$('.cicilan').val(data[0].besarcicilan);
					$('.angsuran').val(data[0].jangkawaktu);
					$('.pinjaman').val(data[0].jumlah);
					detail_piutang();
				}
			});
	});
});