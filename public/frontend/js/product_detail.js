$(document).ready(function () {
    var product_conatainer = $(".product-area");
    $(product_conatainer).find(".submit-review").on("click", function (e) {
        e.preventDefault();
        var data = $('#review_form').serialize()+ '&rating=' + $(".rating-container").find(".fullStar").length;
        if (!$('#review_form').valid()) {
            return;
        }

        $.ajax({
            type: 'POST',
            url: base_url + language_code+'/submit-review',
            data: data,
            success: function (response, status) {
                if (response.success) {
                    $("#review-success").addClass('alert alert-success').html(response.message);
                    $('#comment').val('');
                } else {
                    $("#review-error").addClass('alert alert-danger').html(response.message);
                }
            }
        });
    });
    $("#twitter-sharing").click(function(e){
        e.preventDefault();
        var twitter=$(this).find(".twitter-share-button");
        var loc = twitter.data('src');
        var title  = twitter.data('text');
        window.open('http://twitter.com/share?url=' + loc + '&text=' + title + '&', 'twitterwindow', 'height=450, width=550, top='+($(window).height()/2 - 225) +', left='+$(window).width()/2 +', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
    });
    $(product_conatainer).find("#check-product").off();
    $(product_conatainer).find("#check-product").on("click", function (e) {
        var zip_code = $("#zip_code").val();
        var product_id = $('#product-id').val();
        var radius = $('#distance').val();
        // $("#zip-code-error").toggleClass('hidden',(zip_code == null));
        if($.trim(zip_code)==""){
            $("#zip_code").css('border-color','red');
            return false;
        }
        $("#zip_code").css('border-color','#ccc');

        $.ajax({
            type: 'POST',
            url: base_url +language_code+ '/get-distance',
            data: {'zip_code': zip_code, 'requested_distance': radius, 'product_id': product_id},
            success: function (response, status) {
                $(".product-check-error").html('');
                if (response.success) {
                    $("#radius").val($("#distance").val());
                    $("#postal_code").val($("#zip_code").val());
                    $("#zip_code").val('');
                    // $("#add-to-cart").removeClass('hidden').show();
                    // $("#check-product, #zip-code-error").hide();
                    $(product_conatainer).find('#buying_label,#buying_area,#product-not-avail').removeClass('hide').addClass('hide');
                    $(product_conatainer).find('#add-cart').removeClass('hide');
                    $(product_conatainer).find('#see_best_price').removeClass('hide');
                    $(product_conatainer).find('.affiliate-container').addClass('hide');
                    $(product_conatainer).find('.share-community').addClass('mr-l-15');

                } else {
                    $(product_conatainer).find('#buying_label,#buying_area,#add-cart').removeClass('hide').addClass('hide');
                    $(product_conatainer).find('#product-not-avail').removeClass('hide');
                    $(product_conatainer).find('#see_best_price').addClass('hide');
                    $(product_conatainer).find('.affiliate-container').removeClass('hide');
                    $(product_conatainer).find('.share-community').removeClass('mr-l-15');

                }
            }
        });
    });

    $(".add-your-review").click(function(){
        $('html, body').animate({
            scrollTop: $("#tab-container").offset().top-50
        },1000);
    });

    product_conatainer.find('img.attr-element').on('click',function () {
        $element = $(this);
        product_conatainer.find("img.attr-element").removeClass('active');
        $element.parents("ul").find('li').removeClass('active');
        $element.parents('li').addClass('active');
        $element.addClass('active');
        product_conatainer.find('#color_attribute_id').val($element.data("product_attribute_option_id"))
    });

    $("#ask-local-product").click(function (e) {
        e.preventDefault();
        if (!$('#ask_product_form').valid()) {
            return;
        }
        var form = $(this).parents('form');
        var data = $('#ask_product_form').serialize()+ '&radius=' + $(".ask-page-radius").val()+'&zip_code='+$(".ask-page-zip-code").val();
        $.ajax({
            type: 'POST',
            url: base_url + language_code+'/product-available',
            data: data,
            success: function (response, status) {
                if (response.success==='1') {
                    $(".ask-order-page-success").removeClass('hide').find('span').text(response.message);
                    form.get(0).reset();
                } else if(response.success==='2') {
                    location.href=base_url+'login';
                } else{
                    $(".ask-order-page-warning").removeClass('hide').find('span').text(response.message);
                }
            }
        });
    })
    $(document).ajaxStart(function () {
        $.LoadingOverlay("show", {'size': "10%", 'zIndex': 9999});
    });
    $(document).ajaxStop(function () {
        $.LoadingOverlay("hide");
    });
    $(".thumb-image").click(function(e){
        e.preventDefault()
        $(".main-image").attr('src',$(this).find('img').data('image'));
    });
    $('.rating-container').rating();

    $(product_conatainer).find(".product-select").on("click", function (e) {
        var price = $(this).find(".price").data('price');
        var name = $(this).find(".product-name").text();
        var url=$(this).find(".product-name").attr('href');
        $("#product_name").val(name);
        $("#product_price").val(price);
        $("#product_url").val(url);
    });

    $(product_conatainer).on('click','#buy_locally',function () {
        $(product_conatainer).find('#buying_area').toggleClass('hide');
        if($(product_conatainer).find('#buying_area').hasClass('hide')){
            $(product_conatainer).find('#buying_label').removeClass('hide');
        } else {
            $(product_conatainer).find('#buying_label').addClass('hide');
            $(product_conatainer).find('#see_best_price').removeClass('hide');
            $(product_conatainer).find('.affiliate-container').addClass('hide');
            $(product_conatainer).find('.share-community').addClass('mr-l-15');
        }
        $(product_conatainer).find('#add-cart').removeClass('hide').addClass('hide');
        $(product_conatainer).find('#product-not-avail').removeClass('hide').addClass('hide');
    });

    $(product_conatainer).on('click','#see_best_price',function () {
        if($(product_conatainer).find('.affiliate-container').hasClass('hide')){
            $(product_conatainer).find('.affiliate-container').removeClass('hide');
            $(product_conatainer).find('.share-community').removeClass('mr-l-15');
        } else {
            $(product_conatainer).find('.affiliate-container').addClass('hide');
            $(product_conatainer).find('.share-community').addClass('mr-l-15');
        }
    });

})