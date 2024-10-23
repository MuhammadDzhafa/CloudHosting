"use strict";
$(document).ready(function() {
    if ($("#form-layout-4").length) {
        var e = document.querySelectorAll(".form-datepicker"),
            s = [];
        console.log(e.length);
        for (var t = 0; t < e.length; t++) s[t] = new Pikaday({
            field: e[t],
            firstDay: 1,
            format: "MMM D, YYYY",
            onSelect: function() {}
        })
    }

    if ($("#form-layout-5").length) {
        var i = 0; // Counter untuk step

        $("#next-button").on("click", function() {
            var $button = $(this);
            
            // Cek jika ini klik kedua (i === 1)
            if (i === 1) {
                // Tampilkan modal
                const modal = $("#demo-right-actions-modal");
                modal.addClass("is-active");

                // Handle Buy Domain Only button
                $("#buy-domain-button").off('click').on('click', function(e) {
                    e.preventDefault();
                    modal.removeClass("is-active");
                    
                    // Set counter ke 4 untuk pindah ke step 5 (form-step-4)
                    i = 4;
                    
                    $button.addClass("is-loading");
                    setTimeout(function() {
                        $button.removeClass("is-loading");
                        $("#form-step-" + i).addClass("is-active");
                    }, 800);

                    setTimeout(function() {
                        $(".form-help").addClass("is-hidden");
                        $(".steps").removeClass("is-hidden");
                        $(".stepper-form .steps-segment, .mobile-steps .steps-segment").removeClass("is-active");
                        $("#step-segment-" + i).addClass("is-active");
                        $("#mobile-step-segment-" + i).addClass("is-active");
                        $("html, body").animate({
                            scrollTop: $("#form-step-" + i).offset().top
                        }, 500);
                    }, 1200);
                });

                // Handle Yes I Want button
                modal.find(".is-primary").off('click').on('click', function() {
                    modal.removeClass("is-active");
                    proceedToNextStep();
                });

                // Handle modal background close
                modal.find(".modal-background").off('click').on('click', function() {
                    modal.removeClass("is-active");
                });
            } else {
                proceedToNextStep();
            }

            // Function untuk melanjutkan ke step berikutnya
            function proceedToNextStep() {
                i += 1;
                $button.addClass("is-loading");
                
                setTimeout(function() {
                    $button.removeClass("is-loading");
                    $("#form-step-" + i).addClass("is-active");
                }, 800);

                setTimeout(function() {
                    $(".form-help").addClass("is-hidden");
                    $(".steps").removeClass("is-hidden");
                    $(".stepper-form .steps-segment, .mobile-steps .steps-segment").removeClass("is-active");
                    $("#step-segment-" + i).addClass("is-active");
                    $("#mobile-step-segment-" + i).addClass("is-active");
                    $("html, body").animate({
                        scrollTop: $("#form-step-" + i).offset().top
                    }, 500);
                }, 1200);
            }
        });

        // Help button functionality
        $(".help-button").on("click", function() {
            var e = $(this).attr("data-help");
            $(".steps").addClass("is-hidden");
            $(".form-help").removeClass("is-hidden");
            $(".form-help-inner").removeClass("is-active");
            $("#" + e).addClass("is-active");
        });

        // Close help button
        $(".close-help-button").on("click", function() {
            $(".form-help").addClass("is-hidden");
            $(".steps").removeClass("is-hidden");
        });

        // Mobile steps visibility
        $(window).on("scroll", function() {
            $(window).scrollTop() > 80 ? 
                $(".mobile-steps").addClass("is-active") : 
                $(".mobile-steps").removeClass("is-active");
        });
    }
});