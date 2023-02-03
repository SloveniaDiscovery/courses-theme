<div class="text-xs text-gray-500" x-data x-init="">
	<div class="countdown-number-black">
		<div  class="minutes"></div>
		<div class="text-[8px]">minutes</div>
	</div>
	<div class="countdown-number-black">
		<div  class="seconds"></div>
		<div class="text-[8px]">seconds</div>
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
    $(".upsell-w-timer").hide();
  }
}, 1000);
</script>