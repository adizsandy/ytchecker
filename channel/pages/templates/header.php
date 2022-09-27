<body>
    <input type="hidden" id="reportKey" name="__report" value="<?php echo $_SESSION['_report_key_1'] ?>">
    <section class="vh-100" style="background-color: #eee;">
		<div class="container header">
			<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
				<a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
					<i class="fw-bold">[>]</i> VidGrids
				</a>

				<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
					<li><a href="/index.php" class="nav-link px-2 text-white">Home</a></li>
					<li><a href="/media/shorts.php" class="nav-link px-2 text-white">Shorts</a></li>
					<li><a href="/media/videos.php" class="nav-link px-2 text-white">Videos</a></li> 
				</ul>

				<form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
					<input type="search" class="hot-imput form-control form-control-dark text-bg-dark" placeholder="Search or Submit..." aria-label="Search or Submit">
				</form>

				<div class="text-end">
					<button type="button" class="v-grid-search btn btn-outline-light me-2">Search</button>
					<button type="button" class="v-grid-submit btn btn-warning">Submit</button>
				</div>
			</div>
		</div> 