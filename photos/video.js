(function() {
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    var video = document.getElementById('video');
    var image;
    var videoflag = 0;

    if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia({
            video: true 
        }).then(function(stream) {
            video.srcObject = stream;
            video.play();
        });
    }

    function chooseimg(){
        var choose = document.querySelectorAll(".filter");
    
        choose.forEach(function(element){
            element.addEventListener("click",function(){
            image = element;
            if (image && videoflag === 1){
                if (image.src === "http://localhost:8080/camagru/filter_images/1.png"){
                    context.drawImage(image, 0, 0, 400, 300);
                }
                else if (image.src === "http://localhost:8080/camagru/filter_images/2.png"){
                    context.drawImage(image, 0, 0, 400, 300);
                }
                else if (image.src === "http://localhost:8080/camagru/filter_images/3.png"){
                    context.drawImage(image, 0, 0, 400, 300);
                }
                else if (image.src === "http://localhost:8080/camagru/filter_images/4.png"){
                    context.drawImage(image, 0, 0, 400, 300);
                }
                else if (image.src === "http://localhost:8080/camagru/filter_images/5.png"){
                    context.drawImage(image, 30, 60, 400, 300);
                }
                else if (image.src === "http://localhost:8080/camagru/filter_images/6.png"){
                    context.drawImage(image, 65, 114, 300, 200);
                }
                var dataURL = canvas.toDataURL();
                document.getElementById("image_data").value = dataURL;
            }
        });
    });}
    
    chooseimg();

    document.getElementById("snap").addEventListener("click", function() {
        context.drawImage(video, 0, 0, 400, 300);
        videoflag = 1;
    });

    document.getElementById("submitphoto").addEventListener("click", function() {
        if (videoflag === 1) {

            var dataURL = canvas.toDataURL();
            document.getElementById("image_data").value = dataURL;
        }
    });

})();