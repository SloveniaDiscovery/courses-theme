<div class="m-auto justify-center mt-10 max-w-contentwidth ">
        {!! $firstContentUpsell !!}
        @if(is_page_template( 'template-upsell_steps.blade.php' ) )
        <div class="border-dashed border-2 border-darkOrange rounded p-4 sm:p-8">
                {!! $boxContentUpsell !!}  
                @include('partials.button-buy-inside')
                {!! $contentAfterButtonUpsell !!}
        </div>
        @endif
</div>