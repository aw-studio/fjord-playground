(function() {
    let email = document.getElementById("email");
    let password = document.getElementById("password");

    function typeWriter(el, text, callback, i = 0) {
        let speed = 30;
        if (i < text.length) {
            el.value += text.charAt(i);
            i++;
            setTimeout(() => {
                typeWriter(el, text, callback, i);
            }, speed);
        } else {
            if (callback) {
                callback();
            }
        }
    }

    typeWriter(email, "admin@admin.com", () => {
        typeWriter(password, "secret");
    });
})();
