$(window).scroll(function() {

    var $doc = $(document),
        $win = $(window),
        $btns = $('#projects'),
        $bar = $('#bar'),
        $main = $("#main"),
        a = 600,
        h = $doc.height(),
        s = $win.scrollTop(),
        w = $win.height(),

      t = (s / h) * w,

      p = Math.ceil((s + t) / h * 100),
      y = (s + w);
    if (y == h)
      p = 100;

    (p > 60) ? $btns.css("opacity", p/100) : void 0;
    (p > 80) ? $btns.show(a) : $btns.hide(a);

    $bar.width(p + '%');

});
