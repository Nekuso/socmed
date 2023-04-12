const chatArea = document.getElementById("message_input");
const chatsHere = document.getElementById("chatsHere");

chatArea.addEventListener("keyup", (e) => {
    const text = e.target.value;
    console.log(text);
});

const sendChat = () => {
    if (chatArea.value == "") {
        alert("Please enter some text");
        return;
    }
    fetch("/sendChat/" + chatArea.value, {
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
                chatsHere.innerHTML = response + chatsHere.innerHTML;
                chatArea.value = "";
            } else {
                alert("Please enter some text");
            }
        })
        .catch((err) => {
            console.log(err);
        });
};
