import generateStructure from "../core/generateStructure.js";

/**
 *
 * @param {HTMLElement} element
 * @param {Object} structure
 */
export default function updateStructure(element, structure) {
    if (structure.children) {
      element.innerHTML = ''; // Clear existing children
      for (const child of structure.children) {
        let subChild;
        if (typeof child === "string") {
          subChild = document.createTextNode(child);
        } else {
          subChild = generateStructure(child);
        }
        element.appendChild(subChild);
      }
    }
  
    if (structure.events) {
      // Remove existing event listeners
      const clone = element.cloneNode(true);
      element.parentNode.replaceChild(clone, element);
      element = clone;
  
      // Add new event listeners
      for (const event in structure.events) {
        element.addEventListener(event, structure.events[event]);
      }
    }
  
    if (structure.attributes) {
      // Remove existing attributes
      while (element.attributes.length > 0) {
        element.removeAttribute(element.attributes[0].name);
      }
  
      // Add new attributes
      for (const attribute in structure.attributes) {
        if (attribute.startsWith("data-")) {
          element.dataset[attribute.substring(5)] = structure.attributes[attribute];
        } else {
          element.setAttribute(attribute, structure.attributes[attribute]);
        }
      }
    }
  
    return element;
  }

  