const formSubmit = document.getElementById("formSubmit");

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

formSubmit.addEventListener("click", (e) => {
    e.preventDefault();

    $.ajax({
        url: $(this).attr("action"),
        method: $(this).attr("method"),
        data: new FormData(this),
        processData: false,
        dataType: "json",
        error: function (ts) {
            alert(ts.responseText);
        },
        success: function (data) {
            alert(data.msg);
        },
    });
});
