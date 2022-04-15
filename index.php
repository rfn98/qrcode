<!DOCTYPE html>
<html>
  <head>
    <title>Instascan</title>
  </head>
  <body>
    <video id="preview"></video>
    <span id="qrcode"></span>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js" ></script>	
    <script type="text/javascript">
        let scanner = new Instascan.Scanner(
            {
                video: document.getElementById('preview')
            }
        );
        scanner.addListener('scan', function(content) {
            alert('Escaneou o conteudo: ' + content);
            window.open(content, "_blank");
        });
        Instascan.Camera.getCameras().then(cameras => 
        {
            if(cameras.length > 1){
                scanner.start(cameras[1]);
            } else if(cameras.length > 0){
                scanner.start(cameras[0]);
            } else {
                console.error("Não existe câmera no dispositivo!");
            }
        });
    </script>

 </body>
</html>