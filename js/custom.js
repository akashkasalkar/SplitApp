productScroll();

function productScroll() {
	let slider = document.getElementById("slider");
	let next = document.getElementsByClassName("pro-next");
	let prev = document.getElementsByClassName("pro-prev");
	let slide = document.getElementById("slide");
	let item = document.getElementById("slide");

	for (let i = 0; i < next.length; i++) {
		//refer elements by class name

		let position = 0; //slider postion

		prev[i].addEventListener("click", function () {
			//click previos button
			if (position > 0) {
				//avoid slide left beyond the first item
				position -= 1;
				translateX(position); //translate items
			}
		});

		next[i].addEventListener("click", function () {
			if (position >= 0 && position < hiddenItems()) {
				//avoid slide right beyond the last item
				position += 1;
				translateX(position); //translate items
			}
		});
	}

	function hiddenItems() {
		//get hidden items
		let items = getCount(item, false);
		let visibleItems = slider.offsetWidth / 210;
		return items - Math.ceil(visibleItems);
	}
}

function translateX(position) {
	//translate items
	slide.style.left = position * -210 + "px";
}

function getCount(parent, getChildrensChildren) {
	//count no of items
	let relevantChildren = 0;
	let children = parent.childNodes.length;
	for (let i = 0; i < children; i++) {
		if (parent.childNodes[i].nodeType != 3) {
			if (getChildrensChildren)
				relevantChildren += getCount(parent.childNodes[i], true);
			relevantChildren++;
		}
	}
	return relevantChildren;
}


$(document).ready(function () {
	"use strict";

	/* 

	1. Vars and Inits

	*/

	var header = $('.header');
	var headerSocial = $('.header_social');
	var menu = $('.menu');
	var menuActive = false;
	var burger = $('.hamburger');

	setHeader();

	$(window).on('resize', function () {
		setHeader();

		setTimeout(function () {
			$(window).trigger('resize.px.parallax');
		}, 375);
	});

	$(document).on('scroll', function () {
		setHeader();
	});

	initMenu();
	initHomeSlider();
	initIsotope();
	initTestimonialsSlider();
	initScrolling();
	initInput();

	/* 

	2. Set Header

	*/

	function setHeader() {
		if ($(window).scrollTop() > 127) {
			header.addClass('scrolled');
			headerSocial.addClass('scrolled');
		}
		else {
			header.removeClass('scrolled');
			headerSocial.removeClass('scrolled');
		}
	}

	/* 

	3. Set Menu

	*/

	function initMenu() {
		if ($('.menu').length) {
			var menu = $('.menu');
			if ($('.hamburger').length) {
				burger.on('click', function () {
					if (menuActive) {
						closeMenu();
					}
					else {
						openMenu();
					}
				});
			}
		}
		if ($('.menu_close').length) {
			var close = $('.menu_close');
			close.on('click', function () {
				if (menuActive) {
					closeMenu();
				}
			});
		}
	}

	function openMenu() {
		menu.addClass('active');
		menuActive = true;
	}

	function closeMenu() {
		menu.removeClass('active');
		menuActive = false;
	}

	/* 

	4. Init Home Slider

	*/

	function initHomeSlider() {
		if ($('.home_slider').length) {
			var homeSlider = $('.home_slider');
			homeSlider.owlCarousel(
				{
					items: 1,
					autoplay: false,
					loop: true,
					nav: false,
					dots: false,
					smartSpeed: 1200
				});
		}
	}

	/* 

	5. Init Scrolling

	*/

	function initScrolling() {
		if ($('.home_page_nav ul li a').length) {
			var links = $('.home_page_nav ul li a');
			links.each(function () {
				var ele = $(this);
				var target = ele.data('scroll-to');
				ele.on('click', function (e) {
					e.preventDefault();
					$(window).scrollTo(target, 1500, { offset: -90, easing: 'easeInOutQuart' });
				});
			});
		}
	}

	/* 

	6. Init Isotope

	*/

	function initIsotope() {
		if ($('.item_grid').length) {
			var grid = $('.item_grid').isotope({
				itemSelector: '.item',
				getSortData:
				{
					price: function (itemElement) {
						var priceEle = $(itemElement).find('.destination_price').text().replace('From $', '');
						return parseFloat(priceEle);
					},
					name: '.destination_title a'
				},
				animationOptions:
				{
					duration: 750,
					easing: 'linear',
					queue: false
				}
			});
		}
	}

	/* 

	7. Init Testimonials Slider

	*/

	function initTestimonialsSlider() {
		if ($('.testimonials_slider').length) {
			var testSlider = $('.testimonials_slider');
			testSlider.owlCarousel(
				{
					animateOut: 'fadeOut',
					animateIn: 'flipInX',
					items: 1,
					autoplay: true,
					loop: true,
					smartSpeed: 1200,
					dots: false,
					nav: false
				});
		}
	}

	/* 

	8. Init Input

	*/

	function initInput() {
		if ($('.newsletter_input').length) {
			var inpt = $('.newsletter_input');
			inpt.each(function () {
				var ele = $(this);
				var border = ele.next();

				ele.focus(function () {
					border.css({ 'visibility': "visible", 'opacity': "1" });
				});
				ele.blur(function () {
					border.css({ 'visibility': "hidden", 'opacity': "0" });
				});

				ele.on("mouseenter", function () {
					border.css({ 'visibility': "visible", 'opacity': "1" });
				});

				ele.on("mouseleave", function () {
					if (!ele.is(":focus")) {
						border.css({ 'visibility': "hidden", 'opacity': "0" });
					}
				});

			});
		}
	}
});