/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @since       3.2
 */

(function($)
{
	$(document).ready(function()
	{

        // Trigger Progress Bar
        $(".progress-bar").css("width","1%");

        // Owl Carousel
        $("#quotes").owlCarousel({
            singleItem : true
        });

		$('*[rel=tooltip]').tooltip()

		// Turn radios into btn-group
		$('.radio.btn-group label').addClass('btn');
		$(".btn-group label:not(.active)").click(function()
		{
			var label = $(this);
			var input = $('#' + label.attr('for'));

			if (!input.prop('checked')) {
				label.closest('.btn-group').find("label").removeClass('active btn-success btn-danger btn-primary');
				if (input.val() == '') {
					label.addClass('active btn-primary');
				} else if (input.val() == 0) {
					label.addClass('active btn-danger');
				} else {
					label.addClass('active btn-success');
				}
				input.prop('checked', true);
			}
		});
		$(".btn-group input[checked=checked]").each(function()
		{
			if ($(this).val() == '') {
				$("label[for=" + $(this).attr('id') + "]").addClass('active btn-primary');
			} else if ($(this).val() == 0) {
				$("label[for=" + $(this).attr('id') + "]").addClass('active btn-danger');
			} else {
				$("label[for=" + $(this).attr('id') + "]").addClass('active btn-success');
			}
		});

        // Revolution Slider
        (function() {

            "use strict";

            var Home = {

                initialized: false,

                initialize: function() {

                    if (this.initialized) return;
                    this.initialized = true;

                    this.build();
                    this.events();

                },

                build: function(options) {

                    // Circle Slider
                    if($("#fcSlideshow").get(0)) {
                        $("#fcSlideshow").flipshow();

                        setInterval( function() {
                            $("#fcSlideshow div.fc-right span:first").click();
                        }, 3000);

                    }

                    // Revolution Slider Initialize
                    $("#revolutionSlider").each(function() {

                        var slider = $(this);

                        var defaults = {
                            delay: 9000,
                            startheight: 552,
                            startwidth: 1400,

                            hideThumbs: 10,

                            thumbWidth: 100,
                            thumbHeight: 50,
                            thumbAmount: 5,

                            navigationType: "both",
                            navigationArrows: "verticalcentered",
                            navigationStyle: "round",

                            touchenabled: "on",
                            onHoverStop: "on",

                            navOffsetHorizontal: 0,
                            navOffsetVertical: 20,

                            stopAtSlide: 0,
                            stopAfterLoops: -1,

                            shadow: 0,
                            fullWidth: "on",
                            videoJsPath: "vendor/rs-plugin/videojs/"
                        }

                        var config = $.extend({}, defaults, options, slider.data("plugin-options"));

                        // Initialize Slider
                        var sliderApi = slider.revolution(config).addClass("slider-init");

                        // Set Play Button to Visible
                        sliderApi.bind("revolution.slide.onloaded ",function (e,data) {
                            $(".home-player").addClass("visible");
                        });

                    });

                    // Revolution Slider One Page
                    if($("#revolutionSliderFullScreen").get(0)) {
                        var rev = $("#revolutionSliderFullScreen").revolution({
                            delay: 9000,
                            startwidth: 1400,
                            startheight: 552,

                            hideThumbs: 200,

                            thumbWidth: 100,
                            thumbHeight: 50,
                            thumbAmount: 5,

                            navigationType: "both",
                            navigationArrows: "verticalcentered",
                            navigationStyle: "round",

                            touchenabled: "on",
                            onHoverStop: "on",

                            navOffsetHorizontal: 0,
                            navOffsetVertical: 20,

                            stopAtSlide: -1,
                            stopAfterLoops: -1,

                            shadow: 0,
                            fullWidth: "on",
                            fullScreen: "on",
                            fullScreenOffsetContainer: ".header",
                            videoJsPath: "vendor/rs-plugin/videojs/"
                        });

                    }

                    // Nivo Slider
                    if($("#nivoSlider").get(0)) {
                        $("#nivoSlider").nivoSlider();
                    }

                },

                events: function() {

                    this.moveCloud();

                },

                moveCloud: function() {

                    var $this = this;

                    $(".cloud").animate( {"top": "+=20px"}, 3000, "linear", function() {
                        $(".cloud").animate( {"top": "-=20px"}, 3000, "linear", function() {
                            $this.moveCloud();
                        });
                    });

                }

            };

            Home.initialize();

        })();

        // Custom Code
        $('#homeHeaderCarousel').carousel({
            interval: 5000
        });
        $('#testimonialsCarousel').carousel({
            interval: 10000
        });

        var servicesCarousel = $('#servicesCarousel');
        servicesCarousel.owlCarousel({
            items: 4,
            itemsTablet: [767,2],
            pagination: false,
            slideSpeed: 400,
            addClassActive: true
        });
        $(".next").click(function(){
            servicesCarousel.trigger('owl.next');
        });
        $(".prev").click(function(){
            servicesCarousel.trigger('owl.prev');
        });

        $('.expanded').addClass('toggleable');
        $('.toggleable').show();
        toggleExpandedServices($('.owl-item .item:first'));

        $('.owl-item .item').click(function(){
            toggleExpandedServices($(this));
        });

        function toggleExpandedServices(activeSlide) {
            $('.owl-item .item').removeClass('arrow');
            activeSlide.addClass('arrow');
            var activeTag = activeSlide.attr('data-selector');
            var jQueryTag = "div[data-select='" + activeTag + "']";
            var activeItem = $(jQueryTag);

            $('.toggleable').removeClass('visible');
            activeItem.addClass('visible');
        }

        $('.nav-toggle').click(function(){
            toggleExpandedMenu();
        });
        $('.menu-overlay').click(function(){
            toggleExpandedMenu();
        });

        function toggleExpandedMenu(){
            $('.nav-main-collapse').toggleClass('expanded');
            $('.body').toggleClass('expanded');
            $('.menu-overlay').toggleClass('expanded');
        }
	})

})(jQuery);