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
        contentType: false,
        error: function (ts) {
            alert(ts.responseText);
        },
        success: function (data) {
            alert(data.msg);
        },
    });
});

async function handleDelete(id) {
    confirm("Are you sure you want to delete this?");
    try {
        const response = await fetch(`/delete/${id}`, {
            method: "POST",
            body: JSON.stringify({ id: parseInt(id) }),
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
        });

        const data = await response.json();

        alert(data.message);

        const element = document.getElementById(id);
        element.style.opacity = "0";
        setTimeout(() => {
            element.remove();
        }, 500);
    } catch (error) {
        alert(error);
    }
}
