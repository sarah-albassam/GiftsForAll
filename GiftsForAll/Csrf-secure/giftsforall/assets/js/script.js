$( document ).ready(function() {
    var w = window.innerWidth;

    if(w > 767){
        $('#menu-jk').scrollToFixed();
    }else{
       // $('#menu-jk').scrollToFixed();
    }



})

$(document).ready(function(){
    $("#testimonial-slider").owlCarousel({
        items:2,
        itemsDesktop:[1000,2],
        itemsDesktopSmall:[979,2],
        itemsTablet:[768,1],
        pagination:false,
        navigation:true,
        navigationText:["",""],
        autoPlay:true
    });
});



$(document).ready(function(){
    
    $(".addToCart").click(function(){
        var productId=$(this).data('id');
        var image=$(this).data('image');
        
        var product_name=$(this).data('name');
        var price=$(this).data('price');
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'add_to_cart.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                // Redirect to the cart page
                 window.location.href = 'cart.php';
            }
        };
        // xhr.send('product_id=' + encodeURIComponent(productId)+'&image=' + encodeURIComponent(image)+'&product_name=' + encodeURIComponent(product_name)+'&price=' + encodeURIComponent(price));
        xhr.send('product_id=' + encodeURIComponent(productId));
        
    });
    $(".orderSubmit").click(function(){
        $('.align-middle').hide();
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'add_to_cart.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                // Redirect to the cart page
                alert('Order is submitted');
                //window.location.href = 'cart.php';
            }
        };
        xhr.send();
        // xhr.send('product_id=' + encodeURIComponent(productId)+'&image=' + encodeURIComponent(image)+'&product_name=' + encodeURIComponent(product_name)+'&price=' + encodeURIComponent(price));
        // xhr.send('product_id=' + encodeURIComponent(productId));
        
    });
    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });
    
    if ($(".filter-button").removeClass("active")) {
$(this).removeClass("active");
}
$(this).addClass("active");

});  