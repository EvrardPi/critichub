export default function Step3() {
  return {
    type: "html",
    children: [
      {
        type: "head",
        children: [
          { type: "meta", attributes: { charset: "UTF-8" } },
          {
            type: "meta",
            attributes: {
              name: "viewport",
              content: "width=device-width, initial-scale=1.0",
            },
          },
          { type: "title", children: ["Installer"] },
          { type: "link", attributes: { rel: "stylesheet", href: "/assets/css/installer.css" } },
          {
            type: "link",
            attributes: {
              rel: "preconnect",
              href: "https://fonts.googleapis.com",
            },
          },
          {
            type: "link",
            attributes: {
              rel: "preconnect",
              href: "https://fonts.gstatic.com",
              crossorigin: "",
            },
          },
          {
            type: "link",
            attributes: {
              href:
                "https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Playfair+Display:wght@500&family=Roboto&display=swap",
              rel: "stylesheet",
            },
          },
          {
            type: "link",
            attributes: {
              rel: "stylesheet",
              href:
                "https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200",
            },
          },
        ],
      },
      {
        type: "body",
        children: [
          {
            type: "div",
            attributes: { class: "navigation" },
            children: [
              {
                type: "span",
                attributes: { class: "material-symbols-outlined" },
                children: [" arrow_circle_left "],
              },
              {
                type: "span",
                attributes: { class: "material-symbols-outlined" },
                children: [" arrow_circle_right "],
              },
            ],
          },
          {
            type: "img",
            attributes: {
              class: "bg-installer",
              src: "/assets/images/bg-installer.jpg",
              alt: "bg-installer",
            },
          },
          {
            type: "div",
            attributes: { class: "container" },
            children: [
              {
                type: "div",
                attributes: { class: "form-container" },
                children: [
                  { type: "h1", children: ["Installer"] },
                  {
                    type: "h3",
                    children: [
                      { type: "span", children: ["Étape 3:"] },
                      " Création du compte administrateur.",
                    ],
                  },
                  {
                    type: "div",
                    attributes: { class: "form-input" },
                    children: [
                      { type: "span", children: ["Adresse e-mail:"] },
                      { type: "input", attributes: { type: "text", placeholder: "E-Mail" } },
                    ],
                  },
                  {
                    type: "div",
                    attributes: { class: "form-input" },
                    children: [
                      { type: "span", children: ["Nom"] },
                      { type: "input", attributes: { type: "text", placeholder: "Nom" } },
                    ],
                  },
                  {
                    type: "div",
                    attributes: { class: "form-input" },
                    children: [
                      { type: "span", children: ["Prénom"] },
                      { type: "input", attributes: { type: "text", placeholder: "Prénom" } },
                    ],
                  },
                  {
                    type: "div",
                    attributes: { class: "form-input" },
                    children: [
                      { type: "span", children: ["Mot de passe"] },
                      { type: "input", attributes: { type: "text", placeholder: "Mot de passe" } },
                    ],
                  },
                  {
                    type: "div",
                    attributes: { class: "form-input" },
                    children: [
                      { type: "span", children: ["Date de naissance"] },
                      { type: "input", attributes: { type: "date", placeholder: "Date de naissance" } },
                    ],
                  },
                ],
              },
            ],
          },
        ],
      },
    ],
  };
}
    