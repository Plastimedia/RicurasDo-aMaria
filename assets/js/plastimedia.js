$(document).ready(function () {

	// splash		
	$("#splash").css("opacity", "0");
	window.setTimeout(function () {
		$("#splash").css("display", "none");
	}, 500);
	// splash

	/* Ir arriba */
	$('#ir-arriba').click(function () {
		$('body, html').animate({
			scrollTop: '0px'
		}, 300);
	});

	// animaciones
	new WOW().init();


	// menu
	if ($(window).width() < 768) {
		var itemMenu = $(".container-menu .container-menu-buscador nav.el-menu .menu-ppl ul > li.menu-item-has-children > a");
		itemMenu.click(function (event) {
			event.preventDefault();
		});
	}


	// menú de opciones tienda
	$(".single-product .product_cat span").each(function () {
		let text = $(this).text()
		$("main.shopPage aside .wc-block-product-categories.is-list ul li a").each(function () {
			if (text == $(this).text()) {
				$(this).parent().addClass('current-menu-item')
			}
		})
	})


	// para que la caja no se pierda en la pantalla
	if ($(window).width() > 768) {
		$("header .ancho .options_shop>div.search").hover(
			function () {
				var widthScreen = $("body").width();
				var leftScreenContent = $(this).children('.content').offset().left;
				if ((leftScreenContent + 250) > widthScreen) {
					// console.log("mayor")
					$(this).children('.content').css("transform", "translateX(calc(-50% - " + (((leftScreenContent + 250) - widthScreen) + 25) + "px))")
				}
				// console.log("pantalla: " + widthScreen+"\n elemento: " + leftScreenContent + "\n elemento pantalla: "+(leftScreenContent + 250))

			},
			function () {
				$(this).children('.content').css("transform", "translateX(-50%)")
			}
		);
		$("header .ancho .options_shop>div.cart").hover(
			function () {
				// var widthScreen = screen.width;
				if ($(this).children('.content').length > 0) {
					var widthScreen = $("body").width();
					var leftScreenContent = $(this).children('.content').offset().left;
					console.log(widthScreen + "--" + leftScreenContent)
					if ((leftScreenContent + 300) > widthScreen) {
						// console.log("mayor")
						$(this).children('.content').css("transform", "translateX(calc(-50% - " + (((leftScreenContent + 300) - widthScreen) + 25) + "px))")
					}
					// console.log("pantalla: " + widthScreen+"\n elemento: " + leftScreenContent + "\n elemento pantalla: "+(leftScreenContent + 250))
					console.log("pantalla: " + widthScreen + "\n elemento: " + leftScreenContent + "\n elemento pantalla: " + (leftScreenContent + 300) + "\n diferencia" + (((leftScreenContent + 300) - widthScreen)))
				}
			},
			function () {
				if ($(this).children('.content').length > 0) {
					$(this).children('.content').css("transform", "translateX(-50%)")
				}
			}
		);
	}


	// no liinks
	$("header .ancho .options_shop>div.cart .icon a").click(function (e) {
		e.preventDefault();
	})
	$("header .ancho .options_shop>div.search .icon a").click(function (e) {
		e.preventDefault();
	})
	// menú de opciones tienda


	$(window).scroll(function () {
		if ($(this).scrollTop() > 0) {
			$('#ir-arriba').fadeIn(300);
		} else {
			$('#ir-arriba').fadeOut(300);
		}
	});


	// cuando sea móvil no coloque la clase fijo - menu
	if ($(window).width() > 1024) {
		$(".header").sticky({ topSpacing: 0, className: 'fijo', zIndex: 100 });
	}
	// JS del menu
	jQuery("#menu_chk").change(function () {   //Funcion para mostrar u ocultar el menu de la versión de moviles
		if (jQuery("#menu_chk").is(':checked')) {
			jQuery(".menu-ppl").addClass("verMenu");  // checked
			jQuery("#btn_menu").addClass("btn_activo");  // checked
		}
		else {
			jQuery(".menu-ppl").removeClass("verMenu");  // unchecked
			jQuery("#btn_menu").removeClass("btn_activo");  // unchecked
		}
	})



	// Funcion para permitir la animación completa
	$('.menu-ppl > ul > li').hover(function () {
		$(this).addClass('in-hover').delay(210).queue(function () {
			$(this).removeClass('in-hover').clearQueue();
		});
	});

	// Funcion para permitir la animación completa
	$('li.menu-categorias > ul.sub-menu > li').hover(function () {
		$(this).addClass('in-hover').delay(210).queue(function () {
			$(this).removeClass('in-hover').clearQueue();
		});
	});

	// quitarle el autocomplete al formulario de contacto
	$('.hugeit_form').attr('autocomplete', 'off');
	$('#hugeit_preview_textbox_17').val('');

	/* Parallax scrolling */
	$(window).bind('scroll', function (e) {
		parallaxScroll();
	});
	/* Scroll the background */
	function parallaxScroll() {
		if ($(window).width() > 768) {
			var scrolled = $(window).scrollTop();
			var ventana = $(window).height();

		}
	}

	/* jQuery propio para tener la misma altura en diferentes div */
	function altura() {

		if ($(window).width() > 600) {
			var altomax = 0;
			$('.category-post-area').each(function () {
				if ($(this).height() > altomax) {
					altomax = $(this).height();
				}
			});

			$('.category-post-area').height(altomax);
			var altomax = 0;
			$('.producto>.content').each(function () {
				if ($(this).height() > altomax) {
					altomax = $(this).height();
				}
			});

			$('.producto>.content').height(altomax);
			var altomax = 0;
			$('main .sedes .content li .contenido').each(function () {
				if ($(this).height() > altomax) {
					altomax = $(this).height();
				}
			});

			$('main .sedes .content li .contenido').height(altomax);

			var altomax = 0;
			$('.los-servicios .ancho .donLoop .splideServicios .splide__list .splide__slide .servicePost').each(function () {
				if ($(this).height() > altomax) {
					altomax = $(this).height();
				}
			});

			$('.los-servicios .ancho .donLoop .splideServicios .splide__list .splide__slide .servicePost').height(altomax);

			var altomax = 0;

			$('.post-area').each(function () {
				if ($(this).height() > altomax) {
					altomax = $(this).height();
				}
			});

			$('.post-area').height(altomax);

			var alt = 0;

			$('.servicios .wg-servicio').each(function () {
				if ($(this).height() > alt) {
					alt = $(this).height();
				}
				$('.servicios .wg-servicio').height(alt);
			});


		}
	}

	altura();

	$(window).resize(function () {
		altura();
	});

	// slider

	function sliderm(x) {
		if (x.matches) { //si ya esta en el mediaquery
			$(".contenedor-slide").css("display", "none");
			$(".contenedor-slide-mobil").css("display", "block");
		} else {
			$(".contenedor-slide").css("display", "block");
			$(".contenedor-slide-mobil").css("display", "none");
		}
	}

	var x = window.matchMedia("(max-width: 728px)")
	sliderm(x) // Call listener function at run time
	x.addListener(sliderm) // Attach listener function on state changes



	$("#billing_city_field label").append(`  <abbr class="required" title="obligatorio">*</abbr>`);




	//función botones incrementar y decrementar 
	(function ($) {

		$('.button-qty').click(function (e) {
			e.preventDefault();
			const inputQty = $(this).parent().find('input')[0];

			if ($(this).data('quantity') === 'plus') {
				inputQty.stepUp();
			} else {
				inputQty.stepDown();
			}

			$(inputQty).trigger('change');

		});

	})(jQuery);



	// btn servicio técnico
	// circular-text
	// circle = document.getElementById("title-resondoski")
	// console.log("circle", circle)
	// circleArray = circle.textContent.split('')
	// circle.textContent = ''

	// for (var i = 0; i < circleArray.length; i++) {
	// 	circle.innerHTML += '<span style="transform: rotate(' + (i * 3) + 'deg)">' + circleArray[i] + '</span>'
	// }

	// 

});
