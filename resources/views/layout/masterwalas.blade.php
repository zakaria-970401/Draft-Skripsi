<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>@yield('judul')</title>

	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

	<!-- page specific plugin styles -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>


	<link rel="stylesheet" href="/assets/css/fonts.googleapis.com.css" />
	
	<!-- plugn external -->
	<link rel="stylesheet" href="/assets/css/plugin-datatables.css" />

	<link rel="stylesheet" href="/assets/js/plugin-datatables.js" />

	<script src="/assets/js/plugin-highcharts.js"></script>
	<script src="/assets/js/plugin-highcharts-modules-data.js"></script>
	<script src="/assets/js/plugin-highcharts-modules-drilldown.js"></script>
	<script src="/assets/js/plugin-highcharts-modules-exporting.js"></script>
	<script src="/assets/js/plugin-highcharts-modules-exportingdata.js"></script>

	<!-- ace styles -->
	<link rel="stylesheet" href="/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

	<!--[if lte IE 9]>
			<link rel="stylesheet" href="/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
	<link rel="stylesheet" href="/assets/css/ace-skins.min.css" />
	<link rel="stylesheet" href="/assets/css/ace-rtl.min.css" />

	<!--[if lte IE 9]>
		  <link rel="stylesheet" href="/assets/css/ace-ie.min.css" />
		<![endif]-->

	<!-- inline styles related to this page -->

	<!-- ace settings handler -->
	<script src="/assets/js/ace-extra.min.js"></script>

	<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

	<!--[if lte IE 8]>
		<script src="/assets/js/html5shiv.min.js"></script>
		<script src="/assets/js/respond.min.js"></script>
		<![endif]-->
</head>

<body class="no-skin">
	<div id="navbar" class="navbar navbar-default ace-save-state">
		<div class="navbar-container ace-save-state" id="navbar-container">
			<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
				<span class="sr-only">Toggle sidebar</span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>
			</button>

			<div class="navbar-header pull-left">
				<a href="#" class="navbar-brand">
                    <img src="/assets/images/avatars/logo.png" style="width: 150px" alt="">
				</a>
			</div>

			<div class="navbar-buttons navbar-header pull-right" role="navigation">
				<ul class="nav ace-nav">
					<li class="light-blue dropdown-modal">
						<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<img class="nav-user-photo" src=" {{ asset('foto_akunadmin/'.Auth::user()->foto)}}" style="width: 78px" alt="" alt="{{Auth::user()->nama}} Foto" />
							<span class="user-info">
								<small>Welcome,</small>
								{{Auth::user()->nama}}
							</span>
							<i class="ace-icon fa fa-caret-down"></i>
						</a>
						<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							<li>
							<a href="/walas/profile/{{Auth::user()->id}}">
									<i class="ace-icon fa fa-user"></i>
									Profile
								</a>
							</li>

							<li class="divider"></li>

							<li>
								<a href="#modal-logout" data-toggle="modal">
									<i class="ace-icon fa fa-power-off"></i>
									Logout
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.navbar-container -->
	</div>

	<div class="main-container ace-save-state" id="main-container">
		<div id="sidebar" class="sidebar responsive ace-save-state">
			<ul class="nav nav-list">
				<li class="">
					<a href="#">
						<i class="menu-icon fa fa-tachometer"></i>
						<span class="menu-text"> Dashboard WaliKelas </span>
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-list"></i>
						<span class="menu-text">
							Verifikasi Data
						</span>
						<b class="arrow fa fa-angle-down"></b>
					</a>
					<ul class="submenu">
						<li class="">
							<a href="/walas/bansos_anakdidik">
								<i class="menu-icon fa fa-caret-right"></i>
								Bansos Anak didik
							</a>
							<b class="arrow"></b>
						  </li>
						<li class="">
							<a href="/walas/get_hasil_dataverifikasi">
								<i class="menu-icon fa fa-caret-right"></i>
								Hasil Verifikasi Bansos
							</a>
							<b class="arrow"></b>
						  </li>
						</li>
					</ul>
				<li class="">
					<a href="#" class="dropdown-toggle">
						<i class="menu-icon fa fa-bar-chart"></i>
						<span class="menu-text">
							Analisa Data
						</span>
						<b class="arrow fa fa-angle-down"></b>
					</a>
					<ul class="submenu">
						<li class="">
							<a href="/admin/analisa_databansos">
								<i class="menu-icon fa fa-caret-right"></i>
								Bansos Anak Didik
							</a>
							<b class="arrow"></b>
						  </li>
						</li>
					</ul>
				<li class="">
				<a href="/walas/profile/{{Auth::user()->id}}">
						<i class="menu-icon fa fa-user"></i>
						<span class="menu-text"> Profile </span>
					</a>
					<b class="arrow"></b>
				</li>
				<li class="">
					<a href="#modal-logout" data-toggle="modal">
						<i class="menu-icon fa fa-power-off"></i>
						<span class="menu-text"> Logout </span>
					</a>
					<b class="arrow"></b>
				</li>
				</li>
			</ul><!-- /.nav-list -->

			<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
				<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
			</div>
		</div>

		<div class="main-content">
			@include('sweetalert::alert')
			@yield('konten')
		</div><!-- /.page-content -->

		<div class="footer">
			<div class="footer-inner">
				<div class="footer-content">
					<span class="bigger-120">
						<span class="red bolder">SMK KARYA GUNA JAYA</span>
						Ahmad Zakaria &copy; 2020
					</span>


				</div>
			</div>
		</div>

		<div class="modal fade" id="modal-logout" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
			  <div class="modal-content">
				<div class="modal-header">
				  <h3 class="modal-title">Tutup Aplikasi?</h3>
				</div>
		
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				  <a href="/walaslogout" class="btn btn-danger"><i class="fa fa-power-off"> Logout</a></i>
				</div>
			  </div>
			</div>
		

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
	</div>
	<
	
	
	<!-- /.main-container -->
	<!-- basic scripts -->

	<!--[if !IE]> -->
	<script src="/assets/js/jquery-2.1.4.min.js"></script>

	<!-- <![endif]-->

	<!--[if IE]>
<script src="/assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
	<script type="text/javascript">
		if ('ontouchstart' in document.documentElement) document.write("<script src='/assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
	</script>
	<script src="/assets/js/bootstrap.min.js"></script>

	<!-- page specific plugin scripts -->

	<!-- ace scripts -->
	<script src="/assets/js/ace-elements.min.js"></script>
	<script src="/assets/js/ace.min.js"></script>

	<script src="/assets/js/jquery.dataTables.min.js"></script>
	<script src="/assets/js/jquery.dataTables.bootstrap.min.js"></script>
	<script src="/assets/js/dataTables.buttons.min.js"></script>
	<script src="/assets/js/buttons.flash.min.js"></script>
	<script src="/assets/js/buttons.html5.min.js"></script>
	<script src="/assets/js/buttons.print.min.js"></script>
	<script src="/assets/js/buttons.colVis.min.js"></script>
	<script src="/assets/js/dataTables.select.min.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {

			
			//Plugin Table
			$('#myTable').DataTable();

			$('#upload_file').hide();

			$('#download_excel').hide();
			
			$('#upload_excel').hide();

			$('#input-confirm-password').hide();
			
			$('#excel-datatraining').hide();

			$('#status_yatim').hide();

			$('#disable-yatim').hide();
			$('#enable-yatim').hide();

			$('#enable-rumah').hide();

			$('#enable-pekerjaan').hide();
		
			$('#enable-sk').hide();
		
			$('#dataset').hide()

			$('#manual').hide()




			$('#btn_edit_akunsiswa').click(function(){
				$("#input-username").prop("disabled", false);
				$("#input-password").prop("disabled", false);
				$("#input-confirm-password").show();
			});

			$('#file_excel').on('change', function(){
            if  ($(this).val() === "Belum Ada") {
                 $('#download_excel').show()
             }
             else{
                 $('#download_excel').hide()
             }   
        });
			$('#jenis_hitung_naive').on('change', function(){
            if  ($(this).val() === "datasiswa") {
                 $('#dataset').show()
             }
             else{
                 $('#manual').hide()
             }   
        });

			$('#jenis_hitung_naive').on('change', function(){
            if  ($(this).val() === "manual") {
                 $('#manual').show()
             }
             else{
                 $('#dataset').hide()
             }   
        });

			$('#file_excel').on('change', function(){
            if  ($(this).val() === "Sudah Ada") {
                 $('#upload_excel').show()
             }
             else{
                 $('#upload_excel').hide()
             }   
        });

			$('#file_excel').on('change', function(){
            if  ($(this).val() === "Sudah Ada") {
                 $('#excel-datatraining').show()
                
             }
             else{
                 $('#excel-datatraining').hide()
             }   
        });

		 //Show hide Form Status Kelengkapan Orangtua
		 $('#status_kelengkapan_ortu').on('change',function()
                    {
                        if( $(this).val()==="Tidak Lengkap")
                        {
                           $("#status_yatim").show()
						   $('#disable-yatim').show()
                        }
                        else
                        {
                           $("#status_yatim").hide()
                        }
                    });

                //Hide Form SK Tidak mampu
                $('#sk_tidak_mampu').hide()

                //Show Hide Upload File SK Tidak Mampu
                $('#status_sk_tidak_mampu').on('change',function()
                    {
                        if( $(this).val()==="Ada")
                        {
                            $("#sk_tidak_mampu").show()
                        }
                        else
                        {
                             $("#sk_tidak_mampu").hide()
                        }
                  });

			$(function () {
				$('[data-toggle="tooltip"]').tooltip()
				})
		});


	</script>

	<!-- inline scripts related to this page -->
</body>

</html>