jQuery.noConflict();
jQuery(document).ready(() => {
    jQuery('#search-result').hide();
    jQuery('.search__input').keyup(() => {
        let val = jQuery('.search__input').val();
        if (val == "") {
            jQuery('#search-result').hide();
        } else {
            jQuery('#search-result').show();
        }
        jQuery.post('./views/search.php', {
            search: val,
        }, (data) => {
            jQuery("#search-result").html(data);
        });
    });


    
})