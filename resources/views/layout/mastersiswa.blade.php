
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
        
        <!-- PLUGIN TABEL -->
		<link rel="stylesheet" href="/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="/assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="/assets/css/chosen.min.css" />
		<!-- PLUGIN DATATABLES -->
		<link rel="stylesheet" href="/assets/css/plugin-datatables.css" />

		<link rel="stylesheet" href="/assets/js/plugin-datatables.js" />
	

		<!-- ace styles -->
        <link rel="stylesheet" href="/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
        
        <link rel="stylesheet" href="/assets/css/chosen.min.css" />

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
						<li class="dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="{{asset ('foto_akunsiswa/'.Auth::user()->foto)}}" alt="" style=" width: 20px; height: 40px;"/>
								<span class="user-info">
									<small>Welcome,</small>
									{{Auth::user()->nama_siswa}}
								</span>
								<i class="ace-icon fa fa-caret-down"></i>
							</a>
							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="/siswa/profile">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>
								<li>
									<a href="/logout">
										<i class="ace-icon fa fa-power-off">
										Logout</i>
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
						<a href="/siswa">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard Siswa </span>
						</a>
						<b class="arrow"></b>
					</li>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-book"></i>
							<span class="menu-text">
								DATA AKADEMIK
							</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<ul class="submenu">
							<li class="">
								<a href="/siswa/daftar_kelas">
									<i class="menu-icon fa fa-arrow-right"></i>
									Ruang Kelas
                                </a>
                            </li>
						</ul>
						<ul class="submenu">
							<li class="">
								<a href="/siswa/data_siswa">
									<i class="menu-icon fa fa-arrow-right"></i>
									Data Siswa  
                                </a>
                            </li>
						</ul>
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-tasks"></i>
							<span class="menu-text">
								Program Bansos
							</span>
							<b class="arrow fa fa-angle-down"></b>
						</a>
						<ul class="submenu">
							<li class="">
								<a href="/siswa/daftar_bansos">
									<i class="menu-icon fa fa-arrow-right"></i>
									Daftar Program Bansos
                                </a>
                            </li>
						</ul>
						<ul class="submenu">
							<li class="">
								<a href="/siswa/hasil_bansos">
									<i class="menu-icon fa fa-arrow-right"></i>
									Hasil Keputusan Bansos  
                                </a>
                            </li>
						</ul>
                        <li class="">
                            <a href="/siswa/profile">
                                <i class="menu-icon fa fa-user"></i>
                                <span class="menu-text"> Profile </span>
                            </a>
                            <b class="arrow"></b>
                        </li>
                        <li class="">
							<a href="#modal-logout" data-toggle="modal">
                                <i class="menu-icon fa fa-power-off"></i>
                               	Logout </a>
                            <b class="arrow"></b>
                        </li>
                    </ul>
                </li>
            </ul>
            

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

			<div class="modal fade" id="modal-logout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
							<h3>
								Yakin Mau Keluar?
							</h3>
					  
					</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Nanti Dulu,</button>
								<a href="/logout" class="btn btn-danger"><i class="fa fa-sign-out"> Ya, Keluar</a></i>
							</div>
						</div>
					</form>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="/assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="/assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->

		<script src="/assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->
		<script src="/assets/js/ace-elements.min.js"></script>
		<script src="/assets/js/ace.min.js"></script>


		<script src="/assets/js/jquery-ui.custom.min.js"></script>
		<script src="/assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="/assets/js/jquery.dataTables.min.js"></script>
		<script src="/assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="/assets/js/dataTables.buttons.min.js"></script>
		<script src="/assets/js/buttons.flash.min.js"></script>
		<script src="/assets/js/buttons.html5.min.js"></script>
		<script src="/assets/js/buttons.print.min.js"></script>
		<script src="/assets/js/buttons.colVis.min.js"></script>
        <script src="/assets/js/dataTables.select.min.js"></script>
        
        <script src="/assets/js/chosen.jquery.min.js"></script>

		<script type="text/javascript">
            $(document).ready( function () {
			

                //Plugin Table
                $('#myTable').DataTable();
				
				$('#form_password').hide();
				$('#btn_batal_edit_akunsiswa').hide();
				$('#btn_simpan').hide();

                //Hide Form Status Yatim
                $('#status_yatim').hide()
				$('#input-confirm-password').hide();
				$('#foto-profile').hide();
				$('#excel-datatraining').hide();

				//SHOW HIDE CONFIRM PASSWORD
			$('#btn_edit_akunsiswa').click(function(){
				$("#foto-profile-before").hide();
				$("#foto-profile").show();
				$("#form_password").show();
				$("#btn_simpan").show();
				$("#btn_batal_edit_akunsiswa").show();
				$("#btn_edit_akunsiswa").hide();
			});
	
				//SHOW HIDE CONFIRM PASSWORD
			$('#btn_batal_edit_akunsiswa').click(function(){
				$("#foto-profile-before").show();
				$("#foto-profile").hide();
				$("#form_password").hide();
				$("#btn_simpan").hide();
				$("#btn_batal_edit_akunsiswa").hide();
				$("#btn_edit_akunsiswa").show();
			});
                //Show hide Form Status Kelengkapan Orangtua
                $('#status_kelengkapan_ortu').on('change',function()
                    {
                        if( $(this).val()==="Tidak Lengkap")
                        {
                           $("#status_yatim").show()
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
            });
		</script>

		<!-- inline scripts related to this page -->
	</body>
</html>
