function hoverscroll() {
	mousemove(function(e){
        var h = $(this).height()+13;
        var offset = $(this).offset();
        var position = (e.pageY-offset.top)/h;
        if(position<0.33) {
            $(this).stop().animate({ scrollTop: 0 }, 500);
        }
        if(position>0.66) {
            $(this).stop().animate({ scrollTop: h }, 500);
        }
    });
}
