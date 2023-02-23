@if(get_post_type() === 'wffn_landing' || get_post_type() === 'wffn_optin')
<div class="bg-redColor text-white md:p-2 md:px-10 p-2 mt-6 !mb-6">
    @sub('text_with_background_color')
</div>
@endif