const toast = (type, text) => {
    let background;

    if (type === "error") {
        background = "linear-gradient(to right, #ff416c, #ff4b2b)";
    } else if (type === "success") {
        background = "linear-gradient(to right, #00b09b, #96c93d)";
    }
    else if (type === "info") {
        background = "linear-gradient(to right, #00b09b, #96c93d)";
    }
    else if (type === "warning") {
        background = "linear-gradient(to right, #00b09b, #96c93d)";
    }
    else {
        background = "linear-gradient(to right, #00b09b, #96c93d)";
    }

    Toastify({
        text: text,
        duration: 5000,
        close: true,
        gravity: "top",
        position: "right",
        stopOnFocus: true,
        style: {
            background: background,
        },
        onClick: function () {},
    }).showToast();
};

export default toast;
