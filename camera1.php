<!DOCTYPE html>
<html>
<head>
	<title>Camera Popup</title>
	<style>
		body {
			margin: 0;
			padding: 0;
			overflow: hidden;
		}
		#video {
			width: 100%;
			height: 100%;
		}
		#capture-button {
			position: absolute;
			bottom: 0;
			left: 50%;
			transform: translateX(-50%);
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<video id="video"></video>
	<button id="capture-button" onclick="takePicture()">Capture</button>

	<script>
		var video = document.getElementById('video');
		var canvas = document.createElement('canvas');
		var context = canvas.getContext('2d');
		var folderName = "myFolder";

		navigator.mediaDevices.getUserMedia({video: true})
			.then(function(stream) {
				video.srcObject = stream;
				video.play();
			})
			.catch(function(err) {
				console.log('Error: ' + err);
			});

		function takePicture() {
			canvas.width = video.videoWidth;
			canvas.height = video.videoHeight;
			context.drawImage(video, 0, 0);	
			var data = canvas.toDataURL('image/png');
			downloadImage(data);
            window.close();
		}

		function downloadImage(data, folderName) {
			var link = document.createElement('a');
			link.download = 'new.png';
			link.href = data;
			document.body.appendChild(link);
			link.click();
			document.body.removeChild(link);
		}
	</script>
</body>
</html>
