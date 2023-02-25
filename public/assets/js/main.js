if (localStorage.getItem("cookiePolicy")) {
    document.querySelector(".cookie-policy").remove();
}

if (document.querySelector(".cookie-policy") != null) {
    document.querySelector(".btn-cookie-policy-accept").addEventListener("click", function() {
        localStorage.setItem("cookiePolicy", true);
        document.querySelector(".cookie-policy").remove();
    });
}
