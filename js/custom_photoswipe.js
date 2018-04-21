<script type="text/javascript">
function initializeCustomPhotoSwipe(anchorEl) {
    event.preventDefault();
    var pswpElement = document.querySelectorAll('.pswp')[0];
        src = anchorEl.href;
        w = anchorEl.getAttribute("data-large_image_width");
        h = anchorEl.getAttribute("data-large_image_height");
        item = {
            src: src,
            w: 0.8*w,
            h: 0.8*h
        };
        options = {
            bgOpacity: 0.85,
            zoomEl: false,
            maxSpreadZoom: 1,
            getDoubleTapZoom: function(isMouseClick, item) {
                item.initialZoomLevel = 1;
                return 1;
            },
            pinchToClose: false,
            shareEl: false,
            tapToClose: true
        };
        pswp = new PhotoSwipe(pswpElement, PhotoSwipeUI_Default, [item], options);

    var autoZoom = function() {
        pswp.zoomTo(1, 0, 0);
    };

    pswp.listen('beforeChange', autoZoom);
    pswp.listen('afterChange', autoZoom);

    pswp.init();
}

jQuery(document).ready(function(){
    jQuery(".custom-pswp").each(function(){
    	jQuery(this).off("click")
            .click(function(e){
                e.preventDefault();
                initializeCustomPhotoSwipe(this);
                e.stopImmediatePropagation();
            });
        });
});
</script>
