<!-- start Simple Custom CSS and JS -->
<script type="text/javascript">
 jQuery(document).ready(function($) {
    $('#load-more-posts').on('click', function(e) {
        e.preventDefault();
        var currentPage = parseInt($(this).data('current-page'));
        var nextPage = currentPage + 1;
        var maxPages = parseInt($(this).data('max-pages')); // Get the total number of pages
        var ajaxurl = '<?php echo esc_url(admin_url('admin-ajax.php')); ?>';
        $.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                action: 'load_more_posts',
                page: nextPage
            },
            beforeSend: function() {
                $('#loadingImage').show();
            },
            success: function(response) {
                $('.blogs').append(response);
                $('#load-more-posts').data('current-page', nextPage);
                if (nextPage >= maxPages) {
                    $('.load-more-container').hide();
                }
                $('#loadingImage').hide();
            }
        });
    });
});
</script>
<!-- end Simple Custom CSS and JS -->
