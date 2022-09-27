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
			$.ajax({
				url: '/',
				type: "GET",
				success: function(res) {

				},
				error: function(err, x) {

				}
			})
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
