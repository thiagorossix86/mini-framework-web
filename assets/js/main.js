$(function () {
    M.AutoInit();
    $('#main-header').load('views/components/header.html');
    $('#main-footer').load('views/components/footer.html');
    Router.init();
});

$(document).on('pageLoaded', function (e, hash) {
    const pageName = hash.replace('#', '');
    $(document).trigger(`render_${pageName}`);
});