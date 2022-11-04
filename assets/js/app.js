$("#form-login").submit(function (event) {
	
	if($("#uname").val() !== '' && $("#pw").val() !== ''){
		var formData = {
		  uname: $("#uname").val(),
		  pw: $("#pw").val()
		};
		
		$.ajax({
			type: "POST",
			url: "../admincrud/login",
			data: formData
		}).done(function (data) {
			if(data == '2'){
				swal({
					title: "Yay!",
					text: "Berhasil login!",
					type: "success",
					allowOutsideClick: false
				}).then(function () {
					location.reload();
				});
			}else if(data  == '1'){
				swal({
					title: "Maaf!",
					text: "Sandi anda salah!",
					type: "error"
				});
			}else if(data == '0'){
				swal({
					title: "Maaf!",
					text: "Username tidak ditemukan!",
					type: "error"
				});
			}
		});
	}else{
		swal({
			title: "Maaf!",
			text: "Form tidak boleh kosong!",
			type: "error"
		});
	}
	
    event.preventDefault();
});

$("#formpegawai").submit(function (event) {
	var formValues= $(this).serialize();
	
	Pace.restart();
	Pace.track(function () {
		$.post("../admincrud/tambah_pegawai", formValues, function(data){
			
			if(data == '1'){
				swal({
					title: "Yay!",
					text: "Data berhasil ditambahkan!",
					type: "success",
					allowOutsideClick: false
				}).then(function () {
					location.reload();
				});
			}else if(data == '0'){
				swal({
					title: "Maaf!",
					text: "Username telah terpakai!",
					type: "error"
				});
			}
			Pace.stop();
		});
	});

	event.preventDefault();
});

$('#btn-generate-nopeg').click(function(event){
	Pace.restart();
	Pace.track(function () {
		$.ajax({
			type: "POST",
			url: "../admincrud/getKodePegawai"
		}).done(function (data) {
			$('#nomorpegawai').val(data);
		});
	});
	
	event.preventDefault();
});

$("#logout").click(function(){
	$.post("../admincrud/signout", function(data){
		window.location = "../../";
	});
});
	
$("#formpekerjaanpegawai").submit(function (event) {
	
	var formValues= $(this).serialize();
	
	Pace.restart();
	Pace.track(function () {
	
		$.ajax({
			type: "POST",
			url: "../admincrud/tambahPekerjaanPegawai",
			data: formValues
		}).done(function (data) {
			if(data == '1'){
				swal({
					title: "Yay!",
					text: "Data berhasil disimpan!",
					type: "success",
					allowOutsideClick: false
				}).then(function () {
					location.reload();
				});
			}else if(data  == '0'){
				swal({
					title: "Maaf!",
					text: "No. pegawai telah terpakai, silahkan generate ulang!",
					type: "error"
				});
			}
			Pace.stop();
		});
	});
	
    event.preventDefault();
});

$("#formbenefit").submit(function (event) {
	
	var formValues= $(this).serialize();
	
	Pace.restart();
	Pace.track(function () {
	
		$.ajax({
			type: "POST",
			url: "../admincrud/tambahBenefit",
			data: formValues
		}).done(function (data) {
			if(data == '1'){
				swal({
					title: "Yay!",
					text: "Data berhasil disimpan!",
					type: "success",
					allowOutsideClick: false
				}).then(function () {
					location.reload();
				});
			}
			Pace.stop();
		});
	});
	
    event.preventDefault();
});

$("#formreimburse").submit(function (event) {
	
	var formValues= $(this).serialize();
	
	Pace.restart();
	Pace.track(function () {
		
		$.ajax({
			type: "POST",
			url: "../admincrud/tambahTipeReimburse",
			data: formValues
		}).done(function (data) {
			swal({
				title: "Yay!",
				text: "Data berhasil disimpan!",
				type: "success",
				allowOutsideClick: false
			}).then(function () {
				location.reload();
			});
			
			Pace.stop();
		});
	});
	
    event.preventDefault();
});

$("#formpermintaanreimburse").submit(function (event) {
	
	var formValues = new FormData($(this)[0]);
	
	Pace.restart();
	Pace.track(function () {
		
		$.ajax({
			type: "POST",
			url: "../admincrud/tambahReimburse",
			data: formValues,
			processData: false,
			contentType: false
		}).done(function (data) {
			if(data == 1){
				swal({
					title: "Yay!",
					text: "Data berhasil disimpan!",
					type: "success",
					allowOutsideClick: false
				}).then(function () {
					location.reload();
				});
			}else if(data == 0){
				swal({
					title: "Maaf!",
					text: "Nominal melebihi plafon yang ditentukan!",
					type: "error"
				});
			}
			
			Pace.stop();
		});
	});
	
    event.preventDefault();
});

$("#formpermintaankas").submit(function (event) {
	
	var formValues = new FormData($(this)[0]);
	
	Pace.restart();
	Pace.track(function () {
		
		$.ajax({
			type: "POST",
			url: "../admincrud/tambahKasDimuka",
			data: formValues,
			processData: false,
			contentType: false
		}).done(function (data) {
			swal({
				title: "Yay!",
				text: "Data berhasil disimpan!",
				type: "success",
				allowOutsideClick: false
			}).then(function () {
				location.reload();
			});
			
			Pace.stop();
		});
	});
	
    event.preventDefault();
});

$("#formuploadbukti").submit(function (event) {
	
	var formValues = new FormData($(this)[0]);
	
	Pace.restart();
	Pace.track(function () {
		
		$.ajax({
			type: "POST",
			url: "../admincrud/uploadBuktiKas",
			data: formValues,
			processData: false,
			contentType: false
		}).done(function (data) {
			swal({
				title: "Yay!",
				text: "Data berhasil disimpan!",
				type: "success",
				allowOutsideClick: false
			}).then(function () {
				location.reload();
			});
			
			Pace.stop();
		});
	});
	
    event.preventDefault();
});

$("#formpinjaman").submit(function (event) {
	
	var formValues = new FormData($(this)[0]);
	
	Pace.restart();
	Pace.track(function () {
		
		$.ajax({
			type: "POST",
			url: "../admincrud/tambahPinjaman",
			data: formValues,
			processData: false,
			contentType: false
		}).done(function (data) {
			swal({
				title: "Yay!",
				text: "Data berhasil disimpan!",
				type: "success",
				allowOutsideClick: false
			}).then(function () {
				location.reload();
			});
			
			Pace.stop();
		});
	});
	
    event.preventDefault();
});

$('#btn-go-ceklog').click(function(){
	if($('input[name="jobb"]:checked').val()){
	
		var tipemasuk = $('input[name="jobb"]:checked').val(), alasan = $('#alasan').val();
		
		Pace.restart();
		Pace.track(function () {
			
			$.ajax({
				type: "POST",
				url: "../admincrud/goAbsen",
				data: {tipemasuk:tipemasuk,alasan:alasan}
			}).done(function (data) {
				
				if(data == '1'){
					swal({
						title: "Yay!",
						text: "Data berhasil disimpan!",
						type: "success",
						allowOutsideClick: false
					}).then(function () {
						location.reload();
					});
				}else if(data == '0'){
					swal({
						title: "Maaf!",
						text: "Anda telah melakukan login sebelumnya!",
						type: "error",
						allowOutsideClick: false
					});
				}else if(data == '-1'){
					swal({
						title: "Maaf!",
						text: "Anda belum melakukan ceklog masuk untuk hari ini!",
						type: "error",
						allowOutsideClick: false
					});
				}else if(data == '-2'){
					swal({
						title: "Maaf!",
						text: "Anda belum melakukan ceklog istirahat keluar!",
						type: "error",
						allowOutsideClick: false
					});
				}else if(data == '-3'){
					swal({
						title: "Maaf!",
						text: "Anda sudah melakukan ceklog pulang!",
						type: "error",
						allowOutsideClick: false
					});
				}
				
				Pace.stop();
			});
		});
	
	}else{
		swal({
			title: "Maaf!",
			text: "Silahkan pilih tipe masuk!",
			type: "error",
			allowOutsideClick: false
		});
	}
	return false;
});

$("#form-lihat-rekap").submit(function (e) {
	var formValues = new FormData($(this)[0]);
	
	Pace.restart();
	Pace.track(function () {
		
		$.ajax({
			type: "POST",
			url: "../admincrud/lihatRekapAbsen",
			data: formValues,
			processData: false,
			contentType: false
		}).done(function (data) {
			$('#tampil-rekap').html(data);
			
			Pace.stop();
		});
	});
	
	e.preventDefault();
});

$("#formcuti").submit(function (e) {
	var formValues = new FormData($(this)[0]);
	
	Pace.restart();
	Pace.track(function () {
		
		$.ajax({
			type: "POST",
			url: "../admincrud/tambahCuti",
			data: formValues,
			processData: false,
			contentType: false
		}).done(function (data) {
			
			if(data == '1'){
				swal({
					title: "Yay!",
					text: "Data berhasil disimpan!",
					type: "success",
					allowOutsideClick: false
				}).then(function () {
					location.reload();
				});
			}else if(data == '0'){
				swal({
					title: "Maaf!",
					text: "Anda telah mengajukan cuti/ijin di hari tersebut!",
					type: "error",
					allowOutsideClick: false
				});
			}else if(data == '-1'){
				swal({
					title: "Maaf!",
					text: "Anda telah mengajukan lebih dari jumlah yang diatur dalam setahun!",
					type: "error",
					allowOutsideClick: false
				});
			}
			
			Pace.stop();
		});
	});
	
	e.preventDefault();
});

$("#formtipecuti").submit(function (event) {
	
	var formValues= $(this).serialize();
	
	Pace.restart();
	Pace.track(function () {
		
		$.ajax({
			type: "POST",
			url: "../admincrud/tambahTipeCuti",
			data: formValues
		}).done(function (data) {
			swal({
				title: "Yay!",
				text: "Data berhasil disimpan!",
				type: "success",
				allowOutsideClick: false
			}).then(function () {
				location.reload();
			});
			
			Pace.stop();
		});
	});
	
    event.preventDefault();
});

$("#formpengajuanlembur").submit(function (e) {
	var formValues = new FormData($(this)[0]);
	
	Pace.restart();
	Pace.track(function () {
		
		$.ajax({
			type: "POST",
			url: "../admincrud/tambahLembur",
			data: formValues,
			processData: false,
			contentType: false
		}).done(function (data) {
			
			if(data == '1'){
				swal({
					title: "Yay!",
					text: "Data berhasil disimpan!",
					type: "success",
					allowOutsideClick: false
				}).then(function () {
					location.reload();
				});
			}else if(data == '0'){
				swal({
					title: "Maaf!",
					text: "Anda telah mengajukan lembur di hari tersebut!",
					type: "error",
					allowOutsideClick: false
				});
			}
			
			Pace.stop();
		});
	});
	
	e.preventDefault();
});

$("#formfile").submit(function (e) {
	var formValues = new FormData($(this)[0]);
	
	Pace.restart();
	Pace.track(function () {
		
		$.ajax({
			type: "POST",
			url: "../admincrud/tambahFile",
			data: formValues,
			processData: false,
			contentType: false
		}).done(function (data) {
			
			if(data == '1'){
				swal({
					title: "Yay!",
					text: "Data berhasil disimpan!",
					type: "success",
					allowOutsideClick: false
				}).then(function () {
					location.reload();
				});
			}else if(data == '0'){
				swal({
					title: "Maaf!",
					text: "File melebihi kapasitas!",
					type: "error",
					allowOutsideClick: false
				});
			}
			
			Pace.stop();
		});
	});
	
	e.preventDefault();
});

$("#formaset").submit(function (event) {
	
	if($('#aset').val() !== ''){
		var formValues= $(this).serialize();
		
		Pace.restart();
		Pace.track(function () {
			
			$.ajax({
				type: "POST",
				url: "../admincrud/tambahPengajuanAset",
				data: formValues
			}).done(function (data) {
				swal({
					title: "Yay!",
					text: "Data berhasil disimpan!",
					type: "success",
					allowOutsideClick: false
				}).then(function () {
					location.reload();
				});
				
				Pace.stop();
			});
		});
	}
	
    event.preventDefault();
});

$("#formtambahaset").submit(function (event) {
	
	if($('#kategoriaset').val() !== ''){
		var formValues= $(this).serialize();
		
		Pace.restart();
		Pace.track(function () {
			
			$.ajax({
				type: "POST",
				url: "../admincrud/tambahAset",
				data: formValues
			}).done(function (data) {
				swal({
					title: "Yay!",
					text: "Data berhasil disimpan!",
					type: "success",
					allowOutsideClick: false
				}).then(function () {
					location.reload();
				});
				
				Pace.stop();
			});
		});
	}
	
    event.preventDefault();
});

$("#formtambahkategori").submit(function (event) {
	
	if($('#namakategori').val() !== ''){
		var formValues= $(this).serialize();
		
		Pace.restart();
		Pace.track(function () {
			
			$.ajax({
				type: "POST",
				url: "../admincrud/tambahKategoriAset",
				data: formValues
			}).done(function (data) {
				swal({
					title: "Yay!",
					text: "Data berhasil disimpan!",
					type: "success",
					allowOutsideClick: false
				}).then(function () {
					location.reload();
				});
				
				Pace.stop();
			});
		});
	}
	
    event.preventDefault();
});

$("#formkomponenupah").submit(function (event) {
	
	if($('#nama').val() !== ''){
		
		var pajak = 0;
		
		if($("#pajak").is(':checked')){
			pajak = 1;
		}
		
		Pace.restart();
		Pace.track(function () {
			
			$.ajax({
				type: "POST",
				url: "../admincrud/tambahKomponenUpah",
				data: { nama : $('#nama').val(),temp : $('#temp').val(),pajak : pajak, tipe : $("input[name='opsitipe']:checked").val() }
			}).done(function (data) {
				swal({
					title: "Yay!",
					text: "Data berhasil disimpan!",
					type: "success",
					allowOutsideClick: false
				}).then(function () {
					location.reload();
				});
				
				Pace.stop();
			});
		});
	}
	
    event.preventDefault();
});

$("#formgajipegawai").submit(function (event) {
	
	if($('#norek').val() !== '' && $('#namabank').val() !== '' && $('#pemilikrekening').val() !== ''){
		var pajak = 0;
			
		if($("#wajibpajak").is(':checked')){
			pajak = 1;
		}
		
		Pace.restart();
		Pace.track(function () {
			
			$.ajax({
				type: "POST",
				url: "../admincrud/tambahPengaturanGaji",
				data: {wajibpajak: pajak,ptkp: $('#ptkp').val(), perhitungan: $('#perhitungan').val(), waktugaji: $('#waktugaji').val(), norek: $('#norek').val(), namabank: $('#namabank').val(), pemilik: $('#pemilikrekening').val()}
			}).done(function (data) {
				swal({
					title: "Yay!",
					text: "Data berhasil disimpan!",
					type: "success",
					allowOutsideClick: false
				}).then(function () {
					location.reload();
				});
				
				Pace.stop();
			});
		});
	}
	
    event.preventDefault();
});

$("#formupdategajipegawai").submit(function (event) {
	
	if($('#norek').val() !== '' && $('#namabank').val() !== '' && $('#pemilikrekening').val() !== ''){
		var pajak = 0;
			
		if($("#wajibpajak").is(':checked')){
			pajak = 1;
		}
		
		Pace.restart();
		Pace.track(function () {
			
			$.ajax({
				type: "POST",
				url: "../admincrud/updatePengaturanGaji",
				data: {temppajak: $('#temppajak').val(), wajibpajak: pajak,ptkp: $('#ptkp').val(), perhitungan: $('#perhitungan').val(), waktugaji: $('#waktugaji').val(), norek: $('#norek').val(), namabank: $('#namabank').val(), pemilik: $('#pemilikrekening').val()}
			}).done(function (data) {
				swal({
					title: "Yay!",
					text: "Data berhasil disimpan!",
					type: "success",
					allowOutsideClick: false
				}).then(function () {
					location.reload();
				});
				
				Pace.stop();
			});
		});
	}
	
    event.preventDefault();
});

$("#formperusahaan").submit(function (e) {
	var formValues = new FormData($(this)[0]);
	
	Pace.restart();
	Pace.track(function () {
		
		$.ajax({
			type: "POST",
			url: "../admincrud/tambahInfoPerusahaan",
			data: formValues,
			processData: false,
			contentType: false
		}).done(function (data) {
			swal({
				title: "Yay!",
				text: "Data berhasil disimpan!",
				type: "success",
				allowOutsideClick: false
			}).then(function () {
				location.reload();
			});
			Pace.stop();
		});
	});
	
	e.preventDefault();
});

$("#formcabang").submit(function (event) {
	
	if($('#namacabang').val() !== ''){
		var formValues= $(this).serialize();
		
		Pace.restart();
		Pace.track(function () {
			
			$.ajax({
				type: "POST",
				url: "../admincrud/tambahCabang",
				data: formValues
			}).done(function (data) {
				swal({
					title: "Yay!",
					text: "Data berhasil disimpan!",
					type: "success",
					allowOutsideClick: false
				}).then(function () {
					location.reload();
				});
				
				Pace.stop();
			});
		});
	}
	
    event.preventDefault();
});

$("#formkerja").submit(function (event) {
	
	if($('#jammasuk').val() !== '' && $('#jampulang').val() !== '' && $('#istirahatmulai').val() !== '' && $('#istirahatselesai').val() !== ''){
		
		Pace.restart();
		Pace.track(function () {
			
			$.ajax({
				type: "POST",
				url: "../admincrud/tambahJadwalKerja",
				data: {nama : $("#hari option:selected").text(),hari : $('#hari').val(), masuk : $('#jammasuk').val(), pulang : $('#jampulang').val(), istirahatmulai : $('#istirahatmulai').val(), istirahatselesai : $('#istirahatselesai').val(), tempkerja : $('#tempkerja').val()}
			}).done(function (data) {
				
				if(data == '1'){
					swal({
						title: "Yay!",
						text: "Data berhasil disimpan!",
						type: "success",
						allowOutsideClick: false
					}).then(function () {
						location.reload();
					});
				}else if(data == '0'){
					swal({
						title: "Maaf!",
						text: "Hari tersebut sudah memiliki jadwal!",
						type: "error",
						allowOutsideClick: false
					});
				}

				Pace.stop();
			});
		});
		
	}
	
    event.preventDefault();
});

$("#formlibur").submit(function (event) {
	var tanggal = $('#tanggallibur').val(), keterangan = $('#keteranganlibur').val();
	
	if(keterangan !== ''){
	
		if($('.kosonglibur').length){
			$('#bodilibur').html('');
		}
		
		var ada = false;
		
		$(".rowlibur").each(function() {
			if($(this).data('val') == tanggal){
				ada = true;
			}
		});
		
		if(ada == false){
			
			var adautama = false;
			
			$(".barislibur").each(function() {
				if($(this).text() == tanggal){
					adautama = true;
				}
			});
			
			if(adautama == false){
				var newRow = '<tr><td class="rowlibur" data-val="' + tanggal + '">' + tanggal + '</td><td class="rowketerangan">' + keterangan + '</td><td><button class="btn btn-sm btn-danger" onclick="removeThis(this);"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td></tr>';
				$('#bodilibur').append(newRow);
			}else{
				swal({
					title: "Maaf!",
					text: "Hari libur pada tanggal tersebut sudah ada!",
					type: "error",
					allowOutsideClick: false
				});
			}
		}
	}else{
		swal({
			title: "Maaf!",
			text: "Silahkan isi keterangan libur!",
			type: "error",
			allowOutsideClick: false
		});
	}
	
	event.preventDefault();
});

$('#btn-simpan-libur').click(function(event){
	
	var arrtanggal = [], arrketerangan = [];
	
	$(".rowlibur").each(function() {
		arrtanggal.push($(this).data('val'));
	});
	
	$(".rowketerangan").each(function() {
		arrketerangan.push($(this).text());
	});
	
	
	if(arrtanggal.length > 0){
		Pace.restart();
		Pace.track(function () {
			$.ajax({
				type: "POST",
				url: "../admincrud/tambahLibur",
				data: {arrketerangan : arrketerangan, arrtanggal : arrtanggal}
			}).done(function (data) {
				swal({
					title: "Yay!",
					text: "Data berhasil disimpan!",
					type: "success",
					allowOutsideClick: false
				}).then(function () {
					location.reload();
				});
				
				Pace.stop();
			});
		});
	}
	event.preventDefault();
});

$('#btn-tambah-organisasi').click(function(event){
	
	if($('#namaorganisasi').val() !== ''){
		Pace.restart();
		Pace.track(function () {
			$.ajax({
				type: "POST",
				url: "../admincrud/tambahOrganisasi",
				data: {namaorganisasi : $('#namaorganisasi').val()}
			}).done(function (data) {
				
				swal({
					title: "Yay!",
					text: "Data berhasil disimpan!",
					type: "success",
					allowOutsideClick: false
				}).then(function () {
					var newRow = '<tr><td>' + ($('#bodiorganisasi tr').length + 1) + '</td><td>' +  $('#namaorganisasi').val() + '</td><td><a href="javascript:void(0);" class="btn btn-simple btn-danger btn-icon removeorganisasi" data-id="' + data + '"><i class="material-icons">close</i></a></td></tr>';
					$('#bodiorganisasi').append(newRow);
					$('#namaorganisasi').val('');
				});
				
				Pace.stop();
			});
		});
	}
	event.preventDefault();
});

$('#btn-tambah-level').click(function(event){
	
	if($('#namalevel').val() !== ''){
		Pace.restart();
		Pace.track(function () {
			$.ajax({
				type: "POST",
				url: "../admincrud/tambahLevel",
				data: {namalevel : $('#namalevel').val()}
			}).done(function (data) {
				
				swal({
					title: "Yay!",
					text: "Data berhasil disimpan!",
					type: "success",
					allowOutsideClick: false
				}).then(function () {
					var newRow = '<tr><td>' + ($('#bodilevel tr').length + 1) + '</td><td>' +  $('#namalevel').val() + '</td><td><a href="javascript:void(0);" class="btn btn-simple btn-danger btn-icon removelevel" data-id="' + data + '"><i class="material-icons">close</i></a></td></tr>';
					$('#bodilevel').append(newRow);
					$('#namalevel').val('');
				});
				
				Pace.stop();
			});
		});
	}
	event.preventDefault();
});

$('#btn-tambah-posisi').click(function(event){
	
	if($('#namaposisi').val() !== ''){
		Pace.restart();
		Pace.track(function () {
			$.ajax({
				type: "POST",
				url: "../admincrud/tambahPosisi",
				data: {namaposisi : $('#namaposisi').val()}
			}).done(function (data) {
				
				swal({
					title: "Yay!",
					text: "Data berhasil disimpan!",
					type: "success",
					allowOutsideClick: false
				}).then(function () {
					var newRow = '<tr><td>' + ($('#bodiposisi tr').length + 1) + '</td><td>' +  $('#namaposisi').val() + '</td><td><a href="javascript:void(0);" class="btn btn-simple btn-danger btn-icon removeposisi" data-id="' + data + '"><i class="material-icons">close</i></a></td></tr>';
					$('#bodiposisi').append(newRow);
					$('#namaposisi').val('');
				});
				
				Pace.stop();
			});
		});
	}
	event.preventDefault();
});

$("#btn-tambah-poin").click(function (event) {
	
	if($('#menitpoin').val() !== '' && $('#potonganpoin').val() !== ''){
		Pace.restart();
		Pace.track(function () {
		
			$.ajax({
				type: "POST",
				url: "../admincrud/tambahPoin",
				data: {menitpoin: $('#menitpoin').val(), potonganpoin: $('#potonganpoin').val()}
			}).done(function (data) {
				swal({
					title: "Yay!",
					text: "Data berhasil disimpan!",
					type: "success",
					allowOutsideClick: false
				}).then(function () {
					
				});
				
				Pace.stop();
			});
		});
		
	}else{
		swal({
			title: "Maaf!",
			text: "Silahkan isi info poin!",
			type: "error",
			allowOutsideClick: false
		});
	}
	
	event.preventDefault();
});

$("#formpermintaanbenefit").submit(function (event) {
	
	var formValues = new FormData($(this)[0]);
	
	if($('#benefit').val() !== ''){
		Pace.restart();
		Pace.track(function () {
			
			$.ajax({
				type: "POST",
				url: "../admincrud/tambahBenefitPegawai",
				data: formValues,
				processData: false,
				contentType: false
			}).done(function (data) {
				if(data == '1'){
					swal({
						title: "Yay!",
						text: "Data berhasil disimpan!",
						type: "success",
						allowOutsideClick: false
					}).then(function () {
						location.reload();
					});
				}else if(data == '0'){
					swal({
						title: "Maaf!",
						text: "Nominal melebihi plafon yang ditentukan!",
						type: "error"
					});
				}else if(data == '-1'){
					swal({
						title: "Maaf!",
						text: "Benefit telah melampaui tenggat / kadaluarsa!",
						type: "error"
					});
				}
				
				Pace.stop();
			});
		});
	}
	
    event.preventDefault();
});

$("#formupdatepegawai").submit(function (event) {
	
	var formValues = new FormData($(this)[0]);
	
	Pace.restart();
	Pace.track(function () {
		
		$.ajax({
			type: "POST",
			url: "../admincrud/updatePegawai",
			data: formValues,
			processData: false,
			contentType: false
		}).done(function (data) {
			if(data == '1'){
				swal({
					title: "Yay!",
					text: "Data berhasil disimpan!",
					type: "success",
					allowOutsideClick: false
				}).then(function () {
					location.reload();
				});
			}else if(data == '0'){
				swal({
					title: "Maaf!",
					text: "Email telah terpakai.",
					type: "error"
				});
			}else if(data == '-1'){
				swal({
					title: "Maaf!",
					text: "Username telah terpakai.",
					type: "error"
				});
			}
			Pace.stop();
		});
	});
	
    event.preventDefault();
});

$("#formkeluarga").submit(function (event) {
	
	var formValues= $(this).serialize();
	
	Pace.restart();
	Pace.track(function () {
	
		$.ajax({
			type: "POST",
			url: "../admincrud/tambahKeluarga",
			data: formValues
		}).done(function (data) {
			swal({
				title: "Yay!",
				text: "Data berhasil disimpan!",
				type: "success",
				allowOutsideClick: false
			}).then(function () {
				location.reload();
			});
			Pace.stop();
		});
	});
	
    event.preventDefault();
});

$("#formpendidikan").submit(function (event) {
	
	var formValues= $(this).serialize();
	
	Pace.restart();
	Pace.track(function () {
	
		$.ajax({
			type: "POST",
			url: "../admincrud/tambahPendidikan",
			data: formValues
		}).done(function (data) {
			swal({
				title: "Yay!",
				text: "Data berhasil disimpan!",
				type: "success",
				allowOutsideClick: false
			}).then(function () {
				location.reload();
			});
			Pace.stop();
		});
	});
	
    event.preventDefault();
});

$("#formpengalaman").submit(function (event) {
	
	var formValues= $(this).serialize();
	
	Pace.restart();
	Pace.track(function () {
	
		$.ajax({
			type: "POST",
			url: "../admincrud/tambahPengalaman",
			data: formValues
		}).done(function (data) {
			swal({
				title: "Yay!",
				text: "Data berhasil disimpan!",
				type: "success",
				allowOutsideClick: false
			}).then(function () {
				location.reload();
			});
			Pace.stop();
		});
	});
	
    event.preventDefault();
});

$("#formresetpass").submit(function (event) {
	var formValues= $(this).serialize();

	if($('#oldpassword').val() !=='' && $('#newpassword').val() !== '' && $('#confirmpassword').val() !== ''){
		if($('#newpassword').val() == $('#confirmpassword').val()){
			
			Pace.restart();
			Pace.track(function () {
			
				$.ajax({
					type: "POST",
					url: "../admincrud/resetPass",
					data: formValues
				}).done(function (data) {
					if(data == '1'){
						swal({
							title: "Yay!",
							text: "Password berhasil dirubah!",
							type: "success",
							allowOutsideClick: false
						}).then(function () {
							location.reload();
						});
					}else if(data == '0'){
						swal({
							title: "Maaf!",
							text: "Password lama tidak cocok dengan sistem!",
							type: "error"
						});
					}
					Pace.stop();
				});
			});
		
		}else{
			swal({
				title: "Maaf!",
				text: "Password baru & konfirmasi tidak sama!",
				type: "error"
			});
		}
	}else{
		swal({
			title: "Maaf!",
			text: "Salah satu password tidak boleh kosong!",
			type: "error"
		});
	}
	
    event.preventDefault();
});