   $(function(){
        $(".qq").hover(function() {
            $(".qq1").hide();
            $(this).find("a").show();
        },function(){
            $(".qq1").show();
            $(this).find("a").hide();
        });

        $(".qr").hover(function() {
            $(".qr1").hide();
            $(".qr2").show();
            $(".erweima").show();
        },function(){
            $(".qr1").show();
            $(".qr2").hide();
            $(".erweima").hide();
        });

        $(".phone").hover(function() {
            $(".phone1").hide();
            $(".phone2").show();
            $(".phonenumber").show();
        },function(){
            $(".phone1").show();
            $(".phone2").hide();
            $(".phonenumber").hide();
        });

        $(".totop").hover(function() {
            $(".totop1").hide();
            $(".totop2").show();
        }, function(){
            $(".totop1").show();
            $(".totop2").hide();
        }).on("click", function() {
            $(window).scrollTop("0");
        });

        $(window).on("scroll", function(){
            var height = $(window).height()/2;
            var totop = $(".totop");
            if($(window).scrollTop() >= height){
                totop.show();
            }else{
                totop.hide();
            }
        });
    });