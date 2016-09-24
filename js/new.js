(function(){

  "use strict";

  var elements = document.querySelectorAll("#edit,#remove,#back");

      for(var i = 0; i<elements.length; i++){
          elements[i] ? elements[i].addEventListener("click", function(){ location.href = this.dataset.lochref; }, false) : null;
      }


}());
