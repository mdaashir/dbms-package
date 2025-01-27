(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();
    
    
    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 45) {
            $('.navbar').addClass('sticky-top shadow-sm');
        } else {
            $('.navbar').removeClass('sticky-top shadow-sm');
        }
    });
    
    
    // Dropdown on mouse hover
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";
    
    $(window).on("load resize", function() {
        if (this.matchMedia("(min-width: 992px)").matches) {
            $dropdown.hover(
            function() {
                const $this = $(this);
                $this.addClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "true");
                $this.find($dropdownMenu).addClass(showClass);
            },
            function() {
                const $this = $(this);
                $this.removeClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "false");
                $this.find($dropdownMenu).removeClass(showClass);
            }
            );
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Modal Video
    $(document).ready(function () {
        var $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);

        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        center: true,
        margin: 24,
        dots: true,
        loop: true,
        nav : false,
        responsive: {
            0:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });
    
})(jQuery);

// HANDLE ADD ORDERS IN booking.html
function addItemToPage() {
  // Get the form data
  var formData = {
    email: $('#email').val(),
    datetime: $('#datetime').val(),
    type: $('#select1').val(),
    message: $('#message').val()
  };

  // Send an AJAX request to add the item
  $.ajax({
    url: 'add_item.php',
    type: 'POST',
    data: formData,
    success: function(data) {
      // Display a success message
      alert('Item added successfully!');

      // Clear the form fields
      $('#email').val('');
      $('#datetime').val('');
      $('#select1').val('1');
      $('#message').val('');
    }
  });
}

//ADDING TO CART
document.querySelectorAll('#menu-item-form-1, #menu-item-form-2, #menu-item-form-3, #menu-item-form-4, #menu-item-form-5, #menu-item-form-6, #menu-item-form-7, #menu-item-form-8').forEach(form => {
    form.addEventListener('submit', event => {
      event.preventDefault();
      const formData = new FormData(form);
      const menuId = formData.get('menu_id');
      const quantity = formData.get('quantity');
      addToCart(menuId, quantity);
    });
  });
  
  let cart = [];
  
  function addToCart(menuId, quantity) {
    const menuItem = cart.find(item => item.menu_id === menuId);
    if (menuItem) {
      menuItem.quantity += quantity;
    } else {
      cart.push({ menu_id: menuId, quantity: quantity });
    }
    updateCartTotal();
  }
  
  function updateCartTotal() {
    let total = 0;
    cart.forEach(item => {
      const menu = menuItems.find(menu => menu.id === item.menu_id);
      total += menu.price * item.quantity;
    });
    document.querySelector('#cart-total').textContent = `$${total.toFixed(2)}`;
  }

  
    document.addEventListener('DOMContentLoaded', function() {
        const confirmCheckoutButton = document.querySelector('#confirmCheckoutButton');
        confirmCheckoutButton.addEventListener('click', function() {
            $('#orderPlacedModal').modal('show');
        });
    });

    // On close goes to index.html
    document.getElementById("closeModalBtn").addEventListener("click", function() {
        window.location.href = "index.html";
    });
    
    // Call the function when the modal is shown
$('#orderPlacedModal').on('shown.bs.modal', function () {
    addCloseEventListener();
});