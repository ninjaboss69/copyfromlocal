// set the target element that will be collapsed or expanded (eg. navbar menu)
const targetEl = document.getElementById("navbar-default");

// optionally set a trigger element (eg. a button, hamburger icon)
const triggerEl = document.getElementById("button");

// optional options with default values and callback functions

triggerEl.addEventListener("click", function () {
    targetEl.classList.toggle("hidden");
});
const deletePost = (id) => {
    // console.log(id + " will be deleted!");
    const a = "http://127.0.0.1:8000/delete/" + id;
    fetch(a, {
        method: "POST",
        headers: {
            "X-CSRF-Token": token,
            Accept: "application/json",
            "Content-Type": "application/json",
        },
    }).then(location.reload());
    // .then((response) => response.json())
    // .then((response) => console.log(JSON.stringify(response)));
};
const buttons = document.querySelectorAll(".buttons");
buttons.forEach((button) => {
    const id = button.getAttribute("id");
    button.addEventListener("click", function () {
        deletePost(id);
    });
});
