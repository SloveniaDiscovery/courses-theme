<?php 
/* Flexible content used for checkout, rendering fields on front-end 
*   use @layout from app/Blocks/FlexibleUpsell.php, get subfields as @sub 
*/ 
?>
@layouts('upsell_section')

<div class="max-w-contentwidth m-auto">
@if(is_page_template( 'template-upsell_steps.blade.php' ) )
        @layout('text_content')
            @sub('text')
        @endlayout
        @layout('heading')
            @sub('heading')
        @endlayout
        @layout('image')
            <img class="max-w-[500px] w-full my-8 mx-auto" src="@sub('image', 'url')" alt="">
        @endlayout
        @layout('dashed_box')
            @include('sections.dashed-box')
        @endlayout
        @layout('no_thanks_button')
            @include('partials.no-thanks-button')
        @endlayout
        @layout('guarantee_section')
            @include('partials.guarantee-upsell')
        @endlayout
    @else
        @layout('heading')
            @sub('heading')
        @endlayout
        @layout('text_content')
            @sub('text')
        @endlayout
        @layout('image')
            <img class="max-w-[500px] w-full my-8 mx-auto" src="@sub('image', 'url')" alt="">
        @endlayout
        @layout('no_thanks_button')
            @include('partials.no-thanks-button')
        @endlayout
        @layout('yellow_box')
            @include('sections.yellow-box')
        @endlayout
        @layout('green_box')
            @include('partials.green-box-upsell')
        @endlayout
        @layout('testimonials')
            @include('partials.testimonials')
        @endlayout
        @layout('guarantee_section')
            @include('partials.guarantee-upsell')
        @endlayout
@endif
</div>
    @layout('product_self_sort')
        <section class="mt-12">
            @include('sections.self-sorting_upsell')
        </section>
    @endlayout
@endlayouts


<script>
function join(t, a, s) {
   function format(m) {
      let f = new Intl.DateTimeFormat('en', m);
      return f.format(t);
   }
   return a.map(format).join(s);
}

let a = [{day: '2-digit'}, {month: '2-digit'}, {year: 'numeric'}];
let s = join(new Date, a, '.');

const today = document.querySelectorAll('.green-box-time');
for (let i = 0; i < today.length; i++) {
    today[i].innerHTML = s;
}

</script>