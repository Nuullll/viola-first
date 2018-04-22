<script type="text/javascript">
/**
 * Special characters are not included in font:[Lucky Turns]
 * Use class .heading-special-character for special characters inside `heading` elements
 *
 * @example Pen-and-ink Drawings
 */
jQuery(document).ready(function(){
    var pattern = /[^a-zA-Z0-9 ]/g;  // matching all special characters
        class_name = 'heading-special-character';

    jQuery('.uvc-heading .uvc-main-heading h4').each(function(){
        var original_str = this.innerHTML;
        // handle '&'
        original_str = original_str.replace('&amp;', '&');
        this.innerHTML = original_str.replace(pattern, function(match){
            var str = '<span class="' + class_name + '">' + match + '</span>';
            return str.replace('&', '&amp;');
        });
    });
})
</script>
