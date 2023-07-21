document.addEventListener("DOMContentLoaded", function () {
  console.log("Youri a dit wouf");
  fetch("/back-get-content", {
    method: "GET",
    headers: {
      "Content-Type": "application/json",
    },
  })
    .then(function (response) {
      return response.json();
    })
    .then(function (data) {
      console.log(data);

      var h1Elements = document.querySelectorAll("h1");
      var h2Elements = document.querySelectorAll("h2");
      var h3Elements = document.querySelectorAll("h3");
      var h4Elements = document.querySelectorAll("h4");
      var h5Elements = document.querySelectorAll("h5");
      var h6Elements = document.querySelectorAll("h6");
      var pElements = document.querySelectorAll("p");
      var aElements = document.querySelectorAll("a");
      var strongElements = document.querySelectorAll("strong");
      var spanElements = document.querySelectorAll("span");

      // Appliquer les styles en fonction des données à tous les éléments h1
      h1Elements.forEach(function (h1Element) {
        h1Element.style.color = data.h1.color;
        h1Element.style.fontFamily = data.h1.police;
        h1Element.style.fontSize = data.h1.size + "px";
      });

      // Appliquer les styles en fonction des données à tous les éléments h2
      h2Elements.forEach(function (h2Element) {
        h2Element.style.color = data.h2.color;
        h2Element.style.fontFamily = data.h2.police;
        h2Element.style.fontSize = data.h2.size + "px";
      });

      // Appliquer les styles en fonction des données à tous les éléments h3
      h3Elements.forEach(function (h3Element) {
        h3Element.style.color = data.h3.color;
        h3Element.style.fontFamily = data.h3.police;
        h3Element.style.fontSize = data.h3.size + "px";
      });

      // Appliquer les styles en fonction des données à tous les éléments h4
      h4Elements.forEach(function (h4Element) {
        h4Element.style.color = data.h4.color;
        h4Element.style.fontFamily = data.h4.police;
        h4Element.style.fontSize = data.h4.size + "px";
      });

      // Appliquer les styles en fonction des données à tous les éléments h5
      h5Elements.forEach(function (h5Element) {
        h5Element.style.color = data.h5.color;
        h5Element.style.fontFamily = data.h5.police;
        h5Element.style.fontSize = data.h5.size + "px";
      });

      // Appliquer les styles en fonction des données à tous les éléments h6
      h6Elements.forEach(function (h6Element) {
        h6Element.style.color = data.h6.color;
        h6Element.style.fontFamily = data.h6.police;
        h6Element.style.fontSize = data.h6.size + "px";
      });

      // Appliquer les styles en fonction des données à tous les éléments p
      pElements.forEach(function (pElement) {
        pElement.style.color = data.text.color;
        pElement.style.fontFamily = data.text.police;
        pElement.style.fontSize = data.text.size + "px";
      });

      // Appliquer les styles en fonction des données à tous les éléments a
      aElements.forEach(function (linkElement) {
        linkElement.style.color = data.link.color;
        linkElement.style.fontFamily = data.link.police;
        linkElement.style.fontSize = data.link.size + "px";
      });

      // Appliquer les styles en fonction des données à tous les éléments strong
      strongElements.forEach(function (strongElement) {
        strongElement.style.color = data.strong.color;
        strongElement.style.fontFamily = data.strong.police;
        strongElement.style.fontSize = data.strong.size + "px";
      });
      spanElements.forEach(function (spanElement) {
        spanElement.style.color = data.span.color;
        spanElement.style.fontFamily = data.span.police;
        spanElement.style.fontSize = data.span.size + "px";
      });
      console.log(data.h1.size);
      document.body.style.backgroundColor = data.background.color;
    });
});
