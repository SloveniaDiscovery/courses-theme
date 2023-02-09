<div class="text-xs text-black flex justify-center upsell-ms-timer" x-data x-init="">
	<div class="countdown-number-white w-[60px] rounded-lg  border-black border-[1.9px] text-lg">
		<div  class="font-semibold minutes"></div>
		<div class="text-xs uppercase font-light">minutes</div>
	</div>
	<div class="countdown-number-white rounded-lg w-[60px] border-black border-[1.9px] text-lg ml-2">
		<div  class="font-semibold seconds"></div>
		<div class="text-xs uppercase font-light">seconds</div>
	</div>
</div>
<script>
var countDownDate = new Date().getTime() + 8 * 60 * 1000;

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();
    
  // Find the distance between now and the count down date
  var distance = countDownDate - now;
    
  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
	
 
  $(".minutes").text(minutes);
  $(".seconds").text(seconds);

  // If the count down is over, write some text 
  if (distance < 0) {
	  clearInterval(x);
    $(".upsell-ms-timer").hide();
  }
}, 1000);
</script>