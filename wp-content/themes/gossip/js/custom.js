//jQuery Remove and Add Class and ID
(function($) {
    var $window = $(window),
        $gossip_menu_main = $(".gossip-nav");
    $window.resize(function resize(){
        if ($window.width() < 767) {
            return $gossip_menu_main.addClass("gossip-mobile-container");
        }
        $gossip_menu_main.removeClass("gossip-mobile-container");
    }).trigger('resize');
})(jQuery);



(function($) {
    var $window = $(window),
        $gossip_menu = $(".gossip-nav nav");
    $window.resize(function resize(){
        if ($window.width() < 767) {
            return $gossip_menu.addClass("gossip-mobile-navigation").removeClass("gossip-desktop-navigation");
        }
        $gossip_menu.removeClass("gossip-mobile-navigation").addClass("gossip-desktop-navigation");
    }).trigger('resize');
})(jQuery);



(function($) {
    var $window = $(window),
        $gossip_menu_accordion = $(".gossip-nav nav");
    $window.resize(function resize(){
        if ($window.width() < 767) {
            return $gossip_menu_accordion.find("ul").first().addClass("mtree");
        }
        $gossip_menu_accordion.find("ul").first().removeClass("mtree");
    }).trigger('resize');
})(jQuery);




(function($) {
    var $window = $(window),
        $gossip_menu_child = $(".gossip-nav li:has(ul)");

    $window.resize(function resize(){
        if ($window.width() < 767) {
            return $gossip_menu_child.removeClass("has-child");
        }

        $gossip_menu_child.addClass("has-child");

    }).trigger('resize');
})(jQuery);




(function($) {
    var $window = $(window),
        $gossip_menu_child_2 = $(".gossip-nav li li:has(ul)");

    $window.resize(function resize(){
        if ($window.width() < 767) {
            return $gossip_menu_child_2.removeClass("has-child-2");
        }

        $gossip_menu_child_2.addClass("has-child-2").removeClass("has-child");

    }).trigger('resize');
})(jQuery);


//jQuery Mobile menu toggle effect

(function($) {
    jQuery(".gossip-side-trigger").click(function() {
        jQuery(".gossip-mobile-container nav").toggleClass("gossip-nav-open");
    });
})(jQuery);

(function($) {
    jQuery(".gossip-close-trigger").click(function() {
        jQuery(".gossip-mobile-container nav").removeClass("gossip-nav-open");
    });
})(jQuery);



//adding some tags after and before iframe
(function($) {
    $("iframe").after("</div>");
    $("iframe").wrap("<div class=\"gossip-embed-container\">"); 
})(jQuery);


//adding search value
(function($) {
    $('input[type="submit"].search-submit').val('');
})(jQuery);

//Adding some class in comment form

(function($) {
    jQuery(".comment-form-author").addClass("form-group");
    jQuery(".comment-form-email").addClass("form-group");
    jQuery(".comment-form-url").addClass("form-group");
    jQuery(".comment-form-comment").addClass("form-group");

    jQuery(".comment-form-author input").attr("placeholder", "Your Name *");
    jQuery(".comment-form-email input").attr("placeholder", "Your Email *");
    jQuery(".comment-form-url input").attr("placeholder", "Your Website");
    jQuery(".gossip-comment-form textarea").attr("placeholder", "Your Message");

    jQuery(".gossip-comment-form #submit").addClass("gossip-btn");
    jQuery(".gossip-comment-form input").addClass("form-control gossip-form-control");
    jQuery(".gossip-comment-form textarea").addClass("form-control gossip-form-control");

})(jQuery);

