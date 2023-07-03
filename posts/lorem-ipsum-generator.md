---
{
    "title": "Simple and fast lorem ipsum generator",
    "description": "Simple and fast lorem ipsum generator online.",
    "permalink": "lorem-ipsum-generator",
    "date": "2023-07-03",
    "dateUpdate": "2023-07-03",
    "draft": false,
    "lang": "en",
    "categories": ["tools"],
    "image": "",
    "attrib": ""
}
---

Lorem Ipsum is a commonly used placeholder text in the design and typesetting industry. It is essentially dummy text that is used to fill space in a document or layout to demonstrate its visual elements without being distracted by meaningful content.

The Lorem Ipsum text has no specific meaning or message; it is a jumble of Latin-like words and phrases that have been scrambled and altered to create a nonsensical passage. It is designed to have a more or less normal distribution of letters, making it resemble readable text without actually conveying any coherent information.

<div class="lorem-ipsum-text" style="background-color: #eee; padding: 5px 25px;">
<p style="margin-top: 10px;"><b>Generated text:</b></p>
<a href="#" class="lorem-regen"><i class="fa-solid fa-rotate-right"></i> Regenerate</a>
<p><em></em></p>
</div>

<script>
function genLorem() {
    const loremContainer = document.querySelector(".lorem-ipsum-text p em");
    loremContainer.innerHTML = "Lorem ipsum dolor sit amet,";
    const phrases = ["lorem", "ipsum", "advoco", "aestas estas", "amicitia", "arto", "laesio lesio", "communis", "excuso", "laetatio", "modus", "nutus", "ordo", "picea", "quod", "secerno secrevi secretum", "sopor", "utilitas", "voluntas", "destinatus", "ergo", "faveo"];
    let isBeginning = false;
    for (let i = 0; i < 100; i++) {
        let phrase = phrases[Math.floor(Math.random() * phrases.length)];
        if (isBeginning) {
            let phraseUpper = phrase.charAt(0).toUpperCase() + phrase.slice(1);
            loremContainer.append(" " + phraseUpper);
            isBeginning = false;
        } else {
            loremContainer.append(" " + phrase);
        }
        const num = Math.floor(Math.random() * 400);
        if (num < 25) {
            loremContainer.append(", ");
        } else if (num < 50) {
            loremContainer.append(". ")
            isBeginning = true;
        }
    }
    loremContainer.append(".");
}
genLorem();
document.querySelector(".lorem-regen").addEventListener("click", function(e) {
    e.preventDefault();
    genLorem();
});
</script>
