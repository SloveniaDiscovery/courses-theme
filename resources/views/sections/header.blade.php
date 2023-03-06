@include('partials.ebook-top-bar')
<header class="banner w-full relative">
  <div class="container max-w-pageWidth mx-auto flex items-center py-4 lg:!py-0">
    <img class="h-10 no-lazyload flex" src="{{$logoColor}}"></img>
    @if (has_nav_menu('primary_navigation'))
      <nav role="navigation" id="menuToggle" class="nav-primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        <input type="checkbox" />
        <span></span>
        <span></span>
        <span></span>

        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
      </nav>
    @endif
  </div>
</header>
<script>
  
$(document).ready(function(){
  if ($(window).width() > 1024) {
    $("ul#menu-main li:first-child").hover(function () {
      $(this).children('.sub-menu').css('display', 'grid');//hover on
      $(this).children('.sub-menu').animate({top: '20px', opacity: 1}, 400);
    }, function () {
      $(this).children('.sub-menu').animate({top: '200px', opacity: 0}, 400);
      $(this).children('.sub-menu').hide();//hover off
    });
  } else {
    $('.sub-menu').hide();
  }
});
const burger = document.getElementById('menuToggle')
burger.addEventListener('click', () => {
  document.body.classList.toggle('no-scroll')
  
})
</script>