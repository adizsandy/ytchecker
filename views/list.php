<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>YT Checker</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  </head>
  <body>
    <input type="hidden" name="__report" value="<?php $_SESSION['_report_key_1'] ?>">
    <section class="vh-100" style="background-color: #eee;">
		<div class="container h-100"> 
			<div id="gallery" class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-lg-12 col-xl-11">
					<div class="card text-black" style="border-radius: 25px;">
						<div class="card-body p-md-5">
							<div class="row justify-content-center">
								<div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

									<p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Add Video ID</p>

									<form id="submitForm" class="mx-1 mx-md-12">

										<div class="d-flex align-items-center mb-4">
											<i class="fas fa-user fa-lg me-3 fa-fw"></i>
											<div class="form-outline flex-fill mb-0">
											<input type="text" id="form3Example1c" class="form-control" /> 
											</div>
										</div> 

										<div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
											<button id="submitBtn" type="button" class="btn btn-primary btn-lg">Submit</button> 
										</div>

									</form>

								</div> 
							</div>
							<div class="row justify-content-center">
								<div id="youtube" class="row d-flex"></div> 
							</div> 
						</div>
					</div>
				</div>
			</div> 
		</div>
	</section>  
	<script>  
		function getRandomArbitrary(min, max) {
		  	return Math.random() * (max - min) + min;
		}

		function populate() { 
			var idArr = [
				"ynN6qGKXegg",
				"D3uA000xkbQ",
				"eNPgpAJ54tc",
				"yzoeI6vBG4g",
				"vNKBWr_okx8",
				"pTQfelrPl_Q",
				"v2mWvj24Zq0",
				"AvfTdKhyLVs",
				"W5B-pTRsqf8",
				"9YQar77K4Xs",
				"J0tsI8gyR3w",
				"GW6-Gf3-tgo",
				"PlkdtFVR8B0",
				"BKnqaKE430c",
				"r2XI3_8qeLA",
				"rdoCGBkeaCk",
				"ZxjjghvVe0k",
				"bEuvR-R28dI",
				"OTHpSiWS-NI",
				"gEAwhlJElqQ" 
			];
			localStorage.setItem('idItem', JSON.stringify(idArr)); 
		}
		
		function playAll() {
			var videoIds = localStorage.getItem('idItem');
			var vidArr = JSON.parse(videoIds); 
			$.each(vidArr, function(i, videoId) {  
				$("#" + videoId)[0].src += "&autoplay=1"; 
			});  
		}
	
		function generate() {
			var videoIds = localStorage.getItem('idItem');
			var vidArr = JSON.parse(videoIds);
			
			$.each(vidArr, function(i, videoId) {   
				upVideo(videoId);
			})
			
			$("#submitBtn").on('click', function(){
				var idItem = localStorage.getItem('idItem');
				var newId = $("#form3Example1c").val();
				var idArr = JSON.parse(idItem);
				if (idItem) {
					if (!idArr.includes(newId)) {
						idArr.push(newId);
					} 
				} else {
					idArr = []
					idArr.push(newId);
				}
				localStorage.setItem('idItem', JSON.stringify(idArr));	
				location.reload();
			});
		}
		
		function upVideoNoView(videoId) {
			let views = 'NA';
		 	var item = `<div class="col-md-3"><b>${"| Views: " + views}</b><iframe id="${videoId}" src="https://www.youtube.com/embed/${videoId}?rel=0" title="YouTube video player"
					frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>`;
			$("#youtube").append(item);
		}

		function upVideo(videoId) {
			let url = `https://www.googleapis.com/youtube/v3/videos?part=statistics&id=${videoId}&key=AIzaSyBB7n48Te5VrEVBp0qUrEKV0zoC1ixI7z0`;
			$.get(url, function(data) {
			 	let views = data.items[0].statistics.viewCount; 
			 	var item = `<div class="col-md-3"><b>${"| Views: " + views}</b><iframe id="${videoId}" src="https://www.youtube.com/embed/${videoId}?rel=0" title="YouTube video player"
						frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>`;
				$("#youtube").append(item);
			}); 
		}
		
		$(document).ready(function(){   
			populate(); 
			generate(); 
			setTimeout(function(){
				//playAll();
			}, 5000); 
			setTimeout(function(){
				location.reload();
			}, 90000); 
		});
		
	</script>   
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> 
  </body>
</html>
