// LOGIN AJAX

$(document).on("submit", "#Login_form", function (event) {
    event.preventDefault(); // Prevent default form submission

    let username = $("#input_username").val();
    let password = $("#password_input").val();

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/login", // Changed from "/logout" to "/login"
        data: {
            username: username,
            password: password,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",

                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                    customClass: {
                        popup: 'toast-black-text'
                    }
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.href = "/dashboard";
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});


// forget password ajax
$(document).on("submit", "#forget_form", function (event) {
    event.preventDefault(); // Prevent default form submission

    let username = $("#emailid").val();
    let password = $("#newpassword_input").val();

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/forgetpassword", // Changed from "/logout" to "/login"
        data: {
            username: username,
            password: password,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",

                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                    customClass: {
                        popup: 'toast-black-text'
                    }
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.href = "/";
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});

window.onload = function () {
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    // Prevent back button from going back to login
    window.history.pushState(null, "", window.location.href);
    window.onpopstate = function () {
        window.history.go(1);
    };
};

$(document).ready(function () {
    $(document).on("click", "#user_Log_off", function () {
        Swal.fire({
            title: "Are you sure?",
            text: "You want to Log Out?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Log Out",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });

                // AJAX Submission
                $.ajax({
                    type: "post",
                    url: "/logout",
                    beforeSend: function () {
                        $(".preloader").fadeIn();
                    },
                    success: function (response) {
                        $(".preloader").fadeOut();

                        if (response.status == 200) {
                            Swal.fire({
                                title: "Success",
                                text: response.message,
                                icon: "success",
                                customClass: {
                                    popup: "swal-custom-popup",
                                },
                            });

                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 1500,
                                timerProgressBar: true,
                                customClass: {
                                    popup: "swal-custom-popup",
                                },
                                didOpen: (toast) => {
                                    toast.onmouseenter = Swal.stopTimer;
                                    toast.onmouseleave = Swal.resumeTimer;
                                },
                            });

                            Toast.fire({
                                icon: "success",
                                title: response.message,
                            });

                            setTimeout(function () {
                                window.location.href = "/";
                            }, 1500);
                        } else {
                            Swal.fire({
                                title: "Error",
                                text:
                                    response.message ||
                                    "An unexpected error occurred.",
                                icon: "error",
                            });
                            console.log(response.message);
                        }
                    },
                    error: function (xhr) {
                        $(".preloader").fadeOut();

                        Swal.fire({
                            title: "Error",
                            text:
                                xhr.responseJSON?.message ||
                                "An error occurred.",
                            icon: "error",
                        });

                        // setTimeout(function () {
                        //     window.location.reload();
                        // }, 1500);
                    },
                });
            }
        });
    });
});

// ========== CATEGORY ========== //

// ADD CATEGORY
$(document).on("submit", "#category_add_form", function (event) {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/category/add", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});

// ADD CATEGORY
$(document).on("submit", "#sectionheading_add_form", function (event) {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/sechead/add", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});
// section head form

$(document).on("submit", "#sectionhead_add_form", function (event) {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/sectionhead/add", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});

$(document).on("submit", "#addproduct_update_form", function (event) {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/addproduct/update", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});


// blog add form

$(document).on("submit", "#add_blogcontent", function (event) {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/blog/add", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});
// edit seo
$(document).on("submit", "#edit_blogcontent", function (event) {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/blog/edit", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});


$(document).on("click", ".deleteblog", function () {
    const id = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/destroyBlog/" + id,
                method: "post",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    $(".preloader").fadeOut();
                    console.log(response);
                    if (response.status == 200) {
                        Swal.fire({
                            title: "Success",
                            text: response.message,
                            icon: "success",
                            customClass: {
                                popup: "swal-custom-popup",
                            },
                        });

                        // Toast Notification
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                            customClass: {
                                popup: "swal-custom-popup",
                            },
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            },
                        });

                        Toast.fire({
                            icon: "success",
                            title: response.message,
                        });

                        // Redirect after success
                        setTimeout(function () {
                            window.location.reload();
                        }, 1500);
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: response.message || "An unexpected error occurred.",
                            icon: "error",
                        });
                        console.log(response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {

                    Swal.fire(
                        textStatus.toUpperCase(),
                        errorThrown,
                        "warning"
                    );
                },
            });
        }
    });
});

// add seo

$(document).on("submit", "#add_seocontent", function (event) {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/seo/add", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});


$(document).on("submit", "#edit_seocontent", function (event) {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/seo/edit", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});


$(document).on("submit", "#test_add_form", function (event) {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/test/add", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});

// update seo Heading
$(document).on("submit", "#sectionheading_update_form", function (event) {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/seoheading/update", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});

// update category
$(document).on("submit", "#category_update_form", function (event) {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/category/update", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});


// update section
$(document).on("submit", "#section_update_form", function (event) {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/sectionheading/update", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});


$(document).on("submit", "#test_update_form", function (event) {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/test/update", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});



// update pageoff
$(document).on("submit", "#pageoff_update_form", function (event) {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/pageoff/update", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});

// update pricelist
$(document).on("submit", "#price_update_form", function (event) {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/price/update", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});

$(document).on("submit", "#header_update_form", function (event) {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/header/update", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});

// bulk upload product
$(document).on("submit", "#bulk_upload", function (event) {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/bulk/update", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});

// bulk upload area
$(document).on("submit", "#bulk_upload_area", function (event) {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/area/bulk/update",
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});

// edit products
// update pricelist
$(document).on("submit", "#editproduct", function (event) {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/product/update", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});

// delete image
$(document).on("submit", "#deleteimage", function (event) {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/image/update", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});


// brandlogo
$(document).on("click", ".deletebrand", function () {
    const id = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/destroybrand/" + id,
                method: "post",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    $(".preloader").fadeOut();
                    console.log(response);
                    if (response.status == 200) {
                        Swal.fire({
                            title: "Success",
                            text: response.message,
                            icon: "success",
                            customClass: {
                                popup: "swal-custom-popup",
                            },
                        });

                        // Toast Notification
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                            customClass: {
                                popup: "swal-custom-popup",
                            },
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            },
                        });

                        Toast.fire({
                            icon: "success",
                            title: response.message,
                        });

                        // Redirect after success
                        setTimeout(function () {
                            window.location.reload();
                        }, 1500);
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: response.message || "An unexpected error occurred.",
                            icon: "error",
                        });
                        console.log(response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {

                    Swal.fire(
                        textStatus.toUpperCase(),
                        errorThrown,
                        "warning"
                    );
                },
            });
        }
    });
});

$(document).on("click", ".deletecat", function () {
    const id = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/destroyCategories/" + id,
                method: "post",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    $(".preloader").fadeOut();
                    console.log(response);
                    if (response.status == 200) {
                        Swal.fire({
                            title: "Success",
                            text: response.message,
                            icon: "success",
                            customClass: {
                                popup: "swal-custom-popup",
                            },
                        });

                        // Toast Notification
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                            customClass: {
                                popup: "swal-custom-popup",
                            },
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            },
                        });

                        Toast.fire({
                            icon: "success",
                            title: response.message,
                        });

                        // Redirect after success
                        setTimeout(function () {
                            window.location.reload();
                        }, 1500);
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: response.message || "An unexpected error occurred.",
                            icon: "error",
                        });
                        console.log(response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {

                    Swal.fire(
                        textStatus.toUpperCase(),
                        errorThrown,
                        "warning"
                    );
                },
            });
        }
    });
});


// section delete
$(document).on("click", ".deletesectinheading", function () {
    const id = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/destroysectionheading/" + id,
                method: "post",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    $(".preloader").fadeOut();
                    console.log(response);
                    if (response.status == 200) {
                        Swal.fire({
                            title: "Success",
                            text: response.message,
                            icon: "success",
                            customClass: {
                                popup: "swal-custom-popup",
                            },
                        });

                        // Toast Notification
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                            customClass: {
                                popup: "swal-custom-popup",
                            },
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            },
                        });

                        Toast.fire({
                            icon: "success",
                            title: response.message,
                        });

                        // Redirect after success
                        setTimeout(function () {
                            window.location.reload();
                        }, 1500);
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: response.message || "An unexpected error occurred.",
                            icon: "error",
                        });
                        console.log(response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {

                    Swal.fire(
                        textStatus.toUpperCase(),
                        errorThrown,
                        "warning"
                    );
                },
            });
        }
    });
});

$(document).on("click", ".deletetest", function () {
    const id = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/destroyTest/" + id,
                method: "post",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    $(".preloader").fadeOut();
                    console.log(response);
                    if (response.status == 200) {
                        Swal.fire({
                            title: "Success",
                            text: response.message,
                            icon: "success",
                            customClass: {
                                popup: "swal-custom-popup",
                            },
                        });

                        // Toast Notification
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                            customClass: {
                                popup: "swal-custom-popup",
                            },
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            },
                        });

                        Toast.fire({
                            icon: "success",
                            title: response.message,
                        });

                        // Redirect after success
                        setTimeout(function () {
                            window.location.reload();
                        }, 1500);
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: response.message || "An unexpected error occurred.",
                            icon: "error",
                        });
                        console.log(response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {

                    Swal.fire(
                        textStatus.toUpperCase(),
                        errorThrown,
                        "warning"
                    );
                },
            });
        }
    });
});



// discount add

// delect product
$(document).on("click", ".deleteproduct", function () {
    const id = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/destroyProduct/" + id,
                method: "post",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    $(".preloader").fadeOut();
                    console.log(response);
                    if (response.status == 200) {
                        Swal.fire({
                            title: "Success",
                            text: response.message,
                            icon: "success",
                            customClass: {
                                popup: "swal-custom-popup",
                            },
                        });

                        // Toast Notification
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                            customClass: {
                                popup: "swal-custom-popup",
                            },
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            },
                        });

                        Toast.fire({
                            icon: "success",
                            title: response.message,
                        });

                        // Redirect after success
                        setTimeout(function () {
                            window.location.reload();
                        }, 1500);
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: response.message || "An unexpected error occurred.",
                            icon: "error",
                        });
                        console.log(response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {

                    Swal.fire(
                        textStatus.toUpperCase(),
                        errorThrown,
                        "warning"
                    );
                },
            });
        }
    });
});


// delect product
$(document).on("click", ".deleteproductall", function () {

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/destroyProductall",
                method: "post",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    $(".preloader").fadeOut();
                    console.log(response);
                    if (response.status == 200) {
                        Swal.fire({
                            title: "Success",
                            text: response.message,
                            icon: "success",
                            customClass: {
                                popup: "swal-custom-popup",
                            },
                        });

                        // Toast Notification
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                            customClass: {
                                popup: "swal-custom-popup",
                            },
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            },
                        });

                        Toast.fire({
                            icon: "success",
                            title: response.message,
                        });

                        // Redirect after success
                        setTimeout(function () {
                            window.location.reload();
                        }, 1500);
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: response.message || "An unexpected error occurred.",
                            icon: "error",
                        });
                        console.log(response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {

                    Swal.fire(
                        textStatus.toUpperCase(),
                        errorThrown,
                        "warning"
                    );
                },
            });
        }
    });
});

// delete seo
$(document).on("click", ".deleteseo", function () {
    const id = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/destroySeo/" + id,
                method: "post",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    $(".preloader").fadeOut();
                    console.log(response);
                    if (response.status == 200) {
                        Swal.fire({
                            title: "Success",
                            text: response.message,
                            icon: "success",
                            customClass: {
                                popup: "swal-custom-popup",
                            },
                        });

                        // Toast Notification
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                            customClass: {
                                popup: "swal-custom-popup",
                            },
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            },
                        });

                        Toast.fire({
                            icon: "success",
                            title: response.message,
                        });

                        // Redirect after success
                        setTimeout(function () {
                            window.location.reload();
                        }, 1500);
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: response.message || "An unexpected error occurred.",
                            icon: "error",
                        });
                        console.log(response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {

                    Swal.fire(
                        textStatus.toUpperCase(),
                        errorThrown,
                        "warning"
                    );
                },
            });
        }
    });
});

$(document).on("click", ".deletearea", function () {
    const id = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/destroyArea/" + id,
                method: "post",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    $(".preloader").fadeOut();
                    console.log(response);
                    if (response.status == 200) {
                        Swal.fire({
                            title: "Success",
                            text: response.message,
                            icon: "success",
                            customClass: {
                                popup: "swal-custom-popup",
                            },
                        });

                        // Toast Notification
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                            customClass: {
                                popup: "swal-custom-popup",
                            },
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            },
                        });

                        Toast.fire({
                            icon: "success",
                            title: response.message,
                        });

                        // Redirect after success
                        setTimeout(function () {
                            window.location.reload();
                        }, 1500);
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: response.message || "An unexpected error occurred.",
                            icon: "error",
                        });
                        console.log(response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {

                    Swal.fire(
                        textStatus.toUpperCase(),
                        errorThrown,
                        "warning"
                    );
                },
            });
        }
    });
});
// edit area

$(document).on("submit", "#ares_edit_form", function (event) {


    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/area/update", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});


$(document).on("submit", "#discount_add_form", function (event) {


    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/discount/add", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});


$(document).on("submit", "#ares_add_form", function (event) {


    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/area/add", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});
// ========== SUBCATEGORY ========== //

// addstatus

$(document).on("submit", "#status_add_form", function (event) {


    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/status/add", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});




// ADD PRICE LIST
$(document).on("submit", "#price_list_data", function (event) {


    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/pricelist/add", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});


// Add banner
// ADD PRICE LIST
$(document).on("submit", "#Banner_list_data", function (event) {


    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/banner/add", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});

// section banner
$(document).on("submit", "#section_list_data", function (event) {


    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/section/add", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});


$(document).on("submit", "#logo_list_data", function (event) {


    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/brand/add", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});
// section banner update
$(document).on("submit", "#Section_update_data", function (event) {


    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/section/update", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});
// brandupdate
$(document).on("submit", "#Brand_update_data", function (event) {


    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/brand/update", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});
// bannerupdate
$(document).on("submit", "#Banner_update_data", function (event) {


    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/banner/update", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});

// update status
// ADD PRICE LIST
$(document).on("submit", "#updatestatus", function (event) {


    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);


    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/status/update", // Changed from "/logout" to "/login"
        data: formData,
        contentType: false,
        processData: false,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});

// ADD SUBCATEGORY
$(document).on("submit", "#subcategory_add_form", function (event) {
    event.preventDefault(); // Prevent default form submission

    let category = $("#category_add_select").val();
    let subcategoryname = $("#subcategory_add_input").val();

    // AJAX Submission
    $.ajax({
        type: "POST",
        url: "/subcategory/add", // Changed from "/logout" to "/login"
        data: {
            subcategoryname: subcategoryname,
            category: category,
        },
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        beforeSend: function () {
            $(".preloader").fadeIn();
        },
        success: function (response) {
            $(".preloader").fadeOut();
            console.log(response);
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire({
                    title: "Error",
                    text: response.message || "An unexpected error occurred.",
                    icon: "error",
                });
                console.log(response.message);
            }
        },
        error: function (xhr) {
            $(".preloader").fadeOut();

            Swal.fire({
                title: "Error",
                text: xhr.responseJSON?.message || "An error occurred.",
                icon: "error",
            });
        },
    });
});

// ===== PRODUCT ===== //
$(document).on("change", "#add_category_select", function () {
    let id = $(this).val();

    $("#add_subcategory_select").empty();
    $("#add_subcategory_select").append(
        '<option value="" disabled selected>Processing...</option>'
    );

    $.ajax({
        type: "GET",
        url: "/product/fetchsubcategory/" + id,
        success: function (response) {
            console.log(response);
            $("#add_subcategory_select").empty();
            $("#add_subcategory_select").append(
                '<option value="" disabled selected>Select Subcategory</option>'
            );
            response.forEach((element) => {
                $("#add_subcategory_select").append(
                    `<option value='${element["id"]}'>${element["subcategory_name"]}</option>`
                );
            });
        },
    });
});

$(function () {
    const backupHtml = $("#preview-container").html();

    // Listen for changes to the input field
    $("#add_product_image").on("change", function () {
        // Get the selected file
        var file = $(this)[0].files[0];

        // Check if the file is an image
        if (file && file.type.match("image.*")) {
            // Create a new FileReader object
            var reader = new FileReader();

            // Set up the FileReader to load the image
            reader.onload = function (e) {
                // Create a new image element
                var img = $("<img>").attr("src", e.target.result);

                // Create a remove button
                var removeBtn = $("<button>")
                    .addClass("btn btn-danger product_remove_btn mt-2")
                    .text("Remove");

                // Add the image and remove button to the preview container
                $("#preview-container").empty().append(img).append(removeBtn);

                // Listen for clicks on the remove button
                removeBtn.on("click", function (e) {
                    e.preventDefault();

                    // Remove the image from the preview container
                    $("#preview-container").html(backupHtml);
                    // Clear the input field
                    $("#add_product_image").val("");
                });
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(file);
        }
    });
});

$(function () {
    const backupHtml = $("#preview-container1").html();

    // Listen for changes to the input field
    $("#add_varient_image").on("change", function () {
        // Get the selected file
        var file = $(this)[0].files[0];

        // Check if the file is an image
        if (file.type.match("image.*")) {
            // Create a new FileReader object
            var reader = new FileReader();

            // Set up the FileReader to load the image
            reader.onload = function (e) {
                // Create a new image element
                var img = $("<img>").attr("src", e.target.result);

                // Create a remove button
                var removeBtn = $("<button>")
                    .addClass("btn btn-danger product_remove_btn mt-2")
                    .text("Remove");

                // Add the image and remove button to the preview container
                $("#preview-container1").empty().append(img).append(removeBtn);

                // Listen for clicks on the remove button
                removeBtn.on("click", function (e) {
                    e.preventDefault();

                    // Remove the image from the preview container
                    $("#preview-container1").html(backupHtml);
                    // Clear the input field
                    $("#add_varient_image").val("");
                });
            };

            // Read the selected file as a data URL
            reader.readAsDataURL(file);
        }
    });
});

$(document).ready(function () {
    // Add input
    $(".add-input1").click(function () {
        var inputField = $(".product_image_count");
        var currentValue = parseInt(inputField.val());
        inputField.val(currentValue + 1);
        var inputGroup = `
        <div class="d-flex product_fields1">
        <div class="row">
            <div class="col-lg-8">
                <div class="mb-3">
                    <label class="form-label" for="add_product_image">Product Image*(750 *
                        600)</label>
                    <input type="file" class="form-control image_el dropzone needsclick"
                        id="add_product_image" placeholder="Product Image" name="product_image1[]" required>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 mt-4">
                <div class="input-group-append">
                    <button class="btn btn-danger delete-input1"
                        type="button">Delete</button>
                </div>
            </div>
        </div>
    </div>`;
        $(".dynamic-inputs1").append(inputGroup);
    });

    // Delete input
    $(document).on("click", ".delete-input1", function () {
        $(this).closest(".product_fields1").remove();
    });
});

// $(document).on("submit", "#addProductForm", function () {
//     const formdata = new FormData(e.target);
//     $.ajaxSetup({
//         headers: {
//             "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//         },
//     });
//     $.ajax({
//         url: "/product/store",
//         method: "POST",
//         dataType: "json",
//         data: formdata,
//         processData: false,
//         contentType: false,
//         success: function (response) {
//             $(".add_submit_btn").removeAttr("disabled");
//             $(".add_submit_btn").html("Submit");

//             const updatedProducts = response.products;
//             $("#addProductForm")[0].reset();
//             $("#addProductModal").hide();
//             $(".modal-backdrop").remove();
//             document.body.style.overflowY = "scroll";

//             console.log(updatedProducts);

//             gridjsReRender(updatedProducts);
//             Swal.fire("Added", "Records Added Successfully.", "success");
//         },
//         error: function (jqXHR, textStatus, errorThrown) {
//             $(".edit_submit_btn").removeAttr("disabled");
//             $(".add_submit_btn").removeAttr("disabled");
//             $(".edit_submit_btn").html("Update");
//             $(".add_submit_btn").html("Submit");
//             console.log(textStatus + ": " + errorThrown);

//             Swal.fire(textStatus.toUpperCase(), errorThrown, "warning");
//         },
//     });
// });

$(document).on("submit", "#addProductForm", function (e) {
    e.preventDefault(); // Prevent default form submission

    const formdata = new FormData(e.target); // Use e.target to get the form

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "/product/store",
        method: "POST",
        dataType: "json",
        data: formdata,
        processData: false,
        contentType: false,
        beforeSend: function () {
            $(".add_submit_btn").attr("disabled", true).html("Processing...");
        },
        success: function (response) {
            $(".add_submit_btn").removeAttr("disabled").html("Submit");

            if (response.products) {
                const updatedProducts = response.products;
                $("#addProductForm")[0].reset();

                // Close modal properly
                $("#addProductModal").modal("hide");

                // Remove backdrop manually (if still present)
                $(".modal-backdrop").remove();
                $("body").removeClass("modal-open").css("overflow", "auto");

                console.log(updatedProducts);

                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                    customClass: {
                        popup: "toast-black-text"
                    }
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire("Error", "Unexpected response from server.", "error");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $(".add_submit_btn").removeAttr("disabled").html("Submit");

            let errorMsg = errorThrown;
            if (jqXHR.responseJSON && jqXHR.responseJSON.message) {
                errorMsg = jqXHR.responseJSON.message;
            }
            if (jqXHR.responseJSON && jqXHR.responseJSON.errors) {
                let errors = Object.values(jqXHR.responseJSON.errors).map(err => err.join('\\n')).join('\\n');
                errorMsg = errors;
            }

            console.log(textStatus + ": " + errorMsg);
            Swal.fire("Error", errorMsg, "error");
        },
    });
});

$(document).on("submit", "#addVendorForm", function (e) {
    e.preventDefault(); // Prevent default form submission

    const formdata = new FormData(e.target); // Use e.target to get the form
    let vendorName = $("#add_Vendor_name").val();
    let vendoremail = $("#add_vendor_email").val();
    let vendorContactName = $("#vendor_contact_name").val();
    let vendorContactNumber = $("#vendor_contact_number").val();
    let vendorBusinessType = $("#vendor_business_type").val();
    let vendorgst = $("#vendor_gst_number").val();
    let vendorAddress = $("#add_vendor_address").val();
    let vendorState = $("#vendor_state_name").val();
    let vendorDistrict = $("#vendor_district_name").val();
    let vendorPincode = $("#vendor_pincode_value").val();
    let vendorBankName = $("#vendor_bank_name").val();
    let vendorAccountHolderName = $("#bank_account_name").val();
    let vendorAccountNumber = $("#vendor_account_number").val();
    let vendorifsc = $("#bank_ifsc_code").val();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "/vendor/store",
        method: "POST",
        dataType: "json",
        data: {
            vendorName: vendorName,
            vendoremail: vendoremail,
            vendorContactName: vendorContactName,
            vendorContactNumber: vendorContactNumber,
            vendorBusinessType: vendorBusinessType,
            vendorgst: vendorgst,
            vendorAddress: vendorAddress,
            vendorState: vendorState,
            vendorDistrict: vendorDistrict,
            vendorPincode: vendorPincode,
            vendorBankName: vendorBankName,
            vendorAccountHolderName: vendorAccountHolderName,
            vendorAccountNumber: vendorAccountNumber,
            vendorifsc: vendorifsc,
        },
        beforeSend: function () {
            $(".add_submit_btn").attr("disabled", true).html("Processing...");
        },
        success: function (response) {
            $(".add_submit_btn").removeAttr("disabled").html("Submit");

            if (response.status == 200) {
                const updatedProducts = response.products;
                $("#addVendorForm")[0].reset();

                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire("Error", "Unexpected response from server.", "error");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $(".add_submit_btn").removeAttr("disabled").html("Submit");

            console.log(textStatus + ": " + errorThrown);
            Swal.fire(textStatus.toUpperCase(), errorThrown, "warning");
        },
    });
});

$(document).ready(function () {
    // VENDOR STOCK EDIT
    $(document).on("click", ".change-status-btn", function () {
        let prod_stock_id = $(this).data("id");
        let vendorid = $(this).data("vendorid");
        let categoryid = $(this).data("cateid");
        let product_id = $(this).data("prodid");
        let available_stock = $(this).data("availstock");
        let sale_stock = $(this).data("salestock");

        $("#edit_stock_prod").val(product_id);
        $("#edit_stock_avail").val(available_stock);
        $("#edit_stock_sale").val(sale_stock);
        $("#edit_prodstock_id").val(prod_stock_id);
        $("#edit_prodstock_vendor_id").val(vendorid);
        $("#edit_prodstock_category_id").val(categoryid);
    });

    // VENDOR OFFER EDIT
    $(document).on("click", ".edit-vendor-offer-btn", function () {
        let offerid = $(this).data("offerid");
        let vendorid = $(this).data("vendorid");
        let productid = $(this).data("productid");
        let productprice = $(this).data("productprice");
        let offerprice = $(this).data("offerprice");
        let offerendDate = $(this).data("offerendDate");

        $("#edit_offer_prod_select").val(productid);
        $("#edit_offer_prod_price").val(productprice);
        $("#edit_offer_price").val(offerprice);
        $("#edit_offer_end_date").val(offerendDate);
        $("#edit_offer_id").val(offerid);
        $("#edit_offer_vendor_id").val(vendorid);
    });
});

// EDIT VENDOR STOCK
$(document).on("submit", "#edit_prod_stock_form", function (e) {
    e.preventDefault();

    let product = $("#edit_stock_prod").val();
    let availstock = $("#edit_stock_avail").val();
    let saleStock = $("#edit_stock_sale").val();
    let prodStockid = $("#edit_prodstock_id").val();
    let vendor_id = $("#edit_prodstock_vendor_id").val();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "/vendor/editprodstock",
        method: "POST",
        dataType: "json",
        data: {
            product: product,
            availstock: availstock,
            saleStock: saleStock,
            prodStockid: prodStockid,
            vendor_id: vendor_id,
        },
        beforeSend: function () {
            $("#edit_stock_submit_btn")
                .attr("disabled", true)
                .html("Processing...");
        },
        success: function (response) {
            $("#edit_stock_submit_btn").removeAttr("disabled").html("Submit");

            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire("Error", "Unexpected response from server.", "error");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#edit_stock_submit_btn").removeAttr("disabled").html("Submit");

            console.log(textStatus + ": " + errorThrown);
            Swal.fire(textStatus.toUpperCase(), errorThrown, "warning");
        },
    });
});

// ADD VENDOR STOCK
$(document).on("submit", "#add_prod_stock_form", function (e) {
    e.preventDefault();

    let product = $("#add_stock_prod").val();
    let availstock = $("#add_stock_avail").val();
    let saleStock = $("#add_stock_sale").val();
    let vendor_id = $("#add_stock_vendor_id").val();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "/vendor/addprodstock",
        method: "POST",
        dataType: "json",
        data: {
            product: product,
            availstock: availstock,
            saleStock: saleStock,
            vendor_id: vendor_id,
        },
        beforeSend: function () {
            $("#add_stock_submit_btn")
                .attr("disabled", true)
                .html("Processing...");
        },
        success: function (response) {
            $("#add_stock_submit_btn").removeAttr("disabled").html("Submit");

            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire("Error", "Unexpected response from server.", "error");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#add_stock_submit_btn").removeAttr("disabled").html("Submit");

            console.log(textStatus + ": " + errorThrown);
            Swal.fire(textStatus.toUpperCase(), errorThrown, "warning");
        },
    });
});

// VENDOR OFFER PRODUCT PRICE FETCH
$(document).on("change", "#add_prod_offer_select", function (e) {
    e.preventDefault();

    let product = $(this).val();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "/vendor/fetchproddetail",
        method: "POST",
        dataType: "json",
        data: {
            product: product,
        },
        success: function (response) {
            if (response.status == 200) {
                $("#add_product_price").val(response.data.product_mrp_price);
            } else {
                Swal.fire("Error", "Unexpected response from server.", "error");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#edit_stock_submit_btn").removeAttr("disabled").html("Submit");

            console.log(textStatus + ": " + errorThrown);
            Swal.fire(textStatus.toUpperCase(), errorThrown, "warning");
        },
    });
});

// VENDOR ADD OFFER
$(document).on("submit", "#add_prod_offer_form", function (e) {
    e.preventDefault();

    let product = $("#add_prod_offer_select").val();
    let productPrice = $("#add_product_price").val();
    let offerprice = $("#add_offer_price").val();
    let offerendDate = $("#add_offer_end_date").val();
    let vendorid = $("#add_offer_vendor_id").val();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "/vendor/addoffer",
        method: "POST",
        dataType: "json",
        data: {
            product: product,
            productPrice: productPrice,
            offerprice: offerprice,
            offerendDate: offerendDate,
            vendorid: vendorid,
        },
        beforeSend: function () {
            $("#add_offer_submit_btn")
                .attr("disabled", true)
                .html("Processing...");
        },
        success: function (response) {
            $("#add_offer_submit_btn").removeAttr("disabled").html("Submit");

            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire("Error", "Unexpected response from server.", "error");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#add_offer_submit_btn").removeAttr("disabled").html("Submit");

            console.log(textStatus + ": " + errorThrown);
            Swal.fire(textStatus.toUpperCase(), errorThrown, "warning");
        },
    });
});

// VENDOR EDIT OFFER
$(document).on("submit", "#edit_prod_offer_form", function (e) {
    e.preventDefault();

    let product = $("#edit_offer_prod_select").val();
    let productPrice = $("#edit_offer_prod_price").val();
    let offerprice = $("#edit_offer_price").val();
    let offerendDate = $("#edit_offer_end_date").val();
    let vendorid = $("#edit_offer_vendor_id").val();
    let offerid = $("#edit_offer_id").val();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "/vendor/editoffer",
        method: "POST",
        dataType: "json",
        data: {
            product: product,
            productPrice: productPrice,
            offerprice: offerprice,
            offerendDate: offerendDate,
            vendorid: vendorid,
            offerid: offerid,
        },
        beforeSend: function () {
            $("#edit_offer_submit_btn")
                .attr("disabled", true)
                .html("Processing...");
        },
        success: function (response) {
            $("#edit_offer_submit_btn").removeAttr("disabled").html("Submit");

            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                });

                // Toast Notification
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: {
                        popup: "swal-custom-popup",
                    },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Redirect after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire("Error", "Unexpected response from server.", "error");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            $("#edit_offer_submit_btn").removeAttr("disabled").html("Submit");

            console.log(textStatus + ": " + errorThrown);
            Swal.fire(textStatus.toUpperCase(), errorThrown, "warning");
        },
    });
});

// updatestock
$(document).on("submit", "#deletestock", function (e) {
    e.preventDefault();

    var productId = $("#stock_id").val(); // hidden product_id
    var stockStatus = $("select[name='product_stock']").val(); // selected stock value

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        url: "/updatestock/" + productId,
        method: "POST",
        data: {
            product_id: productId,
            product_stock: stockStatus
        },
        dataType: "json",
        success: function (response) {
            if (response.status == 200) {
                Swal.fire({
                    title: "Success",
                    text: response.message,
                    icon: "success",
                    customClass: { popup: "swal-custom-popup" },
                });

                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    customClass: { popup: "swal-custom-popup" },
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    },
                });

                Toast.fire({
                    icon: "success",
                    title: response.message,
                });

                // Reload after success
                setTimeout(function () {
                    window.location.reload();
                }, 1500);
            } else {
                Swal.fire("Error", "Unexpected response from server.", "error");
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus + ": " + errorThrown);
            Swal.fire(textStatus.toUpperCase(), errorThrown, "warning");
        },
    });
});

// deleteorderslots
$(document).on("click", ".deleteordersolt", function () {
    const id = $(this).attr("data-id");
    const qty = $(this).attr("data-qty");
    const amt = $(this).attr("data-productamt");
    const totalamt = $(this).attr("data-total");
    const orderid = $(this).attr("data-order");

    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/destroyordersolt",
                method: "POST",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                data: {
                    id: id,
                    qty: qty,
                    amt: amt,
                    totalamt: totalamt,
                    orderid: orderid,
                },
                success: function (response) {
                    $(".preloader").fadeOut();
                    console.log(response);
                    if (response.status == 200) {
                        Swal.fire({
                            title: "Success",
                            text: response.message,
                            icon: "success",
                            customClass: {
                                popup: "swal-custom-popup",
                            },
                        });

                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true,
                            customClass: {
                                popup: "swal-custom-popup",
                            },
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            },
                        });

                        Toast.fire({
                            icon: "success",
                            title: response.message,
                        });

                        setTimeout(function () {
                            window.location.reload();
                        }, 1500);
                    } else {
                        Swal.fire({
                            title: "Error",
                            text: response.message || "An unexpected error occurred.",
                            icon: "error",
                        });
                        console.log(response.message);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    Swal.fire(
                        textStatus.toUpperCase(),
                        errorThrown,
                        "warning"
                    );
                },
            });
        }
    });
});

$('.vieworders').on('click', function () {

    var orderid = $(this).data("orderid");
    var cname = $(this).data("cname");
    var address = $(this).data("address");
    var total = $(this).data("total")

    $.ajax({
        type: "GET",
        url: "/getproductdetails/" + orderid,
        // async: false,
        cache: true,
        contentType: false,
        processData: false,

        success: function (data) {


            $("#vieworderdetails").modal('show');

            $("#oid").text(orderid);
            $("#cname").text(cname);
            $("#mblnum").text(mblnum);
            $("#address").text(address);
            $("#totalamt").text(total);
            $("#orderdetailstable").empty("");
            $.each(data, function (key, item) {
                // Calculate total price for the item
                var totalPrice = parseFloat(item.product_regular_price) * parseInt(item.qty);

                $('#orderdetailstable').append(
                    '<tr>' +
                    '<td>' + item.product_name + '</td>' +
                    '<td>' + item.product_regular_price + '</td>' +
                    '<td>' + item.qty + '</td>' +
                    '<td>' + totalPrice.toFixed(2) + '</td>' +
                    '</tr>'
                );
            });

        }
    });


});

$(document).on("click", ".delete_order_status", function () {
    const id = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/destroyOrderStatus/" + id,
                method: "post",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    if (response.status == 200) {
                        Swal.fire({
                            title: "Deleted!",
                            text: response.message,
                            icon: "success",
                            timer: 1500,
                            showConfirmButton: false,
                        });
                        setTimeout(function () {
                            window.location.reload();
                        }, 1500);
                    } else {
                        Swal.fire("Error", response.message || "An error occurred.", "error");
                    }
                },
                error: function (xhr) {
                    Swal.fire("Error", xhr.responseJSON?.message || "An error occurred.", "error");
                },
            });
        }
    });
});

$(document).on("click", ".deleteseoheading", function () {
    const id = $(this).attr("data-id");
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/seoheading/delete/" + id,
                method: "post",
                dataType: "json",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (response) {
                    if (response.status == 200) {
                        Swal.fire({
                            title: "Deleted!",
                            text: response.message,
                            icon: "success",
                            timer: 1500,
                            showConfirmButton: false,
                        });
                        setTimeout(function () {
                            window.location.reload();
                        }, 1500);
                    } else {
                        Swal.fire("Error", response.message || "An error occurred.", "error");
                    }
                },
                error: function (xhr) {
                    Swal.fire("Error", xhr.responseJSON?.message || "An error occurred.", "error");
                },
            });
        }
    });
});