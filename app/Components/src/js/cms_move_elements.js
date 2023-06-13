const fills = document.querySelectorAll('.fill');
const empties = document.querySelectorAll('.empty');

let activeFill = null;

function dragStart() {
  activeFill = this;
  this.classList.add('hold');
  setTimeout(() => {
    this.classList.add('hidden');
  }, 0);
}

function dragEnd() {
  this.className = 'fill';
  activeFill = null;
}

function dragEnter(e) {
  e.preventDefault();
  this.classList.add('hovered');
}

function dragOver(e) {
  e.preventDefault();
}

function dragLeave() {
  this.classList.remove('hovered');
}

function dragDrop() {
  this.classList.remove('hovered');
  if (this.children.length === 0) {
    this.append(activeFill);
  } else {
    e.preventDefault();
  }
}

// FILL listeners
for (const fill of fills) {
  fill.addEventListener('dragstart', dragStart);
  fill.addEventListener('dragend', dragEnd);
}

// EMPTY listeners
for (const empty of empties) {
  empty.addEventListener('dragover', dragOver);
  empty.addEventListener('dragenter', dragEnter);
  empty.addEventListener('dragleave', dragLeave);
  empty.addEventListener('drop', dragDrop);
}
