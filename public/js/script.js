function showAll() {
    var videos = document.querySelectorAll('.talkshow-videos');
    videos.forEach(function(video) {
    video.style.display = 'flex';

    });

    document.querySelector('.arrow-down').style.display = 'none';
    document.querySelector('.arrow-up').style.display = 'flex';
}

function showLess() {
    var videos = document.querySelectorAll('.talkshow-videos');
    videos.forEach(function(video, index) {
    if (index >= 4) {
    video.style.display = 'none';
}
});

    document.querySelector('.arrow-down').style.display = 'flex';
    document.querySelector('.arrow-up').style.display = 'none';
}
