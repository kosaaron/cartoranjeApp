
document.getElementById('add_new').addEventListener('click', openAddPopup, false);

function openAddPopup() {

    var popupShell = document.getElementById('add_new_popup');
    var moduleName = localStorage.getItem('module');
    popupShell.innerHTML = getModalHTML(moduleName);

    document.getElementById('add_modal_close').addEventListener('click', closeAddModal, false);
    document.getElementById('add_modal_cancel').addEventListener('click', closeAddModal, false);
    document.getElementById('add_modal_submit').addEventListener('click', submitAddModal, false);
    document.getElementById("add_new_popup").style.display="block";
    // alert();
}

function closeAddModal() {
    document.getElementById("add_new_popup").style.display="none";
}
function submitAddModal() {
    
    var moduleName = localStorage.getItem('module');
    insertFormData(moduleName);
    alert("Submitted!");
    closeAddModal();
}

function getModalHTML(moduleName) {
    var modalHTML = "";
    switch (moduleName) {
        case 'Partners':
            modalHTML = ModalHTML.partnerModal();
            break;
        case 'Projects':
            modalHTML = ModalHTML.projectModal();
            break;
    
        default:
            break;
    }

    return modalHTML;
}

function insertFormData(moduleName) {
    let insertData = CreateJSON(moduleName);
    console.log(insertData);


}

function CreateJSON(placeName) {
    let inputs = document.querySelectorAll('[data-place="' + placeName + '"]');
    let Results = [];
    let i = 0;
    for (const input of inputs) {
        let uploadName = input.getAttribute('upload-name').split('.');
        // alert(uploadName);

        let inputValue = {
            'inputTable': uploadName[0],
            'inputColumn': uploadName[1],
            'inputValue': input.value
        };

        Results.push(inputValue);
    }

    return Results;

}
let ModalHTML = {
    partnerModal: function(params) {
        var partnerModalHTML = `
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="nem_partner_title">??j megrendel??</h5>
                    <a id="add_modal_close"><i class="fas fa-times"></i></a>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="new_partner_name" class="form-label">Megrendel?? neve</label>
                        <input type="text" class="form-control" id="new_partner_name" placeholder="" data-place="Partners" upload-name="partners.PartnerName">
                    </div>
                    <div class="mb-3">
                        <label for="new_partner_phone" class="form-label">Megrendel?? telefonsz??ma:</label>
                        <input type="text" class="form-control" id="new_partner_phone" placeholder="" data-place="Partners" upload-name="partners.PartnerPhone">
                    </div>
                    <div class="mb-3">
                        <label for="new_partner_email" class="form-label">Megrendel?? email c??me</label>
                        <input type="email" class="form-control" id="new_partner_email" placeholder="name@example.com" data-place="Partners" upload-name="partners.PartnerEmail">
                    </div>
                </div>
            <div class="modal-footer">
                <button id="add_modal_cancel" type="button" class="btn btn-secondary" data-bs-dismiss="modal">M??gse</button>
                <button id="add_modal_submit" type="button" class="btn btn-primary">+Hozz??ad</button>
            </div>
            </div>
        </div>
        `;
        return partnerModalHTML;
    },
    projectModal: function(params) {
        var projectStatusHTML = `
            <div class="mb-3">
                <label for="new_project_status" class="form-label">Projekt st??tusza</label>
                <select class="form-control" id="new_project_status" aria-label="Default select example" data-place="Projects" upload-name="projects.ProjectStatusFk">
                    <option value="1">Penta</option>
                    <option value="2">Invitech</option>
                    <option value="3">??jbuda</option>
                </select>
            </div>
        `;
    
        var projectPartnerHTML = `
            <div class="mb-3">
                <label for="new_project_partner" class="form-label">Megrendel??</label>
                <select class="form-control" id="new_project_partner" aria-label="Default select example" data-place="Projects" upload-name="projects.ProjectPartnerFK">
                    <option value="1">Penta</option>
                    <option value="2">Invitech</option>
                    <option value="3">??jbuda</option>
                </select>
            </div>
        `;
    
        var projectModalHTML = `
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">??j projekt</h5>
                    <a id="add_modal_close"><i class="fas fa-times"></i></a>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="new_project_city" class="form-label">V??ros (+ ker??let)</label>
                        <input type="text" class="form-control" id="new_project_city" placeholder="Budapest 16" data-place="Projects" upload-name="projects.ProjectCity">
                    </div>
                    <div class="mb-3">
                        <label for="new_project_city" class="form-label">Utca, h??zsz??m, hrsz.</label>
                        <input type="text" class="form-control" id="new_project_city" placeholder="R??kosi ??t 185." data-place="Projects" upload-name="projects.ProjectStreet">
                    </div>
                    <div class="mb-3">
                        <label for="new_project_type" class="form-label">T??rgy</label>
                        <input type="text" class="form-control" id="new_project_type" placeholder="pl. v??zrajz" data-place="Projects" upload-name="projects.ProjectType">
                    </div>`
                    + projectStatusHTML 
                    + projectPartnerHTML +
                    `<div class="mb-3">
                        <label for="new_project_price" class="form-label">Projekt d??ja (nett??)</label>
                        <input type="number" class="form-control" id="new_project_price" placeholder="" data-place="Projects" upload-name="projects.ProjectPrice">
                    </div>
                    <div class="mb-3">
                        <label for="new_project_priceVAT" class="form-label">Projekt d??ja (brutt??)</label>
                        <input type="number" class="form-control" id="new_project_priceVAT" placeholder="" data-place="Projects" upload-name="projects.ProjectPriceVAT">
                    </div>
                    <div class="mb-3">
                        <label for="new_project_comment" class="form-label">Megjegyz??s</label>
                        <textarea class="form-control" id="new_project_comment" rows="3" data-place="Projects" upload-name="projects.ProjectComment"></textarea>
                    </div>
                </div>
            <div class="modal-footer">
                <button id="add_modal_cancel" type="button" class="btn btn-secondary" data-bs-dismiss="modal">M??gse</button>
                <button id="add_modal_submit" type="button" class="btn btn-primary">+Hozz??ad</button>
            </div>
            </div>
        </div>
        `;
        return projectModalHTML;
    }
}

