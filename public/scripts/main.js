const textArea = document.getElementById("user_text_input");
const postHere = document.getElementById("postHere");
const formSubmit = document.getElementById("formSubmit");

textArea.addEventListener("keyup", (e) => {
    const text = e.target.value;
    console.log(text);
});

const handleCreatePost = () => {
    fetch("/insertPost/" + textArea.value, {
        method: "GET",
        headers: {
            "Content-Type": "text/html",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
    })
        .then((res) => res.text())
        .then((response) => {
            if (response) {
                postHere.innerHTML = response + postHere.innerHTML;
                textArea.value = "";
            } else {
                alert("Please enter some text");
            }
        })
        .catch((err) => {
            console.log(err);
        });
};

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
        redirect("/");
    } catch (error) {
        alert(error);
    }
}

async function handleDeletePost(id) {
    const confirmed = confirm("Are you sure you want to delete this?");
    if (!confirmed) {
        return;
    }
    try {
        const response = await fetch(`/deletePost/${id}`, {
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
