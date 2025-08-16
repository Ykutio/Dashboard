$(document).ready(function () {
    //Active link sign
    $(".nav-treeview .nav-link, .nav-link").each(function () {
        var location2 = window.location.protocol + '//' + window.location.host + window.location.pathname;
        var link = this.href;
        if (link == location2) {
            $(this).addClass('active');
            $(this).parent().parent().parent().addClass('menu-is-opening menu-open');
        }
    });

    //Deleting confirm
    $('.delete-btn').click(function () {
        var res = confirm('Are you sure?');
        if (!res) {
            return false;
        }
    });
})

