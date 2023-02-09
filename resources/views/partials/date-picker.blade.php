<div class="text-xs text-gray-500">
  <div class="countdown ml-4 absolute -top-[25px] right-0 flex">
      <div class="countdown-number">
        <div class="font-bold days timer-days" id="timer_days"></div>
        <div class="uppercase md:text-[8px] text-[6px] leading-tight" >Days</div>
      </div>
      <div class="countdown-number">
        <div class="font-bold hours timer-hours" id="timer_hours" ></div>
        <div class="uppercase md:text-[8px] text-[6px] leading-tight" >Hours</div>
      </div>
      <div class="countdown-number">
        <div class="font-bold minutes timer-minutes" id="timer_minutes"></div>
        <div class="uppercase md:text-[8px] text-[6px] leading-tight" >Minutes</div>
      </div>
      <div class="countdown-number">
        <div class="font-bold seconds timer-seconds" id="timer_seconds" ></div>
        <div class="uppercase md:text-[8px] text-[6px] leading-tight" >Seconds</div>
      </div>
    </div>
</div>
<?php $date = get_sub_field('timer'); ?>

<script>
document.addEventListener("DOMContentLoaded", () => {
  startTimer()
});
var countDownDate;
function startTimer(){
let date = "<?php echo $date ?>";

let arr = date.split("/");
let newDate = arr[1] + "/" + arr[0] + "/" + arr[2];
// console.log(date)

countDownDate = new Date(newDate);
// Update the count down every 1 second
console.log(countDownDate)
x = setInterval(refreshDate, 1000);
}

function refreshDate() {
// Get todays date and time
var now = new Date().getTime();
// Find the distance between now an the count down date
var distance = countDownDate - now;
// Time calculations for days, hours, minutes and seconds
var days = Math.floor(Math.abs(distance / (1000 * 60 * 60 * 24)));
var years = Math.floor(days / 365);
var hours = Math.floor(Math.abs((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)));
var minutes = Math.floor(Math.abs((distance % (1000 * 60 * 60)) / (1000 * 60)));
var seconds =Math.floor(Math.abs((distance % (1000 * 60)) / 1000));
// Display the result in the element with id="demo"


document.querySelectorAll('.timer-days').forEach(el=> el.innerHTML= days);
document.querySelectorAll('.timer-hours').forEach(el=> el.innerHTML= hours);
document.querySelectorAll('.timer-minutes').forEach(el=> el.innerHTML= minutes);
document.querySelectorAll('.timer-seconds').forEach(el=> el.innerHTML= seconds);



}

</script>
