<?php
/**
 * Plugin Name: TGJU Currency Switcher for WooCommerce
 * Description: WooCommerce currency switcher between Toman (IRT) and Euro (EUR) using TGJU API exchange rates.
 * Version: 0.1
 * Author: YourName
 * License: GPLv2 or later
 * Text Domain: tgju-currency-switcher-for-woocommerce
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

class TGJU_Currency_Switcher {
    const COOKIE_NAME    = 'tgju_currency';
    const CURR_TOMAN     = 'IRT';
    const CURR_EUR       = 'EUR';

    public function __construct() {
        add_shortcode('tgju_currency_switcher', array($this, 'currency_switcher_shortcode'));
        add_filter('woocommerce_currency', array($this, 'filter_currency'));
        add_filter('woocommerce_currency_symbol', array($this, 'filter_symbol'), 10, 2);
        add_filter('raw_woocommerce_price', array($this, 'convert_price'), 999);
        add_filter('wc_get_price_decimals', array($this, 'filter_decimals'));
        add_filter('woocommerce_price_trim_zeros', array($this, 'filter_trim_zeros'));
    }

    private function get_selected_currency() {
        $val = isset($_COOKIE[self::COOKIE_NAME]) ? sanitize_text_field($_COOKIE[self::COOKIE_NAME]) : '';
        return in_array($val, array(self::CURR_TOMAN, self::CURR_EUR), true) ? $val : self::CURR_TOMAN;
    }

    public function currency_switcher_shortcode() {
        $curr = $this->get_selected_currency();
        ob_start(); ?>
        <select id="tgju_currency_sel">
            <option value="<?php echo esc_attr(self::CURR_TOMAN); ?>" <?php selected($curr, self::CURR_TOMAN); ?>>تومان</option>
            <option value="<?php echo esc_attr(self::CURR_EUR); ?>" <?php selected($curr, self::CURR_EUR); ?>>یورو (€)</option>
        </select>
        <script>
        (function(){
            var sel = document.getElementById('tgju_currency_sel');
            if(!sel) return;
            sel.addEventListener('change', function(){
                var v = sel.value;
                var maxAge = 60*60*24*30;
                document.cookie = "<?php echo esc_js(self::COOKIE_NAME); ?>="+encodeURIComponent(v)+"; path=/; max-age="+maxAge+";";
                window.location.reload();
            });
        })();
        </script>
        <?php return ob_get_clean();
    }

    public function filter_currency($currency) {
        if ($this->get_selected_currency() === self::CURR_EUR) return 'EUR';
        return $currency;
    }

    public function filter_symbol($symbol, $currency) {
        if ($currency === 'EUR') return '€';
        return $symbol;
    }

    public function convert_price($price) {
        if ($this->get_selected_currency() !== self::CURR_EUR) return $price;
        $toman_per_eur = 120000; // Placeholder for TGJU rate fetch (to be implemented)
        if ($toman_per_eur > 0) {
            return round($price / $toman_per_eur, 2);
        }
        return $price;
    }

    public function filter_decimals($decimals) {
        return ($this->get_selected_currency() === self::CURR_EUR) ? 2 : 0;
    }

    public function filter_trim_zeros($trim) {
        return ($this->get_selected_currency() === self::CURR_EUR);
    }
}

new TGJU_Currency_Switcher();
