
import Partners from './modules/partner.js';
import Projects from './modules/project.js';

//window.onload = setCCheight;
window.onresize = setCCheight;

addELs(); //Adding Event Listeners for the menu


function setCCheight() {
    // document.getElementById("username").innerText = localStorage.getItem('firstname');
    var height = window.innerHeight;

    const fltrHeader = document.getElementById('filter_header');
    if (fltrHeader !== null) {
        var filterHeaderHeight = fltrHeader.clientHeight;
        height = height - filterHeaderHeight;
    }

    const pageHeader = document.getElementById('page_header');
    if (pageHeader !== null) {
        var pageHeaderHeight = pageHeader.clientHeight;
        height = height - pageHeaderHeight;
    }
    
    //Korrigálás, az alsó menü miatt mobil nézetben
    if (window.innerWidth<=768) {
        height = height- 50;
    }
    //Korrigálás, a card container paddingjével
    height = height- 5;

    document.getElementById('card_container').style.maxHeight = height+"px";

}

export { setCCheight };

function addELs() {
    //document.getElementById('open_filter').addEventListener('click', setCCheight, false);
    

    const button1=document.getElementById('menu_item_timesheet');
    button1.addEventListener('click', clickOnMenu, false);
    button1.btnID = 'menu_item_timesheet';

    const button2=document.getElementById('menu_item_partner');
    button2.addEventListener('click', clickOnMenu, false);
    button2.btnID = 'menu_item_partner';

    const button3=document.getElementById('menu_item_tasks');
    button3.addEventListener('click', clickOnMenu, false);
    button3.btnID = 'menu_item_tasks';

    const button4=document.getElementById('menu_item_projects');
    button4.addEventListener('click', clickOnMenu, false);
    button4.btnID = 'menu_item_projects';
}

function clickOnMenu(button) {
    const contentDIV = document.getElementById('content');
    var prevModule = localStorage.getItem('module');
    activeMenuStyle(prevModule, button.currentTarget.btnID);


    contentDIV.innerHTML = "";
    var contentHTML = "";
    switch (button.currentTarget.btnID) {
        case 'menu_item_timesheet':
            contentHTML = '<p>Timesheet</p>';
            break;
        case 'menu_item_partner':
            localStorage.setItem('module', 'Partners');
            Partners.loadModule(contentDIV);
            break;
        case 'menu_item_tasks':
            contentHTML = '<p>Feladatok</p>';
            break;
        case 'menu_item_projects':
            localStorage.setItem('module', 'Projects');
            Projects.loadModule(contentDIV);
            break;
        default:
            break;
    }

    contentDIV.innerHTML = contentHTML;
    
}
function activeMenuStyle(prevModule, buttonId) {
    switch (prevModule) {
        case 'Partners':
            document.getElementById('menu_item_partner').classList.remove('menu-item-active');
            break;
        case 'Projects':
            document.getElementById('menu_item_projects').classList.remove('menu-item-active');
            break;
    
        default:
            break;
    }
    if (!(buttonId == undefined || buttonId == null)) {
        document.getElementById(buttonId).classList.add('menu-item-active');
    }
    
}