<div class="content-wrapper" style=" margin-bottom: 65px;"></div>
	<section class="content">
		<?php
		$baca = 'index.php?page=';
		$bgp = isset($_GET['page']) ? $_GET['page'] : '';
		$page = inject_checker($connection, $bgp);
		if (empty($page)) {
			require_once 'switch/home.php';
		} else {

			switch ($page) {
				default:
				require_once 'switch/home.php';
					break;
				case 'home':
					require_once 'switch/home.php';
					break;

					// Data Kelas
				case 'kelas':
					$bct = isset($_GET['act']) ? $_GET['act'] : '';
					$act = inject_checker($connection, $bct);
					switch ($act) {
						case 'proses':
							include 'switch/kelas/proses.php';
							break;
						default:
							include 'switch/kelas/index.php';
							break;
					}

					break;
					// Kelas

					// Data Rombel
				case 'rombel':
					$bct = isset($_GET['act']) ? $_GET['act'] : '';
					$act = inject_checker($connection, $bct);
					switch ($act) {
						case 'proses':
							include 'switch/rombel/proses.php';
							break;
						default:
							include 'switch/rombel/index.php';
							break;
					}

					break;
					// rombel

					// Data siswa
				case 'siswa':
					$bct = isset($_GET['act']) ? $_GET['act'] : '';
					$act = inject_checker($connection, $bct);
					switch ($act) {
						case 'tambah':
							include 'switch/siswa/tambah.php';
							break;
						case 'edit':
							include 'switch/siswa/edit.php';
							break;
						case 'proses':
							include 'switch/siswa/proses.php';
							break;
						case 'lihat_kelas':
							include 'switch/siswa/lihat_kelas.php';
							break;
						case 'lihat_rombel':
							include 'switch/siswa/lihat_rombel.php';
							break;
						case 'lihat_data':
							include 'switch/siswa/lihat_data.php';
							break;
						default:
							include 'switch/siswa/index.php';
							break;
					}

					break;
					// siswa

				case 'tingkat':
					$bct = isset($_GET['act']) ? $_GET['act'] : '';
					$act = inject_checker($connection, $bct);
					switch ($act) {
						case 'tambah':
							include 'switch/tingkat/tambah.php';
							break;
						case 'edit':
							include 'switch/tingkat/edit.php';
							break;
						case 'proses':
							include 'switch/tingkat/proses.php';
							break;
						default:
							include 'switch/tingkat/index.php';
							break;
					}

					break;

					// Data Kategori Pembayaran Baju
				case 'ktgr-baju':
					$bct = isset($_GET['act']) ? $_GET['act'] : '';
					$act = inject_checker($connection, $bct);
					switch ($act) {
						case 'proses':
							include 'switch/ktgr-baju/proses.php';
							break;
						default:
							include 'switch/ktgr-baju/index.php';
							break;
					}

					break;

					// Data Kategori Pembayaran Baju
				case 'ktgr-antar':
					$bct = isset($_GET['act']) ? $_GET['act'] : '';
					$act = inject_checker($connection, $bct);
					switch ($act) {
						case 'proses':
							include 'switch/ktgr-antar/proses.php';
							break;
						default:
							include 'switch/ktgr-antar/index.php';
							break;
					}

					break;

					// Bayar Baju
				case 'bayar-baju':
					$bct = isset($_GET['act']) ? $_GET['act'] : '';
					$act = inject_checker($connection, $bct);
					switch ($act) {
						case 'tambah':
							include 'switch/bayar-baju/tambah.php';
							break;
						case 'lihat':
							include 'switch/bayar-baju/lihat.php';
							break;
						case 'proses':
							include 'switch/bayar-baju/proses.php';
							break;
						case 'export-pdf':
							include 'switch/bayar-baju/export-pdf.php';
							break;
						default:
							include 'switch/bayar-baju/index.php';
							break;
					}

					break;

					// Bayar Baju
				case 'bayar-antar':
					$bct = isset($_GET['act']) ? $_GET['act'] : '';
					$act = inject_checker($connection, $bct);
					switch ($act) {
						case 'tambah':
							include 'switch/bayar-antar/tambah.php';
							break;
						case 'lihat':
							include 'switch/bayar-antar/lihat.php';
							break;
						case 'proses':
							include 'switch/bayar-antar/proses.php';
							break;
						case 'export-pdf':
							include 'switch/bayar-antar/export-pdf.php';
							break;
						default:
							include 'switch/bayar-antar/index.php';
							break;
					}

					break;
					// Bayar Baju
				case 'laporan-baju':
					$bct = isset($_GET['act']) ? $_GET['act'] : '';
					$act = inject_checker($connection, $bct);
					switch ($act) {
						case 'hasil':
							include 'switch/laporan-baju/hasil.php';
							break;
						case 'edit':
							include 'switch/laporan-baju/edit.php';
							break;
						case 'data_kelas':
							include 'switch/laporan-baju/data_kelas.php';
							break;
						case 'data_rombel':
							include 'switch/laporan-baju/data_rombel.php';
							break;
						case 'lihat_data':
							include 'switch/laporan-baju/lihat_data.php';
							break;
						case 'proses':
							include 'switch/laporan-baju/proses.php';
							break;
						default:
							include 'switch/laporan-baju/index.php';
							break;
					}

					break;
				case 'laporan-antar':
					$bct = isset($_GET['act']) ? $_GET['act'] : '';
					$act = inject_checker($connection, $bct);
					switch ($act) {
						case 'hasil':
							include 'switch/laporan-antar/hasil.php';
							break;
						case 'edit':
							include 'switch/laporan-antar/edit.php';
							break;
						case 'data_kelas':
							include 'switch/laporan-antar/data_kelas.php';
							break;
						case 'data_rombel':
							include 'switch/laporan-antar/data_rombel.php';
							break;
						case 'lihat_data':
							include 'switch/laporan-antar/lihat_data.php';
							break;
						case 'proses':
							include 'switch/laporan-antar/proses.php';
							break;
						default:
							include 'switch/laporan-antar/index.php';
							break;
					}

					break;

					// Data pengaturan
				case 'pengaturan':
					$bct = isset($_GET['act']) ? $_GET['act'] : '';
					$act = inject_checker($connection, $bct);
					switch ($act) {
						case 'edit':
							include 'switch/pengaturan/edit.php';
							break;
						case 'proses':
							include 'switch/pengaturan/proses.php';
							break;
						case 'tambah':
							include 'switch/pengaturan/tambah.php';
							break;
						default:
							include 'switch/pengaturan/index.php';
							break;
					}

					break;
					// pengaturan

					// logout

				case 'logout':
					$bct = isset($_GET['act']) ? $_GET['act'] : '';
					$act = inject_checker($connection, $bct);
					switch ($act) {
						default:
							include 'logout.php';
							break;
					}

					break;
			}
		}
		?>
	</section>
</div>