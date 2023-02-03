
<?php     
// $bonuses = get_sub_field('choose_bonuses');
$bonuses = get_field('bonuses');
    if( $bonuses ): ?>
    <div class="max-w-contentwidth flex flex-col w-full content ">
        <?php 
            foreach( $bonuses as $bonus ): ?>
            @include('partials.bonuses-single')
        <?php endforeach; ?>

    </div>
<?php endif; ?>