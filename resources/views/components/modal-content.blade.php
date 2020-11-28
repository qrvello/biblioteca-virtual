<div class="portfolio-modal modal fade" id="modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <img loading="lazy" src="/assets/img/close-icon.svg" alt="Close modal" onclick="stopVideos()">
            </div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="modal-body" id="modal-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var stopVideos = function () {
        var videos = document.querySelectorAll('iframe, video');
        Array.prototype.forEach.call(videos, function (video) {
        if (video.tagName.toLowerCase() === 'video') {
        video.pause();
        } else {
        var src = video.src;
        video.src = src;
        }
    });
};
</script>