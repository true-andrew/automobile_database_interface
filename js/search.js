function showFilters(){
  let check = document.getElementById('searchCheck');
  //;
  //console.log(check.checked);
  if (check.checked) {
    document.getElementById('searchButton').innerHTML = 'Простой поиск';
    document.getElementById('table-filters').style = "display";
    document.getElementById('search-text').setAttribute('disabled', 'disabled');
    $('.table-filters input').on('input', function () {
      filterTable($(this).parents('table'));
    });

    function filterTable($table) {
      var $filters = $table.find('.table-filters td');
      var $rows = $table.find('.table-data');
      $rows.each(function (rowIndex) {
        var valid = true;
        $(this).find('td').each(function (colIndex) {
          if ($filters.eq(colIndex).find('input').val()) {
            if ($(this).html().toLowerCase().indexOf(
              $filters.eq(colIndex).find('input').val().toLowerCase()) == -1) {
              valid = valid && false;
            }
          }
        });
        if (valid === true) {
          $(this).css('display', '');
        } else {
          $(this).css('display', 'none');
        }
      });
    }
  }
  else {
    document.getElementById('searchButton').innerHTML = 'Сложный поиск';
    document.getElementById('table-filters').style = "display:none"
    document.getElementById('search-text').removeAttribute('disabled', 'disabled');
  }
}


