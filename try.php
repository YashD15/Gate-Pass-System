<!DOCTYPE html>
<html>
<head>
    <title>Capture Image</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <button type="button" onclick = "camstart()"class="btn btn-primary" data-toggle="modal" data-target="#captureModal">Capture Image</button>

    <!-- Modal -->
    <div class="modal fade" id="captureModal" tabindex="-1" role="dialog" aria-labelledby="captureModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="captureModalLabel">Capture Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="video-wrap">
                        <video id="video" playsinline autoplay></video>
                    </div>

                    <div class="controller">
                        <button id="snap" class="btn btn-primary">Capture</button>
                    </div>

                    <canvas id="canvas" width="640" height="480"></canvas>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        'use strict';

        const video = document.getElementById('video');
        const canvas = document.getElementById('canvas');
        const snap = document.getElementById('snap');
        const errorMsgElement = document.getElementById('ErrorMsg');

        const constraints = {
            video: {
                width: 300,
                height: 300
            }
        };

        async function init() {
            try {
                const stream = await navigator.mediaDevices.getUserMedia(constraints);
                handleSuccess(stream);
            } catch (e) {
                errorMsgElement.innerHTML = `navigator.getUserMedia.error: ${e.toString()}`;
            }
        }
        function camstart() {
            try {
                const stream = await navigator.mediaDevices.getUserMedia(constraints);
                handleSuccess(stream);
            } catch (e) {
                errorMsgElement.innerHTML = `navigator.getUserMedia.error: ${e.toString()}`;
            }
        }

        function handleSuccess(stream) {
            window.stream = stream;
            video.srcObject = stream;
        }

        init();

        snap.addEventListener('click', function() {
            const context = canvas.getContext('2d');
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            // Convert canvas to data URL and download
            const dataUrl = canvas.toDataURL('image/png');
            const link = document.createElement('a');
            link.download = 'captured-image.png';
            link.href = dataUrl;
            link.click();
        });
    </script>
</body>
</html>
