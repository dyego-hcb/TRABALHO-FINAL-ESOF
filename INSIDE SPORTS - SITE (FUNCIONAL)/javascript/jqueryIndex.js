
$("#buttonRemove").click(function() {
  let numberItens = getCurrentNumber();
  if(numberItens>0)
  {
    numberItens = numberItens - 1;
    setNewNumberItens(numberItens);
  }
});
$("#buttonAdd").click(function() {
  let numberItens = getCurrentNumber();
  numberItens = numberItens + 1;
  setNewNumberItens(numberItens);
});
function removeItens(id) {
  let numberItens = getCurrentNumber(id);
  if(numberItens>0)
  {
    numberItens = numberItens - 1;
    setNewNumberItens(numberItens);
  }
}
function addItens(id) {
  let numberItens = getCurrentNumber(id);
  numberItens = numberItens + 1;
  setNewNumberItens(numberItens);
}
function getCurrentNumber(id) {
    let numberItens_srt = $('#'+id).val();
    numberItens_num = Number(numberItens_srt);
    return numberItens_num;
  }
  
  function setNewNumberItens(numberIntesAtt, id) {
    $("#"+id).val(numberIntesAtt);
  }