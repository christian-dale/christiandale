if (localStorage.getItem("cookiePolicy") == null) {
    document.querySelector(".cookie-policy").style.display = "block";
}

if (document.querySelector(".cookie-policy") != null) {
    document.querySelector(".btn-cookie-policy-accept").addEventListener("click", function() {
        localStorage.setItem("cookiePolicy", true);

        document.querySelector(".cookie-policy").remove();
    });
}

hljs.highlightAll();
