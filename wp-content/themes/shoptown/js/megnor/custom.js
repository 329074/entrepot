// Megnor Start

"use strict";
function isotopAutoSet() {
    var e = jQuery.noConflict();
    e(function() {
        "use strict";
        var t = e("#container .masonry");
        e("#container .masonry").css("display", "block");
        e("#container .loading").css("display", "none");
        t.isotope({})
    });
    var t = jQuery.noConflict();
    t(function() {
        "use strict";
        var e = t("#box_filter");
        t("#container #box_filter").css("display", "block");
        t("#container .loading").css("display", "none");
        e.isotope({});
        var n = t("#blog_filter_options .option-set"),
            r = n.find("a");
        r.click(function() {
            var n = t(this);
            if (n.hasClass("selected")) {
                return false
            }
            var r = n.parents(".option-set");
            r.find(".selected").removeClass("selected");
            n.addClass("selected");
            var i = {},
                s = r.attr("data-option-key"),
                o = n.attr("data-option-value");
            o = o === "false" ? false : o;
            i[s] = o;
            if (s === "layoutMode" && typeof changeLayoutMode === "function") {
                changeLayoutMode(n, i)
            } else {
                e.isotope(i)
            }
            return false
        })
    });	
	//jQuery('.woocommerce .products').jscroll();	
    var n = jQuery.noConflict();
    n(function() {
        "use strict";
        var e = n("#portfolio_filter");
        t("#portfolio_filter").css("display", "block");
        t(".loading").css("display", "none");
        e.isotope({});
        var r = n("#portfolio_filter_options .option-set"),
            i = r.find("a");
        i.click(function() {
            var t = n(this);
            if (t.hasClass("selected")) {
                return false
            }
            var r = t.parents(".option-set");
            r.find(".selected").removeClass("selected");
            t.addClass("selected");
            var i = {},
                s = r.attr("data-option-key"),
                o = t.attr("data-option-value");
            o = o === "false" ? false : o;
            i[s] = o;
            if (s === "layoutMode" && typeof changeLayoutMode === "function") {
                changeLayoutMode(t, i)
            } else {
                e.isotope(i)
            }
            return false
        })
    })
}
// JS for calling Mega Menu
function callMegaMenu() {
	"use strict";
	var e,menucolumn = 4;
	if (jQuery(window).width() >= 980) {
		e = "hover";
		jQuery(".mega-menu .mega,.sidebar-category .mega, .contactmega").dcMegaMenu({
			rowItems: menucolumn,
			speed: "fast",
			effect: "slide",
			event: e,
			fullWidth: false,
			mbarIcon: true
		})
	}	
}
jQuery(window).load(function() {"use strict";callMegaMenu()});
jQuery(window).resize(function() {"use strict"; callMegaMenu()});

jQuery(document).ready(function() {
    "use strict";
	
	jQuery(".primary-sidebar .tagcloud,.widget_text .textwidget,.primary-sidebar .widget_shopping_cart_content").addClass("toggle-block");
    jQuery(".primary-sidebar .calendar_wrap").addClass("toggle-block");
	jQuery(".primary-sidebar .widget select").addClass("toggle-block");
	jQuery(".postform").addClass("toggle-block");
	jQuery(".primary-sidebar .woocommerce-product-search,.primary-sidebar #searchform").addClass("toggle-block");
    jQuery(".primary-sidebar .price_slider_wrapper").addClass("toggle-block");    
    jQuery(".tagcloud").addClass("toggle-block");
	jQuery(".primary-sidebar .widget ul,.primary-sidebar .menu-menu-container").addClass("toggle-block");
	jQuery(".product-categories ul,ul.sidebar-category-inner").addClass("toggle-block");
	jQuery(".home-category ul").addClass("toggle-block");
	jQuery( '.category,.product,.gallery-item,.single-portfolio,.portfolios li, .portfolios li:hover .other-box ,.cms-banner-inner,.brand-carousel .product-block ,.widgets-cms ,.follow-us a ,.counter,.service-content' ).doubleTapToGo();

jQuery(".box-category-heading").click(function() { 
		 jQuery(".widget_product_categories").slideToggle("slow");
	});

	jQuery('.mega_menu .block-title').click(function() {
		jQuery('.product-categories').slideToggle("slow");
		
	});
	
    Shadowbox.init({
        overlayOpacity: .8
    }, setupDemos);
    jQuery("br", ".liststyle_content").remove();

    jQuery("select.orderby").customSelect();
    jQuery("ul li:empty").remove();
    jQuery("br", ".brand_block").remove();
    jQuery("br", ".pricing-content-inner").remove();
    jQuery("br", "#vertical_tab .tabs").remove();
	
    jQuery("p").each(function() {
        var e = jQuery(this);
        if (e.html().replace(/\s|&nbsp;/g, "").length == 0) e.remove()
    });
    var e = jQuery.noConflict();
    e(".nav-button").click(function() {
        e(".nav-button, .primary-nav").toggleClass("open")
    });
  jQuery(".woocommerce-breadcrumb").appendTo(jQuery(".main-content .page-title-inner"));

jQuery(".gridlist-toggle").prependTo(jQuery("#primary #content"));
    jQuery(".woocommerce-result-count").wrap(" <div class='category-toolbar'> </div>");
	jQuery(".products .product-category").wrapInner(" <div class='container-inner'> </div>");	
    jQuery(".woocommerce-ordering").appendTo(".category-toolbar");
    jQuery(".gridlist-toggle").prependTo(".category-toolbar");		
    jQuery(".accordion.style5 .single_accordion").each(function(e) {
        jQuery(this).addClass("accord-" + (e + 1))
    });
    jQuery(".quantity.buttons_added").find("input.input-text").attr({
        type: "text"
    });
    jQuery(".nav-menu:first > li").each(function(e) {
        jQuery(this).addClass("main-li")
    });

    jQuery("#woo-small-products p img").each(function(e) {
        jQuery(this).wrap("<div class='image-block'> </div>")
    });
	jQuery(".primary-sidebar .widget .widget-title,.content-sidebar .widget .widget-title,.site-footer .widget-title").each(function(e) {
        jQuery(this).wrap("<div class='title-outer'> </div>")
    });
	

    jQuery(".sub-container .inner-image").each(function(e) {
        jQuery(this).addClass("image-" + (e + 1))
    });
	
	jQuery(" .product-categories").each(function(e) {   jQuery(this).wrap("<div class='sidebar-category'> </div>");  });	
	jQuery(" .product-categories").addClass('mega');
	jQuery(" .product-categories").addClass('sidebar-category-inner');
	
	
	
    jQuery(document).ready(function() {
        "use strict";
        jQuery("#horizontalTab").easyResponsiveTabs({
            type: "default",
            width: "auto",
            fit: true,
            closed: "accordion",
            activate: function(e) {
                var t = jQuery(this);
                var n = jQuery("#tabInfo");
                
                r.text(t.text());
                n.show()
            }
        })
    });
    jQuery(document).ready(function() {
        "use strict";
        jQuery("#categorytab").easyResponsiveTabs({
            type: "default",
            width: "auto",
            fit: true,
            closed: "accordion",
            activate: function(e) {
                var t = jQuery(this);
                var n = jQuery("#tabInfo");
                
                r.text(t.text());
                n.show()
            }
        })
    });
	
	
    (function(e) {
        "use strict";
        var t;
        var n = false;
        var r = e("#to_top");
        var i = e(window);
        var s = e(document.body).children(0).position().top;
        e("#to_top").click(function(t) {
            t.preventDefault();
            e("html, body").animate({
                scrollTop: 0
            }, "slow")
        });
        i.scroll(function() {
            window.clearTimeout(t);
            t = window.setTimeout(function() {
                if (i.scrollTop() <= s) {
                    n = false;
                    r.fadeOut(500)
                } else if (n == false) {
                    n = true;
                    r.stop(true, true).show().click(function() {
                        r.fadeOut(500)
                    })
                }
            }, 100)
        })
    })(jQuery);
    (function(e) {
        "use strict";
        e(".toogle_div a.tog").click(function(t) {
            var n = e(this).parent().find(".tab_content");
            e(this).parent().find(".tab_content").not(n).slideUp();
            if (e(this).hasClass("current")) {
                e(this).removeClass("current")
            } else {
                e(this).addClass("current")
            }
            n.stop(false, true).slideToggle().css({
                display: "block"
            });
            t.preventDefault()
        })
    })(jQuery);
    (function(e) {
        "use strict";
        var t = e(".accordion .tab_content").hide();
        e(".accordion a").click(function() {
            t.slideUp();
            e(this).parent().next().slideDown();
            return false
        })
    })(jQuery);
    (function(e) {
        "use strict";
        e(".togg div.tog").click(function(t) {
            var n = e(this).parent().find(".tab_content");
            e(this).parent().find(".tab_content").not(n).slideUp();
            if (e(this).hasClass("current")) {
                e(this).removeClass("current")
            } else {
                e(this).addClass("current")
            }
            n.stop(false, true).slideToggle().css({
                display: "block"
            });
            t.preventDefault()
        })
    })(jQuery);
    (function(e) {
        "use strict";
        e(".accordion a.tog").click(function(t) {
            var n = e(this).parent().find(".tab_content");
            e(this).parent().parent().find(".tab_content").not(n).slideUp();
            if (e(this).hasClass("current")) {
                e(this).removeClass("current")
            } else {
                e(this).parent().parent().find(".tog").removeClass("current");
                e(this).addClass("current");
                n.stop(false, true).slideToggle().css({
                    display: "block"
                })
            }
            t.preventDefault()
        })
    })(jQuery);
    (function(e) {
        "use strict";
        e(".accordion.style5 .accord-1 a.tog").addClass("current");
        e(".accordion.style5 .accord-1 a.tog").parent().find(".tab_content").stop(false, true).slideToggle().css({
            display: "block"
        });
        e(".accordion.style5 .accord-1 a.tog").click(function(t) {
            var n = e(this).parent().find(".tab_content");
            e(this).parent().parent().find(".tab_content").not(n).slideUp();
            if (e(this).hasClass("current")) {
                e(this).removeClass("current");
                e(".accordion.style5 .accord-1 a.tog").removeClass("current")
            } else {
                e(this).parent().parent().find(".tog").removeClass("current");
                e(this).addClass("current");
                n.stop(false, true).slideToggle().css({
                    display: "block"
                })
            }
            t.preventDefault()
        })
    })(jQuery);
    (function(e) {
        "use strict";
        e(".tab ul.tabs li:first-child a").addClass("current");
        e(".tab .tab_groupcontent div.tabs_tab").hide();
        e(".tab .tab_groupcontent div.tabs_tab:first-child").css("display", "block");
        e(".tab ul.tabs li a").click(function(t) {
            var n = e(this).parent().parent().parent(),
                r = e(this).parent().index();
            n.find("ul.tabs").find("a").removeClass("current");
            e(this).addClass("current");
            n.find(".tab_groupcontent").find("div.tabs_tab").not("div.tabs_tab:eq(" + r + ")").slideUp();
            n.find(".tab_groupcontent").find("div.tabs_tab:eq(" + r + ")").slideDown();
            t.preventDefault()
        })
    })(jQuery);
    (function(e) {
        "use strict";
        e(".animated").each(function() {
            e(this).one("inview", function(t, n) {
                var r = "";
                var i = e(this),
                    s = i.data("animated") !== undefined ? i.data("animated") : "slideUp";
                r = i.data("delay") !== undefined ? i.data("delay") : 300;
                if (n === true) {
                    setTimeout(function() {
                        i.addClass(s);
                        i.css("opacity", 1)
                    }, r)
                } else {
                    setTimeout(function() {
                        i.removeClass(s);
                        i.css("opacity", 0)
                    }, r)
                }
            })
        })
    })(jQuery);
    (function(e) {
        "use strict";
        e(".active_progresbar > span").each(function() {
            e(this).data("origWidth", e(this).width()).width(0).animate({
                width: e(this).data("origWidth")
            }, 1200)
        })
    })(jQuery);
    jQuery("#commentform textarea").addClass("required");
    jQuery("#commentform").validate();
    jQuery("#shortcode_contactform").validate();
    var n = jQuery.noConflict();
		var $owl_carousel=jQuery.noConflict();	
    jQuery(".portfolio-carousel").each(function() {
        if (n(this).attr("id")) {
            var e = n(this).attr("id").replace("_portfolio_carousel", "");
            n(".portfolio-carousel").addClass("owl-carousel");
            n(".portfolio-carousel").owlCarousel({
                navigation: true,
                pagination: false,
                items: e,
                itemsDesktop: [1199, e],
                itemsDesktopSmall: [979, 3],
                itemsTablet: [767, 2],
                itemsMobile: [479, 1]
            })
        }
    });
    jQuery(".latest-news-carousel").each(function() {
        if (n(this).attr("id")) {
            var e = n(this).attr("id").replace("_latest_news_carousel", "");
            n(".latest-news-carousel").addClass("owl-carousel");
            n(".latest-news-carousel").owlCarousel({
                navigation: true,
                pagination: false,
                items: e,
                itemsDesktop: [1199, e],
                itemsDesktopSmall: [979, 1],
                itemsTablet: [767, 1],
                itemsMobile: [479, 1]
            })
        }
    });
	jQuery(".blog-carousel").each(function() {
        if (n(this).attr("id")) {
            var e = n(this).attr("id").replace("_blog_carousel", "");
            n(".blog-carousel").addClass("owl-carousel");
            n(".blog-carousel").owlCarousel({
                navigation: true,
                pagination: false,
                items: e,
                itemsDesktop: [1199, e],
                itemsDesktopSmall: [979, 3],
                itemsTablet: [767, 2],
                itemsMobile: [479, 1]
            })
        }
    });
	jQuery(".sidebar-blog-carousel").each(function() {
        if (n(this).attr("id")) {
            var e = n(this).attr("id").replace("_sidebar_blog_carousel", "");
            n(".sidebar-blog-carousel").addClass("owl-carousel");
            n(".sidebar-blog-carousel").owlCarousel({
                navigation: true,
                pagination: false,
                items: e,
                itemsDesktop: [1199, e],
                itemsDesktopSmall: [979, 1],
                itemsTablet: [767, 1],
                itemsMobile: [479, 1]
            })
        }
    });
    jQuery(".cat-carousel").each(function() {
        if (n(this).attr("id")) {
            var e = n(this).attr("id").replace("_cat_carousel", "");
            n(".cat-carousel").addClass("owl-carousel");
            n(".cat-carousel").owlCarousel({
                navigation: true,
                pagination: false,
                items: e,
				itemsLarge: [1400, e],
                itemsDesktop: [1249, 3],
                itemsDesktopSmall: [979, 2],
                itemsTablet: [767, 2],
                itemsMobile: [479, 1]
            })
        }
    });
    jQuery(".brand-carousel").each(function() {
        if (n(this).attr("id")) {
            var e = n(this).attr("id").replace("_brand_carousel", "");
            n(".brand-carousel").addClass("owl-carousel");
            n(".brand-carousel").owlCarousel({
                navigation: true,
                pagination: false,
                items: e,
				itemsLarge: [1400, e],
                itemsDesktop: [1199, 4],
                itemsDesktopSmall: [979, 3],
                itemsTablet: [600, 2],
                itemsMobile: [479, 1]
            })
        }
    });
    jQuery(".testimonial-carousel").each(function() {
        if (n(this).attr("id")) {
            var e = n(this).attr("id").replace("_testimonial_carousel", "");
            n(".testimonial-carousel").addClass("owl-carousel");
            n(".testimonial-carousel").owlCarousel({
                navigation: false,
                pagination: true,
                items: e,
                itemsDesktop: [1199, e],
                itemsDesktopSmall: [979, 1],
                itemsTablet: [767, 1],
                itemsMobile: [479, 1]
            })
        }
    });
	 var r = n(".upsells ul.products li").length;
		if (r > 4) {
			n(".upsells ul.products").addClass("owl-carousel");
			n(".upsells ul.products").owlCarousel({
				navigation: true,
				pagination: false,
				items: 4,
				itemsDesktop: [1199, 4],
				itemsDesktopSmall: [979, 3],
				itemsTablet: [767, 2],
				itemsMobile: [479, 1]
			})
		}
	 var i = n(".cross-sells ul.products li").length;
		if (i > 3) {
			n(".cross-sells ul.products").addClass("owl-carousel");
			n(".cross-sells ul.products").owlCarousel({
				navigation: true,
				pagination: false,
				items: 4,
				itemsDesktop: [1199, 4],
				itemsDesktopSmall: [979, 3],
				itemsTablet: [767, 2],
				itemsMobile: [479, 1]
			})
		}
	var k = n(".related ul.products li").length;
		if (k > 4) {
			n(".related ul.products").addClass("owl-carousel");
			n(".related ul.products").owlCarousel({
				navigation: true,
				pagination: false,
				items: 4,
				itemsDesktop: [1199, 4],
				itemsDesktopSmall: [979, 3],
				itemsTablet: [767, 2],
				itemsMobile: [479, 1]
			})
	}
    jQuery(".team-carousel").each(function() {
        if (n(this).attr("id")) {
            var e = n(this).attr("id").replace("_team_carousel", "");
            n(".team-carousel").addClass("owl-carousel");
            n(".team-carousel").owlCarousel({
                navigation: true,
                pagination: false,
                items: e,
                itemsLarge: [1400, e],
                itemsDesktop: [1199, 4],
                itemsDesktopSmall: [979, 3],
                itemsTablet: [767, 2],
                itemsMobile: [479, 1]
            })
        }
    });
    jQuery(".woo-carousel").each(function() {
        if (n(this).attr("id")) {
            var e = n(this).attr("id").replace("_woo_carousel", "");
            var t = n(this).find("ul.products .product").length;
            if (t > e) {
                n(this).find("ul.products").addClass("owl-carousel");
                n(this).find("ul.products").owlCarousel({
                    navigation: true,
                    pagination: false,
                    items: e,
					autoPlay: 5000,
                   	itemsLarge: [1400, e],
               		itemsDesktop: [1199, 4],
                    itemsDesktopSmall: [979, 3],
                    itemsTablet: [600, 2],
                    itemsMobile: [479, 1]
                })
            }
        }
    })
	
});
document.createElement("div");
document.createElement("section");
jQuery(window).load(function() {
    "use strict";
    isotopAutoSet()
});
jQuery(window).resize(function() {
    "use strict";
    isotopAutoSet()
});


// JS toggle for sidebar and footer
function SidebarFooterToggle(){	
"use strict";	
jQuery('.primary-sidebar .title-outer,.site-footer .title-outer,.toggle-content .title-outer').click(function () {
if(jQuery(this).parent().hasClass('toggled-on')){	   
jQuery(this).parent().removeClass('toggled-on');
jQuery(this).parent().addClass('toggled-off');
}
else {
jQuery(this).parent().addClass('toggled-on');
jQuery(this).parent().removeClass('toggled-off');
}
return (false);
});
}
jQuery(document).ready(function() {
    "use strict";
    SidebarFooterToggle()
});

// JS for adding treeview in navigationMenu sidebar product category
function leftCatMenu() {
	    "use strict";
	if (jQuery(window).width() < 980){
			jQuery('.product-categories').addClass('treeview-list');
			jQuery(".product-categories.treeview-list").treeview({
				animated: "slow",
				collapsed: true,
				unique: true		
			});
			jQuery('.treeview-list .collapsable ul').css('display','block');
	}
}
jQuery(document).ready(function() {
    "use strict";
    leftCatMenu()
});

// JS for adding treeview in Mobile Menu
function mobilenavigationMenu() {
    "use strict";
    jQuery('.mobile-menu .mobile-menu-inner').addClass('treeview-list');
    jQuery(".mobile-menu .mobile-menu-inner.treeview-list").treeview({
        animated: "slow",
        collapsed: true,
        unique: true
    });
}
jQuery(window).load(function() {
    "use strict";
    mobilenavigationMenu()
});

// JS for treeview for sidebar product category,widget category
function navigationMenu(){
	"use strict";
	jQuery('.widget_nav_menu,.widget_categories').addClass('treeview-list');
	jQuery(".widget_nav_menu.treeview-list,.widget_categories.treeview-list").treeview({
		animated: "slow",
		collapsed: true,
		unique: true		
	});
	jQuery('.treeview-list a.active').parent().removeClass('expandable');
	jQuery('.treeview-list a.active').parent().addClass('collapsable');
	jQuery('.treeview-list .collapsable ul').css('display','block');
}
jQuery(window).load(function() {
    "use strict";
    navigationMenu()
});

// JS for treeview for sidebar page list
function leftPageMenu(){
	"use strict";
	jQuery("#secondary .widget_pages ul").addClass('page-list');
	jQuery("#secondary .widget_pages ul.page-list").treeview({
		animated: "slow",
		collapsed: true,
		unique: true		
	});
}
jQuery(window).load(function() {
    "use strict";
    leftPageMenu()
});

// JS for calling Owl Carousel
jQuery(window).load(function() {
    "use strict";  
	jQuery('.aboutus .slides').owlCarousel({	
		items: 1,
		autoPlay: 5000,
		singleItem: true,
		navigation: false,
		pagination: true,
		transitionStyle: 'fade'
  });
	jQuery('.productpage-banner .slides').owlCarousel({	
		items: 1,
		autoPlay: 3000,
		singleItem: true,
		navigation: false,
		pagination: true,
		transitionStyle: 'fade'
  });
});

// JS for move the cross sale section	
function preloadFunc(){
	"use strict";
	jQuery(".cross-sells").appendTo(".cart-collaterals");	      
	jQuery(".product_list_widget li:last-child").addClass("last");  
}
jQuery(document).ready(function() {
    "use strict";
    preloadFunc();
});

// JS for adding active class in Mobile Menu
function mobileMenu(){	
"use strict";
	if (jQuery(window).width() < 768){
			jQuery('.mega-menu .mega').attr('id', 'menu-menu');
			jQuery('#menu-all-pages').removeClass('mega');		
			jQuery('.mega-menu > ul').removeClass('mega');					
	}else {
		jQuery('.mega-menu .mega > ul').addClass('mega');
		jQuery('.mega-menu .mega > ul').attr('id', 'menu-menu');
	}
	jQuery(".main-navigation").addClass('toggled-on');		 
	jQuery('.menu-toggle').click( function(){
			if ( jQuery(this).parent().hasClass('active') ) {			
				jQuery(this).parent().removeClass('active');				
			} else {
			jQuery('.menu-toggle').parent().removeClass('active');
					jQuery(this).parent().addClass('active'); 					 
			}
		});
}
jQuery(document).ready(function() { "use strict"; mobileMenu();});

// JS for adding menu more link in navigation
function moreTab() {
	"use strict";
	var max_elem = 5;
	if (jQuery(window).width() < 1251) {
		var max_elem = 4;
		jQuery('#site-navigation').addClass('more');
		jQuery('#site-navigation.more .mega > li').first().addClass('home_first');
		var items = jQuery('#site-navigation.more .mega > li');
		var surplus = items.slice(max_elem, items.length);	
		surplus.wrapAll('<li class="cat-item level-0 hiden_menu cat-parent"><ul class="children">');
		jQuery('.hiden_menu').prepend('<a href="#" class="level-0  activSub">More</a>');	
	}
	
}
jQuery(document).ready(function() {
    "use strict";
    moreTab()
});

// JS for calling parallax
jQuery(window).load(function(){	 
	"use strict";
	var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent);
	if(!isMobile) {
		if(jQuery(".parallax").length){  jQuery(".parallax").sitManParallex({  invert: false });};    
	}else{
		jQuery(".parallax").sitManParallex({  invert: true });
		
		}	
});



// JS for calling account toggle,top bar link toggle and responsive menu toggle
jQuery(document).ready(function() {
	"use strict";
	jQuery('.account-toggle').click(function(){
		jQuery(".account-container").slideToggle("medium");				
	});
	
	 jQuery('.topbar-link-toggle').click(function(){
		jQuery(".topbar-link-wrapper").slideToggle("medium");				
	});	
});


// JS for home accordian shortcode
jQuery(document).ready(function() {
	"use strict";
	jQuery('#accordion.style-1').find('.accordion-toggle').click(function(){ 	
      //Expand or collapse this panel
      jQuery(this).next().slideToggle('fast'); 	  
      //Hide the other panels
      jQuery(".style-1 .accordion-content").not(jQuery(this).next()).slideUp('fast');
    });
});



function top_banner(){
	   "use strict";
	 	if(jQuery('body').hasClass('home')){
			jQuery('.header-top-banner').show();
		}
	 
		jQuery(".close-btn").on("click", function() {
			jQuery(this).fadeOut(100);
			jQuery('.header-top-banner').slideUp(1000);
		});
	
}

jQuery(document).ready(function(){  "use strict";top_banner();});


/*JS for More link in Sidebar Category block*/
jQuery(function($){	
"use strict"; 
	if(jQuery(window).width() > 1200) {					
	var max_elem = 9;
	jQuery('.home-category .sidebar-category .sidebar-category-inner > li.cat-item').first().addClass('home_first');
	var items = jQuery('.home-category .sidebar-category .sidebar-category-inner > li.cat-item');
	var surplus = items.slice(max_elem, items.length);		
	surplus.wrapAll('<li class="cat-item level-0 cat-parent hiden_menu "><ul class="children">');
	jQuery('.home-category .sidebar-category .hiden_menu').prepend('<a href="#" class="level-0 activSub">More</a>');		
 }
 	if(jQuery(window).width() > 979 && jQuery(window).width() <= 1200) {					
	var max_elem = 8 ;
	jQuery('.home-category .sidebar-category .sidebar-category-inner > li.cat-item').first().addClass('home_first');
	var items = jQuery('.home-category .sidebar-category .sidebar-category-inner > li.cat-item');
	var surplus = items.slice(max_elem, items.length);		
	surplus.wrapAll('<li class="cat-item level-0 cat-parent hiden_menu "><ul class="children">');
	jQuery('.home-category .sidebar-category .hiden_menu').prepend('<a href="#" class="level-0 activSub">More</a>');		
 }
});	
/*JS for Sidebar Category block*/

jQuery(window).load(function() {
    "use strict";
  	jQuery(".products .container-inner .product-detail-wrapper").find(".add_to_cart_button,.product_type_external,.product_type_grouped").each(function(i){
		jQuery(this).appendTo(jQuery(this).parent().parent().parent().find(".product-block-hover"));
	});
	jQuery(".products .container-inner .product-detail-wrapper").find(".yith-wcqv-button").each(function(i){
	//	jQuery(this).appendTo(jQuery(this).parent().parent().find(".image-block"));
		jQuery(this).appendTo(jQuery(this).parent().parent().find(".product-block-hover"));
	});
	jQuery(".products .container-inner .product-detail-wrapper").find(".compare-button").each(function(i){
		jQuery(this).appendTo(jQuery(this).parent().parent().parent().find(".product-block-hover"));
	});	
		jQuery(".products .container-inner .product-detail-wrapper").find(".yith-wcwl-add-to-wishlist").each(function(i){
		jQuery(this).appendTo(jQuery(this).parent().parent().parent().find(".product-block-hover"));
	});

})



// JS for Quantity increase decrease
function quntity() {
    "use strict";
 	 var input;						
        jQuery('.quantity').on('click', '.plus', function(e) {
			input = jQuery(this).prev('input.qty');
            var val = parseInt(input.val());
            input.val( val+1 ).change();
       });
 
        jQuery('.quantity').on('click', '.minus', 
            function(e) {
            input = jQuery(this).next('input.qty');
            var val = parseInt(input.val());
            if (val > 1) {
                input.val( val-1 ).change();
            } 
        });
}
jQuery(document).ready(function() {
    quntity();
});
 
// add to cart button added
jQuery(document).ready(function() {
"use strict";					
jQuery(".add_to_cart_button").click(function() {
		 var rows = jQuery(".product-block-hover .add_to_cart_button");
		  setTimeout(function() {
		 rows.removeClass("added");
   },6000);
	});
});