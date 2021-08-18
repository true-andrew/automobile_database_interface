"use strict";
/**
 * Замена поля внизу и вставка в него соответствующих значений
 */
document.addEventListener('click', (event) => {
  let keyWords = ['id', 'Марка', 'Модель', 'Двигатель', 'Кузов', 'Топливо', 'Коробка передач', 'Привод', 'Цена', 'Цвет', 'Дата производства'];
  if (event.target.tagName === "TD" && !keyWords.includes(event.target.innerHTML))  {
    document.getElementById("add").style = "display:none";
    document.getElementById("changeRemove").style = "display:block";
    //console.log(event.target);
    //console.log(event.target.parentNode);
    let parentEl = event.target.parentNode;
    //console.log(parentEl.children[1]);
    let cell = parentEl.children[1].innerHTML;
    let id = parentEl.children[0].innerHTML;
    document.getElementById('idRow').value = id;
    document.getElementById('change').value = cell;
  } else if (event.target.classList.contains('form2')) {
    document.getElementById("add").style = "display:none";
    document.getElementById("changeRemove").style = "display:block";
  }
  else {
    document.getElementById("add").style = "display:block";
    document.getElementById("changeRemove").style = "display:none";
  }
});

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
  for (var i = 1; i < table.rows.length; i++) {
    flag = false;
    for (var j = table.rows[i].cells.length - 1; j >= 0; j--) {
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
