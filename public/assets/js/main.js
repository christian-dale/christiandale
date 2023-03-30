if (localStorage.getItem("cookiePolicy")) {
    document.querySelector(".cookie-policy").remove();
}

if (document.querySelector(".cookie-policy") != null) {
    document.querySelector(".btn-cookie-policy-accept").addEventListener("click", function() {
        localStorage.setItem("cookiePolicy", true);
        document.querySelector(".cookie-policy").remove();
    });
}

/*
if (document.documentElement.lang == "en") {
    document.querySelector(".lang-switcher").innerHTML = `<span class="fi fi-no"></span></a>`;
} else {
    document.querySelector(".lang-switcher").innerHTML = `<span class="fi fi-gb"></span></a>`;
}

document.querySelector(".lang-switcher").addEventListener("click", function() {
    if (document.documentElement.lang == "en") {
        location.href = "https://christiandale.no";
    } else if (document.documentElement.lang == "no") {
        location.href = "https://christiandale.me";
    } else {
        location.href = "/";
    }
});
*/