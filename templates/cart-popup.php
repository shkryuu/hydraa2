<?php
add_shortcode('cart-popup', 'render_cart_popup_page');
function render_cart_popup_page() {
    ob_start();

    // Obține numărul de produse din coș
    $cart_count = WC()->cart->get_cart_contents_count();
    ?>
?>


    <div id="slideCart" class="cart-panel active">
        <div class="cart-header">
            <h2>Coșul tău waiii (<?php echo esc_html($cart_count); ?> produse)</h2>
            <a href="/" id="closeCartBtn">×</a>
        </div>
        <div class="cart-content">
            <?php woocommerce_mini_cart(); ?>
        </div>
    </div>

    <style>
    .cart-panel {
        position: fixed;
        top: 0;
        right: 0;
        width: 400px;
        height: 100%;
        background: #fff;
        box-shadow: -2px 0 10px rgba(0, 0, 0, 0.1);
        z-index: 9999;
        display: flex;
        flex-direction: column;
    }
    .cart-header {
        padding: 1rem;
        background: #f5f5f5;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .cart-header h2 {
        margin: 0;
    }
    .cart-header a {
        font-size: 1.5rem;
        text-decoration: none;
    }
    .cart-content {
        flex: 1;
        overflow-y: auto;
        padding: 1rem;
    }

    .nectar-slide-in-cart {
        position: fixed;
        height: 100%;
        width: 400px;
        background: white;
        right: 0;
        top: 0;
        z-index: 100000;
        transform: translateX(107%);
        transition: all 0.8s cubic-bezier(0.2, 1, 0.3, 1);
        box-shadow: -2px 0 8px rgba(0,0,0,0.2);
    }

    .nectar-slide-in-cart.active {
        transform: translateX(0);
    }

    .nectar-slide-in-cart .inner {
        height: 100%;
        overflow-y: auto;
        padding: 20px;
    }

    </style>

    <?php
    return ob_get_clean();
}
