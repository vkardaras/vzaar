<!DOCTYPE html>
<html>
<head>
	<title>Videos</title>
	
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.17/dist/vue.js"></script>
</head>
<body>

	<div class="container" id="vzaar">

	  	<div class="row" v-for="video in videos">

		    <div class="col-sm">
			    Video id: @{{ video.id }} <br>
				<a href="#" @click.prevent="setVideo(video.id)">Video title: @{{ video.title }}</a><br>
		    </div>

	  	</div>

	  	<div class="row">

			<iframe id="vzvd-14491325" name="vzvd-14491325" title="vzaar video player" class="vzaar-video-player" type="text/html" width="416" height="234" frameborder="0" allowFullScreen allowTransparency="true" :src="'https://view.vzaar.com/'+video_id+'/player?apiOn=true'"></iframe>


	  	</div>
	</div>


	<script src="https://player.vzaar.com/libs/flashtakt/client.js" type="text/javascript"></script>
	<script>
		window.addEventListener("load", function(){
		    loadListeners();
		});

		function loadListeners()
		{
			var vzp = new vzPlayer("vzvd-14491325");
		    // vzp.seekTo(1);

		    vzp.getTotalTime(function(time) {
			    console.log("total time = " + time + "s");
			});

			vzp.removeEventListener("interaction");
		    vzp.addEventListener("interaction", function(value) {
		    	console.log(value);
		    });

			vzp.removeEventListener("playState");
		    vzp.addEventListener("playState", function(value) {
		    	console.log(value);

		    	if (value == "mediaPaused") {
		    		vzp.getTime(function(time) {
				      	console.log("time = " + time + "s");
				    });
		    	}
		    });
		}

	    
	    const app = new Vue({
	        el:'#vzaar',
	        data() {
	          return {
	            videos:[],
	            items:[],
	            video_id:'14491325',
	            product:'',
	            pcolor:''
	          }
	        },
	        methods: {

	        	setVideo(video_id) {
	        		console.log('video_id = ' + video_id);
	        		this.video_id = video_id;

	        		loadListeners();
	        	}

	          // addHistory(item_id) {
	          //   console.log('add history');

	          //   axios.post(path_absolute+'add_history', {
	          //       item_id: item_id
	          //   })
	          //   .then(function (response) {
	          //       console.log(response);
	          //       if (response.data) {
	          //         // quiz.user_tests = 100;


	          //           // var options = response.data;
	          //           // console.log(options.items);
	          //           // console.log(options.quiz);

	          //           // app.items = options.items;
	          //       }
	          //   })
	          //   .catch(function (error) {
	          //       console.log(error);
	          //   });

	          // }
	      	},
	        mounted () {
	            this.videos = <?php echo $videos!=null?json_encode($videos, JSON_PRETTY_PRINT):'[]'; ?>;

	            // this.videos.forEach((a, index) => {
	            // 	console.log('a.id = ' + a.id);
	            // 	console.log('a.title = ' + a.title);
	            // });

	        },
	    });
	</script>
</body>
</html>