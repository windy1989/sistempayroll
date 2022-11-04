  <style>
	<?php 
		foreach($weekend as $day){ 
			if($day == 0){
				echo '.fc-sun { background-color: red !important; color: white !important;}';
			}
			if($day == 1){
				echo '.fc-mon { background-color: red !important; color: white !important;}';
			}
			if($day == 2){
				echo '.fc-tue { background-color: red !important; color: white !important;}';
			}
			if($day == 3){
				echo '.fc-wed { background-color: red !important; color: white !important;}';
			}
			if($day == 4){
				echo '.fc-thu { background-color: red !important; color: white !important;}';
			}
			if($day == 5){
				echo '.fc-fri { background-color: red !important; color: white !important;}';
			}
			if($day == 6){
				echo '.fc-sat { background-color: red !important; color: white !important;}';
			}
		} 
	?>
	.fc-day-number{
		font-size:25px !important;
	}
	.fc-time{
	   display : none;
	}
  </style>
  
  <div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="nav-center">
					<ul class="nav nav-pills nav-pills-warning nav-pills-icons" role="tablist">
						<li class="active">
							<a href="#1" role="tab" data-toggle="tab">
								<i class="material-icons">event</i> Kalender
							</a>
						</li>
						<li>
							<a href="#2" role="tab" data-toggle="tab">
								<i class="material-icons">account_balance_wallet</i> Gaji & THR
							</a>
						</li>
						<li>
							<a href="#3" role="tab" data-toggle="tab">
								<i class="material-icons">verified</i> Absensi
							</a>
						</li>
					</ul>
				</div>
				<div class="tab-content">
					<div class="tab-pane active" id="1">
						<div class="card">
							<div class="card-header">
								<!-- <h4 class="card-title">Description about product</h4>
								<p class="category">
									More information here
								</p> -->
							</div>
							<div class="card-content row">
								<div class="col-md-12">
									<div class="card">
										<div class="card-header card-header-text" data-background-color="purple">
											<h4 class="card-title">Kalender Kerja</h4>
										</div>
										<div class="card-content">
											<div id="fullCalendar"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="2">
						<div class="card">
							<div class="card-header">
								<!-- <h4 class="card-title">Description about product</h4>
								<p class="category">
									More information here
								</p> -->
							</div>
							<div class="card-content row">
								<div class="col-md-6">
									<div class="card">
										<div class="card-header card-header-text" data-background-color="purple">
											<h4 class="card-title">Laporan Gaji Terbayar</h4>
										</div>
										
										<div class="card-content">
											<div class="toolbar">
												<!-- Here you can write extra buttons/actions for the toolbar -->
												<input type="text" class="monthpicker" value="<?=date("Y-m")?>" id="tahunbulangaji" name="tahunbulangaji" autocomplete="off">
												<button class="btn btn-info btn-raised btn-round" id="btn-laporan-gaji">
													Generate Laporan
												</button>
											</div>
										</div>
										<!-- end content-->
									</div>
									<!--  end card  -->
								</div>
								<div class="col-md-6">
									<div class="card">
										<div class="card-header card-header-text" data-background-color="red">
											<h4 class="card-title">Laporan THR Terbayar</h4>
										</div>
										
										<div class="card-content">
											<div class="toolbar">
												<!-- Here you can write extra buttons/actions for the toolbar -->
												<select id="tahunthr" name="tahunthr">
													<?php for($i = date('Y') - 3;$i < date('Y') + 3;$i++){ ?>
													<option value="<?=$i?>" <?=$i == date('Y') ? 'selected' : ''?>><?=$i?></option>
													<?php } ?>
												</select>
												<button class="btn btn-primary btn-raised btn-round" id="btn-laporan-thr">
													Generate Laporan
												</button>
											</div>
										</div>
										<!-- end content-->
									</div>
									<!--  end card  -->
								</div>
								<div class="col-md-12">
									<div class="material-datatables">
										<div class="table-responsive" id="tampilgaji">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="3">
						<div class="card">
							<div class="card-header">
								<!-- <h4 class="card-title">Description about product</h4>
								<p class="category">
									More information here
								</p> -->
							</div>
							<div class="card-content row">
								<div class="col-md-12">
									<div class="card">
										<div class="card-header card-header-text" data-background-color="purple">
											<h4 class="card-title">Laporan Absensi Karyawan</h4>
										</div>
										
										<div class="card-content">
											<div class="toolbar">
												<!-- Here you can write extra buttons/actions for the toolbar -->
												<input type="text" class="monthpicker" value="<?=date("Y-m")?>" id="tahunbulanabsensi" name="tahunbulanabsensi" autocomplete="off">
												<button class="btn btn-info btn-raised btn-round" id="btn-laporan-absensi">
													Generate Laporan & Email
												</button>
											</div>
										</div>
										<!-- end content-->
									</div>
									<!--  end card  -->
								</div>
								<div class="col-md-6">
								
								</div>
								<div class="col-md-12">
									<div class="material-datatables">
										<div class="table-responsive" id="tampilabsensi">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
$(document).ready(function() {
	
	function startCalendarFull(){
        $calendar = $('#fullCalendar');

        today = new Date();
        y = today.getFullYear();
        m = today.getMonth();
        d = today.getDate();

        $calendar.fullCalendar({
            viewRender: function(view, element) {
                if (view.name != 'month'){
                    $(element).find('.fc-scroller').perfectScrollbar();
                }
            },
            header: {
				left: 'title',
				right: 'prev,next,today'
			},
			defaultDate: today,
			selectable: true,
			selectHelper: true,
            views: {
                month: {
                    titleFormat: 'MMMM YYYY'
                }
            },
			editable: false,
			eventLimit: true,
            events: [
				<?php foreach($infolibur as $rowlibur){ ?>
					{
						title: <?='"Libur '.$rowlibur["keterangan"].'"'?>,
						start: new Date(<?=date('Y',strtotime($rowlibur['tanggal']))?>, <?=date('n',strtotime($rowlibur['tanggal']))?>-1, <?=date('j',strtotime($rowlibur['tanggal']))?>),
						className: 'event-green'
					},
				<?php } ?>
			]
		});
    }
	
	startCalendarFull();
	
	$("#btn-laporan-gaji").click(function () {
		Pace.restart();
		Pace.track(function () {
		
			$.ajax({
				type: "POST",
				url: "../admincrud/laporanGaji",
				data: {tahunbulan : $('#tahunbulangaji').val()}
			}).done(function (data) {
				$('#tampilgaji').html(data);
				
				Pace.stop();
			});
		});
	});
	
	$("#btn-laporan-thr").click(function () {
		Pace.restart();
		Pace.track(function () {
		
			$.ajax({
				type: "POST",
				url: "../admincrud/laporanTHR",
				data: {tahunthr : $('#tahunthr').val()}
			}).done(function (data) {
				$('#tampilgaji').html(data);
				
				Pace.stop();
			});
		});
	});
	
	$("#btn-laporan-absensi").click(function () {
		Pace.restart();
		Pace.track(function () {
		
			$.ajax({
				type: "POST",
				url: "../admincrud/laporanAbsensi",
				data: {tahunbulan : $('#tahunbulanabsensi').val()}
			}).done(function (data) {
				$('#tampilabsensi').html(data);
				
				Pace.stop();
			});
		});
	});
	
	$('.monthpicker').datetimepicker({
		format: 'YYYY-MM',
		icons: {
			time: "fa fa-clock-o",
			date: "fa fa-calendar",
			up: "fa fa-chevron-up",
			down: "fa fa-chevron-down",
			previous: 'fa fa-chevron-left',
			next: 'fa fa-chevron-right',
			today: 'fa fa-screenshot',
			clear: 'fa fa-trash',
			close: 'fa fa-remove',
			inline: true
		}
	 });
});
</script>