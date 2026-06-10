/**
 * Premium Settings Helper Functions
 */

$(document).ready(function () {
    // 1. Image Preview Handler
    $('.premium-image-input').on('change', function () {
        const file = this.files[0];
        const previewId = $(this).data('preview');
        const inputName = $(this).attr('name');
        const $input = $(this);

        if (file) {
            // Dimension validation for logo
            if (inputName === 'logo') {
                const img = new Image();
                img.src = URL.createObjectURL(file);
                img.onload = function () {
                    if (this.width !== 140 || this.height !== 69) {
                        Swal.fire({
                            title: 'Invalid Dimensions',
                            text: `Main logo must be exactly 140 x 69 pixels. Selected image is ${this.width} x ${this.height}.`,
                            icon: 'error'
                        });
                        $input.val(''); // Clear input
                        return false;
                    }

                    // Proceed with preview if dimensions are correct
                    $(`#${previewId}`).attr('src', img.src);
                    $(`#${previewId}`).closest('.image-preview-card').addClass('has-image');
                };
            } else {
                // Default preview for other images (like favicon)
                const reader = new FileReader();
                reader.onload = function (e) {
                    $(`#${previewId}`).attr('src', e.target.result);
                    $(`#${previewId}`).closest('.image-preview-card').addClass('has-image');
                }
                reader.readAsDataURL(file);
            }
        }
    });
    // 2. Click to Upload Trigger
    $('.image-preview-card').on('click', function () {
        $(this).siblings('.premium-image-input').click();
    });

    // 3. Floating Save Bar Detector
    const $form = $('form');
    const $saveBar = $('#floatingSaveBar');
    let formChanged = false;

    // Detect changes in any input
    $form.find('input, select, textarea').on('change keyup', function () {
        if (!formChanged) {
            formChanged = true;
            $saveBar.addClass('show');
        }
    });

    // 4. Form Section Staggered Animation
    $('.settings-card').each(function (index) {
        $(this).css('animation-delay', (index * 0.1) + 's').addClass('animate-fade-in');
    });

    // 5. Tooltip Init (if Bootstrap tooltips are used)
    if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    }

    // 6. Reset Save Bar on Submit
    $form.on('submit', function () {
        $saveBar.removeClass('show');
    });

    // 7. Universal Summernote Initialization
    if ($.fn.summernote) {
        // Standard Rich Text
        $('.summernote').summernote({
            height: 200,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
                ['view', ['codeview']]
            ],
            callbacks: {
                onChange: function () {
                    if (!formChanged) {
                        formChanged = true;
                        $saveBar.addClass('show');
                    }
                }
            }
        });

        // Simple Mode (for Titles/Headings)
        $('.summernote-simple').summernote({
            height: 80,
            airMode: false,
            toolbar: [
                ['font', ['bold', 'italic', 'underline', 'clear']],
            ],
            placeholder: 'Type heading here...',
            callbacks: {
                onChange: function () {
                    if (!formChanged) {
                        formChanged = true;
                        $saveBar.addClass('show');
                    }
                },
                // Force plain text on paste for headings
                onPaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    e.preventDefault();
                    document.execCommand('insertText', false, bufferText);
                },
                // Handle Enter to insert <br> instead of <p>
                onEnter: function (e) {
                    e.preventDefault();
                    document.execCommand('insertHTML', false, '<br>');
                }
            }
        });
    }

    // 8. Product Selection Grid Support
    const $productGrid = $('#productGrid');
    const $productCounter = $('#productCounter');

    function updateProductCounter() {
        const count = $('.product-select-card.active').length;
        $productCounter.text(`${count} / 7 Selected`);

        if (count === 7) {
            $productCounter.removeClass('error').addClass('at-limit');
        } else {
            $productCounter.removeClass('at-limit').addClass('error');
        }
    }

    // Initial count
    updateProductCounter();

    $('.product-select-card').on('click', function () {
        const $card = $(this);
        const $checkbox = $card.find('input[type="checkbox"]');
        const currentCount = $('.product-select-card.active').length;

        if ($card.hasClass('active')) {
            $card.removeClass('active');
            $checkbox.prop('checked', false);
        } else {
            if (currentCount < 7) {
                $card.addClass('active');
                $checkbox.prop('checked', true);
            } else {
                Swal.fire({
                    title: 'Limit Reached',
                    text: 'You can only select exactly 7 featured products.',
                    icon: 'warning',
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        }

        updateProductCounter();

        if (!formChanged) {
            formChanged = true;
            $saveBar.addClass('show');
        }
    });

    // Enforce exactly 7 on form submit
    $form.on('submit', function (e) {
        if ($productGrid.length > 0) {
            const count = $('.product-select-card.active').length;
            if (count !== 7) {
                e.preventDefault();
                Swal.fire({
                    title: 'Selection Error',
                    text: `Please select exactly 7 products. Currently you have ${count} selected.`,
                    icon: 'error'
                });
                return false;
            }
        }
        $saveBar.removeClass('show');
    });
});
