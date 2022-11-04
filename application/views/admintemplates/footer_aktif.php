<footer class="footer">
                <div class="container-fluid">
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="<?=base_url()?>">PT. XYZ</a>, the future is here
                    </p>
                </div>
            </footer>
        </div>
    </div>
    <div class="fixed-plugin">
        <!-- <div class="dropdown show-dropdown"> -->
		<div class="dropdown">
            <a href="#" data-toggle="dropdown">
                <i class="fa fa-cog fa-2x"> </i>
            </a>
            <ul class="dropdown-menu">
                <li class="header-title"> Sidebar Filters</li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger active-color">
                        <div class="badge-colors text-center">
                            <span class="badge filter badge-purple" data-color="purple"></span>
                            <span class="badge filter badge-blue" data-color="blue"></span>
                            <span class="badge filter badge-green" data-color="green"></span>
                            <span class="badge filter badge-orange" data-color="orange"></span>
                            <span class="badge filter badge-red" data-color="red"></span>
                            <span class="badge filter badge-rose active" data-color="rose"></span>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li class="header-title">Sidebar Background</li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger background-color">
                        <div class="text-center">
                            <span class="badge filter badge-white" data-color="white"></span>
                            <span class="badge filter badge-black active" data-color="black"></span>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger">
                        <p>Sidebar Mini</p>
                        <div class="togglebutton switch-sidebar-mini">
                            <label>
                                <input type="checkbox" unchecked="">
                            </label>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li class="adjustments-line">
                    <a href="javascript:void(0)" class="switch-trigger">
                        <p>Sidebar Image</p>
                        <div class="togglebutton switch-sidebar-image">
                            <label>
                                <input type="checkbox" checked="">
                            </label>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                </li>
                <li class="header-title">Images</li>
                <li class="active">
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="<?=base_url()?>assets/img/sidebar-1.jpg" alt="" />
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="<?=base_url()?>assets/img/sidebar-2.jpg" alt="" />
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="<?=base_url()?>assets/img/sidebar-3.jpg" alt="" />
                    </a>
                </li>
                <li>
                    <a class="img-holder switch-trigger" href="javascript:void(0)">
                        <img src="<?=base_url()?>assets/img/sidebar-4.jpg" alt="" />
                    </a>
                </li>
            </ul>
        </div>
    </div>
</body>
<!--   Core JS Files   -->

<script src="<?=base_url()?>assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/material.min.js" type="text/javascript"></script>
<script src="<?=base_url()?>assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="<?=base_url()?>assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="<?=base_url()?>assets/js/moment.min.js"></script>
<!--  Charts Plugin -->
<script src="<?=base_url()?>assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard -->
<script src="<?=base_url()?>assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin    -->
<script src="<?=base_url()?>assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="<?=base_url()?>assets/js/jquery.sharrre.js"></script>
<!-- DateTimePicker Plugin -->
<script src="<?=base_url()?>assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin -->
<script src="<?=base_url()?>assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin -->
<script src="<?=base_url()?>assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<!--<script src="<?=base_url()?>assets/js/jquery.select-bootstrap.js"></script>-->
<!-- Select Plugin -->
<script src="<?=base_url()?>assets/js/jquery.select-bootstrap.js"></script>

<!-- Sweet Alert 2 plugin -->
<script src="<?=base_url()?>assets/js/sweetalert2.js"></script>
<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="<?=base_url()?>assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin    -->
<script src="<?=base_url()?>assets/js/fullcalendar.min.js"></script>
<!-- TagsInput Plugin -->
<script src="<?=base_url()?>assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="<?=base_url()?>assets/js/material-dashboard.js"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.1.0"></script>
<script src="<?=base_url()?>assets/js/demo.js?v=2"></script>
<script src="<?=base_url()?>assets/js/app.js?v=162"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // Javascript method's body can be found in assets/js/demos.js
        /* demo.initDashboardPageCharts();

        demo.initVectorMap(); */
		demo.initFormExtendedDatetimepickers();
		$('[data-toggle="tooltip"]').tooltip({ container: 'body' });
		
		setInterval(function(){ 
			$.ajax({
				type: "POST",
				url: "<?=base_url()?>admincrud/getNotifikasi"
			}).done(function (data) {
				$('#jumnotif').text(data);
				Pace.stop();
			});
		}, 15000);
		
		var a = new AutoNumeric.multiple('.autonumeric', {
			digitGroupSeparator : '.',
			decimalCharacter : ',',
			decimalPlaces : 0,
		});
    });
</script>

</html>