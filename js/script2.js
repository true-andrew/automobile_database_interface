"use strict";
/**
 * Замена нижних полей и вставка в них соответствуюищих значений
 */
document.addEventListener('click', (event) => {
  let keyWords = ['id', 'Марка', 'Модель', 'Двигатель', 'Кузов', 'Топливо', 'Коробка передач', 'Привод', 'Цена', 'Цвет', 'Дата производства'];
  if (event.target.tagName === "TD" && !keyWords.includes(event.target.innerHTML) && event.target.childNodes.length === 1)  {
    document.getElementById("add").style = "display:none";
    document.getElementById("changeRemove").style = "display:block";
    let parentEl = event.target.parentNode;
    let id = parentEl.children[0].innerHTML;
    document.getElementById('idRow').value = id;
    for (let i = 0; i < document.getElementById('brand').options.length; i++){
      if (document.getElementById('brand').options[i].innerHTML === parentEl.children[1].innerHTML) {
        document.getElementById('brand').options[i].selected = true;
      }
    }
    document.getElementById('model').value = parentEl.children[2].innerHTML;
    for (let i = 0; i < document.getElementById('engine').options.length; i++){
      if (document.getElementById('engine').options[i].innerHTML === parentEl.children[3].innerHTML) {
        document.getElementById('engine').options[i].selected = true;
      }
    }
    for (let i = 0; i < document.getElementById('body').options.length; i++){
      if (document.getElementById('body').options[i].innerHTML === parentEl.children[4].innerHTML) {
        document.getElementById('body').options[i].selected = true;
      }
    }
    for (let i = 0; i < document.getElementById('fuel').options.length; i++){
      if (document.getElementById('fuel').options[i].innerHTML === parentEl.children[5].innerHTML) {
        document.getElementById('fuel').options[i].selected = true;
      }
    }
    for (let i = 0; i < document.getElementById('transmission').options.length; i++){
      if (document.getElementById('transmission').options[i].innerHTML === parentEl.children[6].innerHTML) {
        document.getElementById('transmission').options[i].selected = true;
      }
    }
    for (let i = 0; i < document.getElementById('drive').options.length; i++){
      if (document.getElementById('drive').options[i].innerHTML === parentEl.children[7].innerHTML) {
        document.getElementById('drive').options[i].selected = true;
      }
    }
    document.getElementById('cost').value = parentEl.children[8].innerHTML;
    document.getElementById('color').value = parentEl.children[9].innerHTML;
    document.getElementById('date').value = parentEl.children[10].innerHTML;

  } else if (event.target.classList.contains('form2')) {
    document.getElementById("add").style = "display:none";
    document.getElementById("changeRemove").style = "display:block";
  }
  else {
    document.getElementById("add").style = "display:block";
    document.getElementById("changeRemove").style = "display:none";
  }
})
/**
 * Сортировка таблицы
 */
document.addEventListener('DOMContentLoaded', () => {

  const getSort = ({ target }) => {
    const order = (target.dataset.order = -(target.dataset.order || -1));
    const index = [...target.parentNode.cells].indexOf(target);
    const collator = new Intl.Collator(['en', 'ru'], { numeric: true });
    const comparator = (index, order) => (a, b) => order * collator.compare(
      a.children[index].innerHTML,
      b.children[index].innerHTML
    );

    for(const tBody of target.closest('table').tBodies)
      tBody.append(...[...tBody.rows].sort(comparator(index, order)));

    for(const cell of target.parentNode.cells)
      cell.classList.toggle('sorted', cell === target);
  };

  document.querySelectorAll('.table_sort thead').forEach(tableTH => tableTH.addEventListener('click', () => getSort(event)));

});


/**
 * Фильтрация таблицы
 */
function tableSearch() {
  var phrase = document.getElementById('search-text');
  var table = document.getElementById('table');
  var regPhrase = new RegExp(phrase.value, 'i');
  var flag = false;
  for (var i = 2; i < table.rows.length; i++) {
    flag = false;
    for (var j = table.rows[i].cells.length - 1; j >= 1; j--) {
      flag = regPhrase.test(table.rows[i].cells[j].innerHTML);
      if (flag) break;
    }
    if (flag) {
      table.rows[i].style.display = "";
    } else {
      table.rows[i].style.display = "none";
    }

  }
}
