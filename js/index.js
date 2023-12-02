$(document).ready(function() {
    $(window).on("scroll", function() {
        $(".bao-bun-section img").each(function() {
            var $currentImage = $(this);
            var imageOffset = $currentImage.offset().top;
            var imageHeight = $currentImage.height();
            var st = $(window).scrollTop();

            if (st > imageOffset - window.innerHeight && st < imageOffset + imageHeight) {
                // Calculate rotation based on scroll position within the section
                var rotationRatio = (st - imageOffset + window.innerHeight) / (window.innerHeight + imageHeight);
                // Limit rotation between -45 to 45 degrees
                var rotation = rotationRatio * 90 - 45;
                $currentImage.css("transform", "rotate(" + rotation + "deg)");
            } else {
                // Reset rotation when the image is out of view
                $currentImage.css("transform", "rotate(0deg)");
            }
        });
    });
});