//Leon Thomas - MUTT
//Drake - NOKIA
//d4vid - Feel It
//tyler, the creator - SWEET / I THOUGHT YOU WANTED TO DANCE
//Imogen Heap - Headlock
//NLE CHOPPA - Or What ft. 41 (Orchestra Mix)
//Civ - 1AM
//FIFTY FIFTY - Cupid (Twin Version)
//Holy Fuck - "Tom Tom"
//

document.addEventListener("DOMContentLoaded", function() {
  const textarea = document.getElementById("inputArea");
  const status = document.getElementById("status");

  //Function to prevent rapid firing of the update function
  function debounce(func, wait){
    let timeout;
        return function() {
            const context = this;
            const args = arguments;
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(context, args), wait);
        };
  }
  
});