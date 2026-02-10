<?php
/**
 * Latvian (LV) Language Configuration
 * Noriks Latvia Store
 */

// Translate WooCommerce attribute labels
add_filter( 'gettext', 'translate_attribute_labels_lv', 20, 3 );
function translate_attribute_labels_lv( $translated_text, $text, $domain ) {
    $translations = array(
        'Choose your size' => 'Izvēlieties izmēru',
        'Choose an option' => 'Izvēlieties opciju',
        'Add to cart' => 'Pievienot grozam',
        'Select options' => 'Izvēlēties',
        'View cart' => 'Skatīt grozu',
        'Checkout' => 'Noformēt pasūtījumu',
        'Proceed to checkout' => 'Turpināt noformēšanu',
        'Update cart' => 'Atjaunināt grozu',
        'Apply coupon' => 'Piemērot kuponu',
        'Coupon code' => 'Kupona kods',
        'Cart totals' => 'Groza kopsumma',
        'Subtotal' => 'Starpsumma',
        'Total' => 'Kopā',
        'Shipping' => 'Piegāde',
        'Free shipping' => 'Bezmaksas piegāde',
    );
    
    if ( isset( $translations[$text] ) ) {
        return $translations[$text];
    }
    return $translated_text;
}

// Checkout phone placeholder
add_filter( 'woocommerce_checkout_fields', 'custom_billing_phone_placeholder_lv' );
function custom_billing_phone_placeholder_lv( $fields ) {
    $fields['billing']['billing_phone']['placeholder'] = 'Tālrunis (piemērs: 20123456)';
    return $fields;
}

// Order number prefix
add_filter( 'woocommerce_order_number', 'change_woocommerce_order_number_lv' );
function change_woocommerce_order_number_lv( $order_id ) {
    $prefix = 'NORIKS-LV-';
    return $prefix . $order_id;
}

// Force country to Latvia
add_filter( 'default_checkout_billing_country', '__return_lv' );
add_filter( 'default_checkout_shipping_country', '__return_lv' );
function __return_lv() {
    return 'LV';
}

// Force country to Latvia and hide country fields
add_filter( 'woocommerce_checkout_fields', 'fix_country_to_latvia_and_hide' );
function fix_country_to_latvia_and_hide( $fields ) {
    WC()->customer->set_billing_country( 'LV' );
    WC()->customer->set_shipping_country( 'LV' );
    
    unset( $fields['billing']['billing_country'] );
    unset( $fields['shipping']['shipping_country'] );
    
    return $fields;
}

add_filter( 'woocommerce_checkout_fields', 'hide_checkout_fields_lv' );
function hide_checkout_fields_lv( $fields ) {
    unset( $fields['billing']['billing_state'] );
    unset( $fields['shipping']['shipping_state'] );
    unset( $fields['shipping']['shipping_address_2'] );
    return $fields;
}

/**
 * Latvian translations for hardcoded strings
 */
function noriks_lv_translations() {
    return array(
        // Hero section
        'Tričko, které řeší všechny problémy.' => 'T-krekls, kas atrisina visas problēmas.',
        'KOUPIT TEĎ' => 'PIRKT TAGAD',
        
        // Collections
        'Nakupujte podle kolekce' => 'Iepirkties pēc kolekcijas',
        'Všechny produkty' => 'Visi produkti',
        
        // Category names
        'Trička' => 'T-krekli',
        'Boxerky' => 'Bokseršorti',
        'Sady' => 'Komplekti',
        'Startovací balíček' => 'Starta komplekts',
        
        // Category descriptions
        'Pohodlí po celý den. Bez vytahování.' => 'Komforts visu dienu. Bez vilkšanas.',
        'Měkké. Prodyšné. Spolehlivé.' => 'Mīksti. Elpojami. Uzticami.',
        'Nejlepší poměr ceny a kvality v setu.' => 'Labākā cenas un kvalitātes attiecība komplektā.',
        'Vyzkoušej NORIKS výhodněji.' => 'Izmēģini NORIKS izdevīgāk.',
        
        // Header marquee
        'Doprava zdarma pro objednávky nad 1700 Kč' => 'Bezmaksas piegāde pasūtījumiem virs 70 €',
        'Doprava zdarma při objednávkách nad 1700 Kč' => 'Bezmaksas piegāde pasūtījumiem virs 70 €',
        '30 dní bez rizika – vyzkoušej bez obav' => '30 dienas bez riska – izmēģini bez bažām',
        
        // Product page features
        'Platba na dobírku' => 'Apmaksa pēc saņemšanas',
        'Vyzkoušejte 30 dní, bez rizika' => 'Izmēģiniet 30 dienas bez riska',
        
        // Shipping/delivery
        'Objednejte během následujících' => 'Pasūtiet tuvāko',
        'Doručení od' => 'Piegāde no',
        'do' => 'līdz',
        
        // Cart
        'Prosím, pospěš si! Někdo si právě objednal jeden z produktů ve tvém košíku. Rezervace platí už jen' => 'Lūdzu, pasteidzies! Kāds tikko pasūtīja vienu no produktiem tavā grozā. Rezervācija ir spēkā tikai',
        'minut' => 'minūtes',
    );
}

/**
 * Latvian weekday names
 */
function noriks_lv_weekdays() {
    return array(
        'Svētdiena',    // Sunday
        'Pirmdiena',    // Monday
        'Otrdiena',     // Tuesday
        'Trešdiena',    // Wednesday
        'Ceturtdiena',  // Thursday
        'Piektdiena',   // Friday
        'Sestdiena'     // Saturday
    );
}
