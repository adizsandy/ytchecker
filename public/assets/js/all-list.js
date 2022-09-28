$(document).ready(function(){   
    init(); 
 });

function init() { 
    let updated = Boolean(JSON.parse(localStorage.getItem('updated')));
    if (updated) { 
        generate();
    } else { 
        var reportKey = $("#reportKey").val();
        $.ajax({
            url: ROOT + '/channel/action/all-list-fetch.php',
            type: "POST",
            data: {reportKey: reportKey},
            success: function(res) {
                res = JSON.parse(res);
                localStorage.setItem('allListIds', JSON.stringify(res.data)); 
                generate();
            },
            error: function(err, x) {
                generate();
                console.log("Something went wrong");
            }
        })
    }

    $(".v-grid-submit").on('click', function(){ 
        var newId = $(".hot-input").val(); 
        $.ajax({
            url: ROOT + '/channel/action/all-list-submission.php',
            type: "POST",
            data: {reportKey: reportKey, newId: newId},
            success: function(res) { 
                localStorage.setItem('updated', false);	
                location.reload();
            },
            error: function(err, x) { 
                console.log("Something went wrong");
            }
        }) 
    });
}

function generate() {
    var videoIds = localStorage.getItem('allListIds');
    var vidArr = JSON.parse(videoIds);
    for (let i=0; i<vidArr.length; i++) { 
        setTimeout(function(){
            let videoId = vidArr[i];
            let url = `https://www.googleapis.com/youtube/v3/videos?part=statistics&id=${videoId}&key=AIzaSyBB7n48Te5VrEVBp0qUrEKV0zoC1ixI7z0`;
            $.get(url, function(data) {
                if (data.items) {
                    let views = data.items[0].statistics.viewCount; 
                    var item = `<div class="col-md-3"><b>${"| Views: " + views}</b><iframe id="${videoId}" src="https://www.youtube.com/embed/${videoId}?rel=0" title="YouTube video player"
                            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>`;
                    $(".vid-wrap-1").append(item);
                } else {
                    console.log("Invalid video id found")
                }
            }); 
        }, 2000);
    }
}