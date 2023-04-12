// Made with ❤️ by Nekuso
const token = document.querySelector('meta[name="csrf-token"]').content;

const textArea = document.getElementById("user_text_input");
const postHere = document.getElementById("postHere");
const formSubmit = document.getElementById("formSubmit");

textArea.addEventListener("keyup", (e) => {
    const text = e.target.value;
    console.log(text);
});

const handleCreatePost = () => {
    if (textArea.value == "") {
        alert("Please enter some text");
        return;
    }
    fetch("/insertPost/" + textArea.value, {
        method: "POST",
        headers: {
            "Content-Type": "text/html",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": token,
        },
    })
        .then((res) => res.text())
        .then((response) => {
            if (response) {
                const newPost = document.createElement("div");
                newPost.innerHTML = response;
                newPost.classList.add(
                    "card",
                    "p-4",
                    "bg-light",
                    "hoverableCard",
                    "post-animation"
                ); // add animation class
                postHere.insertBefore(newPost, postHere.firstChild);
                setTimeout(() => {
                    newPost.classList.remove("post-animation"); // remove animation class
                }, 500);
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
    const confirmed = confirm("Are you sure you want to delete this?");
    if (!confirmed) {
        return;
    }
    try {
        const response = await fetch(`/delete/${id}`, {
            method: "POST",
            body: JSON.stringify({ id: parseInt(id) }),
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": token,
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
                "X-CSRF-TOKEN": token,
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

$(document).ready(function () {
    // When a friend is clicked, load the chat messages for that friend
    $(".friend").click(function () {
        var friendId = $(this).data("friend-id");
        var friendName = $(this).find("a").text();
        $("#friend_name").text(friendName);
        fetch("/chats/" + friendId)
            .then((response) => response.text())
            .then((data) => {
                $(".chats").html(data);
            })
            .catch((error) => {
                console.error(error);
            });
    });
});
