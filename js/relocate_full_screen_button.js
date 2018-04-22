<script type="text/javascript">

/* set timer for relocating full-screen button to avoid multiple executing */
var relocateTimer;

function relocateButton(){
    clearTimeout(relocateTimer);
    relocateTimer = setTimeout(function() {

        var imgMarginRight = parseFloat(jQuery('.photo-scroller .act .ts-slide-img img').css('margin-right'));
            vpMarginRight = parseFloat(jQuery('.photo-scroller .ts-viewport').css('margin-right'));
            offset = 5;

        jQuery(".btn-cntr").css({"right":vpMarginRight - imgMarginRight + offset + "px"});

    }, 250);
};

/* listen to events */
jQuery(document).ready(function(){
    jQuery(window).on('load', relocateButton);
    jQuery(window).on('resize', relocateButton);
    jQuery(document.body).on('click', '.scroller-arrow', relocateButton);
    jQuery(document.body).on('click', '.ts-thumb-img', relocateButton);
});

</script>
