const formSubmit = document.getElementById("formSubmit");
const deleteBtn = document.querySelector(".deleteBtn");

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
        contentType: false,
        error: function (ts) {
            alert(ts.responseText);
        },
        success: function (data) {
            alert(data.msg);
        },
    });
});

function handleDelete(id) {
    alert(id);
    $.ajax({
        url: "/delete/" + id,
        type: "post",
        data: {
            id: id,
        },
        processData: false,
        dataType: "json",
        contentType: false,
        error: function (ts) {
            alert(ts.responseText);
        },
        success: function (data) {
            alert(data.msg);
        },
    });
}
