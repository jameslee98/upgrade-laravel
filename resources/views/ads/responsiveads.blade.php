@if( $settings->google_ads_index == 'on' )
<?php echo html_entity_decode($settings->responsiveads) ?>
@else
Great! You are surfing this website without ads as AdsIndex is off!
@endif
