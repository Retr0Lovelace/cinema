<section id="footer" class="clearfix">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 footer clearfix">
                <p>
                    © 2021 DevCommunityClub | Design by Benjamin Francisco
                </p>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#myCarousel').carousel({
            interval: 5000
        });
        $('#carousel-text').html($('#slide-content-0').html());
        //Handles the carousel thumbnails$('[id^=carousel-selector-]').click( function(){
        var id_selector = $(this).attr("id");
        var id = id_selector.substr(id_selector.length -1);
        var id = parseInt(id);
        $('#myCarousel').carousel(id);
    });
    // When the carousel slides, auto update the text$('#myCarousel').on('slid', function (e) {
    var id = $('.item.active').data('slide-number');
    $('#carousel-text').html($('#slide-content-'+id).html());
    });
    });
</script>
</body>
</html>