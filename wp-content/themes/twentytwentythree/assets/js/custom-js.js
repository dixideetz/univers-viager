(function( root, $, undefined ) {
	"use strict";

	$(document).ready(function () {

    var swiperAvis = new Swiper('.swiper', {
        slidesPerView: 1,
        spaceBetween: 30,
        pagination: {
          el: '.swiper-pagination',
          clickable: true
        },
        breakpoints: {
            1000 : {
                slidesPerView: 3
            }
        }
      });
      
      // Formulaire
      $('.input-label input').focusin(function(){
        $(this).parent().addClass('focused');
      })
      .focusout(function() {
          $(this).parent().removeClass('focused');
      })
      .keyup(function() { 
        var value = $(this).val();
        if (value != "") { 
          $(this).parent().addClass('filled');
        } else {
        $(this).parent().removeClass('filled');
        }

      });

      // Actualités - Ajax
    let currentPage = 1;
    $('#load-more').on('click', function () {
      currentPage++; // Do currentPage + 1, because we want to load the next page

      $.ajax({
        type: 'POST',
        url: '/wp-admin/admin-ajax.php',
        dataType: 'html',
        data: {
          action: 'weichie_load_more',
          paged: currentPage,
        },
        success: function (res) {
          $('.actualites-block').append(res);
        }
      });
    });

    });
} ( this, jQuery ));