<script type="text/javascript">
function initializeCustomPhotoSwipe(anchorEl) {
    var pswpElement = document.querySelectorAll('.pswp')[0];
        src = anchorEl.href;
        w = anchorEl.getAttribute("data-large_image_width");
        h = anchorEl.getAttribute("data-large_image_height");
        item = {
            src: src,
            w: w,
            h: h
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

jQuery(window).load(function(){
    var desired_w = 864;
    jQuery(".dt-pswp-item").not("#analytical-chart").each(function(){
        // modify anchor src
        src = this.getElementsByTagName('img')[0].src;
        this.href = src;
        w = this.getAttribute("data-large_image_width");
        h = this.getAttribute("data-large_image_height");
        desired_h = h * desired_w / w;
        this.setAttribute("data-large_image_width", desired_w);
        this.setAttribute("data-large_image_height", desired_h);
    });

    jQuery(".dt-pswp-item").each(function(){
    	jQuery(this).off("click")
            .click(function(e){
                e.preventDefault();

                initializeCustomPhotoSwipe(this);

                e.stopImmediatePropagation();
            });
        });
});
</script>
