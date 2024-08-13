<script src="/assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="/assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="/assets/js/plugins/countup.min.js"></script>
<script src="/assets/js/plugins/parallax.min.js"></script>
<script src="/assets/js/material-kit.min.js?v=3.0.4" type="text/javascript"></script>
<script>
    if (document.getElementsByClassName('page-header')) {
        window.onscroll = debounce(function() {
            var scrollPosition = window.pageYOffset;
            var bgParallax = document.querySelector('.page-header');
            var oVal = (window.scrollY / 3);
            bgParallax.style.transform = 'translate3d(0,' + oVal + 'px,0)';
        }, 6);
    }
</script>

<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>

<script>
    let userRentTable = new DataTable('#userRentTable', {
        responsive: true,
    });
</script>

<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
    });

    $(function() {
        $("#province").on("change", function() {
            let id_province = $("#province").val();
            $.ajax({
                type: "POST",
                url: "{{ route('getRegency') }}",
                data: {
                    id_province: id_province,
                },
                cache: false,

                success: function(msg) {
                    $("#regency").html(msg);
                    $("#district").html("");
                    $("#village").html("");
                },
                error: function(data) {
                    console.log("error:", data);
                },
            });
        });

        $("#regency").on("change", function() {
            let id_regency = $("#regency").val();
            $.ajax({
                type: "POST",
                url: "{{ route('getDistrict') }}",
                data: {
                    id_regency: id_regency,
                },
                cache: false,

                success: function(msg) {
                    $("#district").html(msg);
                },
                error: function(data) {
                    console.log("error:", data);
                },
            });
        });

        $("#district").on("change", function() {
            let id_district = $("#district").val();
            $.ajax({
                type: "POST",
                url: "{{ route('getVillage') }}",
                data: {
                    id_district: id_district,
                },
                cache: false,

                success: function(msg) {
                    $("#village").html(msg);
                },
                error: function(data) {
                    console.log("error:", data);
                },
            });
        });
    });

    // $(function() {
    //     $("#province").on("change", function() {
    //         let id_province = $("#province").val();
    //         $.ajax({
    //             type: "POST",
    //             url: "https://80b0-125-166-2-13.ngrok-free.app/getRegency",
    //             data: {
    //                 id_province: id_province,
    //             },
    //             cache: false,

    //             success: function(msg) {
    //                 $("#regency").html(msg);
    //                 $("#district").html("");
    //                 $("#village").html("");
    //             },
    //             error: function(data) {
    //                 console.log("error:", data);
    //             },
    //         });
    //     });

    //     $("#regency").on("change", function() {
    //         let id_regency = $("#regency").val();
    //         $.ajax({
    //             type: "POST",
    //             url: "https://80b0-125-166-2-13.ngrok-free.app/getDistrict",
    //             data: {
    //                 id_regency: id_regency,
    //             },
    //             cache: false,

    //             success: function(msg) {
    //                 $("#district").html(msg);
    //             },
    //             error: function(data) {
    //                 console.log("error:", data);
    //             },
    //         });
    //     });

    //     $("#district").on("change", function() {
    //         let id_district = $("#district").val();
    //         $.ajax({
    //             type: "POST",
    //             url: "https://80b0-125-166-2-13.ngrok-free.app/getVillage",
    //             data: {
    //                 id_district: id_district,
    //             },
    //             cache: false,

    //             success: function(msg) {
    //                 $("#village").html(msg);
    //             },
    //             error: function(data) {
    //                 console.log("error:", data);
    //             },
    //         });
    //     });
    // });
</script>
