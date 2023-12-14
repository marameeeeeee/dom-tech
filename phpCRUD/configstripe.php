<?php


session_start();

//Stripe Credentials Configuration
define( "STRIPE_SECRET_API_KEY", "sk_test_51OKVxHHB6lE88qCI4jmq5u5lrvyyHNz0Nh12kRbOYgXYOrJOENUu9cpjsFpm26eMJnXhKJyRom8y0bsVJl62oThX00yABVLHxu" );
define( "STRIPE_PUBLISHABLE_KEY", "pk_test_51OKVxHHB6lE88qCIQyia68OMcGubxWpsgRtdNYcJWzAMK1imSGhpLi1PT56CqCH8z6kcDvsrd4DKhMLssctzxND200Sg3lW5Md" );

//Sample Product Details
define( 'CURRENCY', 'USD' );
define( 'AMOUNT', '100' );
define( 'DESCRIPTION', '' );


?>