<?php
require 'vendor/autoload.php';
use Gregwar\Captcha\CaptchaBuilder;
use Dompdf\Dompdf;

session_start();

$builder = new CaptchaBuilder;
$builder->build();

if(isset($_POST['submit'])){
    if(isset($_POST['UserValidCaptch'])){
        if($_POST['UserValidCaptch'] === $_SESSION['phrase'] ){
           $dompdf = new Dompdf();
            $sig = $_POST['sig64'];
           
           $dompdf->loadHtml("<img src='$sig'>");

// (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
            $dompdf->render();

// Output the generated PDF to Browser
            $dompdf->stream();
            
           
        }
    }
}

 echo __LINE__ . " - ". $_SESSION['phrase'] = $builder->getPhrase();
echo "<hr>";
?>


<html>
    <style>
        #sig-canvas {
  border: 2px dotted #CCCCCC;
  border-radius: 15px;
  cursor: crosshair;
}
    </style>
    <form method="post">
        <img src="<?php echo $builder->inline(); ?>" />
        <input type="text" name="UserValidCaptch" >
        
        <input type="hidden" value="" name="sig64" id="sig64" >
    	<!-- Content -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>E-Signature</h1>
				<p>Sign in the canvas below and save your signature as an image!</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
		 		<canvas id="sig-canvas" width="620" height="160">
		 			Get a better browser, bro.
		 		</canvas>
		 	</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<button class="btn btn-primary" id="sig-submitBtn">Submit Signature</button>
				<button class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
			</div>
		</div>
            <br>
            <button type="submit" name="submit">Submit</button>
    </form>
<!--		<br/>
		<div class="row">
			<div class="col-md-12">
				<textarea id="sig-dataUrl" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
			</div>
		</div>
		<br/>-->
<!--		<div class="row">
			<div class="col-md-12">
				<img id="sig-image" src="" alt="Your signature will go here!"/>
			</div>
		</div>-->
	</div>
        <script>
            (function() {
  window.requestAnimFrame = (function(callback) {
    return window.requestAnimationFrame ||
      window.webkitRequestAnimationFrame ||
      window.mozRequestAnimationFrame ||
      window.oRequestAnimationFrame ||
      window.msRequestAnimaitonFrame ||
      function(callback) {
        window.setTimeout(callback, 1000 / 60);
      };
  })();

  var canvas = document.getElementById("sig-canvas");
  var ctx = canvas.getContext("2d");
  ctx.strokeStyle = "#222222";
  ctx.lineWidth = 4;

  var drawing = false;
  var mousePos = {
    x: 0,
    y: 0
  };
  var lastPos = mousePos;

  canvas.addEventListener("mousedown", function(e) {
    drawing = true;
    lastPos = getMousePos(canvas, e);
  }, false);

  canvas.addEventListener("mouseup", function(e) {
    drawing = false;
  }, false);

  canvas.addEventListener("mousemove", function(e) {
    mousePos = getMousePos(canvas, e);
  }, false);

  // Add touch event support for mobile
  canvas.addEventListener("touchstart", function(e) {

  }, false);

  canvas.addEventListener("touchmove", function(e) {
    var touch = e.touches[0];
    var me = new MouseEvent("mousemove", {
      clientX: touch.clientX,
      clientY: touch.clientY
    });
    canvas.dispatchEvent(me);
  }, false);

  canvas.addEventListener("touchstart", function(e) {
    mousePos = getTouchPos(canvas, e);
    var touch = e.touches[0];
    var me = new MouseEvent("mousedown", {
      clientX: touch.clientX,
      clientY: touch.clientY
    });
    canvas.dispatchEvent(me);
  }, false);

  canvas.addEventListener("touchend", function(e) {
    var me = new MouseEvent("mouseup", {});
    canvas.dispatchEvent(me);
  }, false);

  function getMousePos(canvasDom, mouseEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: mouseEvent.clientX - rect.left,
      y: mouseEvent.clientY - rect.top
    }
  }

  function getTouchPos(canvasDom, touchEvent) {
    var rect = canvasDom.getBoundingClientRect();
    return {
      x: touchEvent.touches[0].clientX - rect.left,
      y: touchEvent.touches[0].clientY - rect.top
    }
  }

  function renderCanvas() {
    if (drawing) {
      ctx.moveTo(lastPos.x, lastPos.y);
      ctx.lineTo(mousePos.x, mousePos.y);
      ctx.stroke();
      lastPos = mousePos;
    }
  }

  // Prevent scrolling when touching the canvas
  document.body.addEventListener("touchstart", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchend", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);
  document.body.addEventListener("touchmove", function(e) {
    if (e.target == canvas) {
      e.preventDefault();
    }
  }, false);

  (function drawLoop() {
    requestAnimFrame(drawLoop);
    renderCanvas();
  })();

  function clearCanvas() {
    canvas.width = canvas.width;
  }

  // Set up the UI
  var sig64 = document.getElementById("sig64");
  var sigImage = document.getElementById("sig-image");
  var clearBtn = document.getElementById("sig-clearBtn");
  var submitBtn = document.getElementById("sig-submitBtn");
  clearBtn.addEventListener("click", function(e) {
    clearCanvas();
//    sigText.innerHTML = "Data URL for your signature will go here!";
//    sigImage.setAttribute("src", "");
  }, false);
  submitBtn.addEventListener("click", function(e) {
      e.preventDefault();
    var dataUrl = canvas.toDataURL();
    sig64.value = dataUrl;
//    console.log(sig64);
//    sigText.innerHTML = dataUrl;
//    sigImage.setAttribute("src", dataUrl);
  }, false);

})();
            </script>
    
</html>