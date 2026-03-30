import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const selectedElements = document.querySelectorAll('.status-form #status_id');
console.log(selectedElements)
for (let elem of selectedElements){
    elem.addEventListener('change', function () {
        this.form.submit();
    });
}
