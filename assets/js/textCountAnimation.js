'use strict';
if (sectionOnPage.is('.adminAbout')) {


    var progress = document.querySelector('.progress'),
        textarea = document.querySelector('.textarea-about-admin'),
        counter = document.querySelector('.counter');

    var pathLength = progress.getAttribute('r') * 2 * Math.PI;
    var messageLength = 500;

    progress.style.strokeDasharray = pathLength + 'px';
    progress.style.strokeDashoffset = pathLength + 'px';

    textarea.addEventListener('input', function () {

        var len = textarea.value.length,
            per = len / messageLength,
            newOffset = pathLength - (pathLength * per) + 'px';

        var charsLeft = messageLength - len,
            goodZone = Math.floor(messageLength * (7 / 10)),
            warnZone = Math.floor(messageLength * (9 / 10)),
            dangerZone = Math.floor(messageLength * (10 / 10));

        counter.textContent = charsLeft;

        progress.classList.toggle('warning', len <= warnZone && len > goodZone);
        progress.classList.toggle('danger', len > warnZone && len > goodZone);
        progress.classList.toggle('tragedy', len >= messageLength);

        if (len < messageLength && charsLeft > 5) {
            counter.style.color = "#000";
            progress.style.strokeDashoffset = newOffset;
            progress.classList.add('good');
        } else if (charsLeft <= 5 && charsLeft > 0) {
            counter.style.color = "#000";
            progress.style.strokeDashoffset = newOffset;
            progress.classList.remove('good');
        } else {
            progress.style.strokeDashoffset = 0;
            counter.style.color = "#FF3939FF";
            progress.classList.remove('good');
        }
    });
}