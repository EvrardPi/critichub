export default function CustomRouter(routes, root) {
    const generate = function () {
      const pathname = window.location.pathname;
      const hash = window.location.hash.slice(1);
  
      let structure = routes[pathname];
  
      if (!structure) {
        // Vérifier la structure de route basée sur le hash si aucune correspondance sur le chemin
        structure = routes[hash];
      }
  
      if (!structure) {
        // Si aucune correspondance trouvée, rediriger vers une page d'erreur ou faire une autre action appropriée
        console.error("Route not found");
        return;
      }
  
      let component;
      let attributes = {};
  
      if (typeof structure === "function") {
        // Si la structure de route est une fonction, c'est le composant
        component = structure;
      } else {
        // Sinon, extraire le composant et les attributs de la structure
        component = structure.component;
        attributes = structure.attributes || {};
      }
  
      const element = generateStructure({
        type: component,
        attributes: attributes,
      });
  
      if (root.childNodes[0]) {
        root.replaceChild(element, root.childNodes[0]);
      } else {
        root.appendChild(element);
      }
    };
  
    const oldPushState = window.history.pushState;
    window.history.pushState = function (state, title, path) {
      oldPushState.call(window.history, state, title, path);
      window.dispatchEvent(new Event("popstate"));
    };
  
    generate();
  
    window.addEventListener("popstate", generate);
  }