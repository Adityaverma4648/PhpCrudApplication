import state from "../data/states.js";
import bloodBank from "../data/blood-banks.js";

var stateCont= document.getElementById('state');
stateCont.innerHTML = `<option value="all">State</option>`;
state.forEach((elem)=>{
      // console.log(elem)
        var content  = `<option value=${elem.label}>${elem.label}</option>`;
        stateCont.innerHTML+=content;
})