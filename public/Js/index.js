$(document).ready(function () {
    $('.toggle').click(function () {
        $('.logo').toggleClass('activeFrist');
    });
    $('.toggle').click(function () {
        $('.slide-panel').toggleClass('activeSecound');
        $('.slide-panel .sidenav-item .link-name').toggleClass('activeThree');
        $('.slide-panel .sidenav-item .left-angle').toggleClass('activeThree');
    });

    $('.toggle').click(function () {
        $('.navpanel').toggleClass('sidepanelWidth');
        $('.rightpanel').toggleClass('mainpanelWidth');
    });
});