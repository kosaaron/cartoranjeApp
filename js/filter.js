import { setCCheight } from './main.js';


document.getElementById('open_filter').addEventListener('click', openFilterHeader, false);
 
function openFilterHeader() {
    document.getElementById('filter_header').style.display="block";
    document.getElementById('open_filter').style.display="none";
    
    setCCheight();
}

export function closeFilterHeader() {
    document.getElementById('filter_header').style.display = "none";
    document.getElementById('open_filter').style.display="block";
    
    setCCheight();
}