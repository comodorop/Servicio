<link rel="stylesheet" href="../irarriba/irarriba.css" />
<script src="../bootsTrap2/js/jquery.js"></script>
<div id='IrArriba'>
    <a href='#Arriba'><span/></a>
</div>
<script type='text/javascript'>
//<![CDATA[
// Botón para Ir Arriba
    jQuery.noConflict();
    jQuery(document).ready(function() {
        jQuery("#IrArriba").hide();
        jQuery(function() {
            jQuery(window).scroll(function() {
                if (jQuery(this).scrollTop() > 200) {
                    jQuery('#IrArriba').fadeIn();
                } else {
                    jQuery('#IrArriba').fadeOut();
                }
            });
            jQuery('#IrArriba a').click(function() {
                jQuery('body,html').animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
        });

    });
//]]>
</script>

