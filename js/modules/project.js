import { closeFilterHeader } from "../filter.js";
import { setCCheight } from '../main.js';

let Varibles = {
    //data
    Shell: null,
    FilterData : {ProjectCity:""}, // és ide még jön sok szűrő
    PageData: []
}

let Projects = {
    loadModule: function (shell) {
        Varibles.Shell = shell;
        Database.getFullPageData();
    } 
}

export default Projects;

let Database = {
    getFullPageData: function () {
        var filterdata = Varibles.FilterData;
        $.ajax({
            type: "POST",
            url: "./php/modules/Projects.php",
            data: {
                'FilterData': filterdata
            },
            success: function (result) {
                Varibles.PageData = result['Data'];
                // console.log(JSON.stringify(result));
                Loadings.reloadFullPage();
            },
            dataType: 'json'
        });
    }

}

let Loadings = {
    reloadFullPage: function () {
        Framework.load()
    }
}

let Framework = {
    load: function () {
        var projectFltrHTML= `
        <div class="col-12 filter-container">
            <div class="row">
                <div class="col-md-10 col-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12">
                            <input type="text" name="Projekt városa" id="input_project_city" class="form-control filter-input" placeholder="Város">
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-12 align-right">
                    <a id="project_filter_submit_btn" type="button" class="btn btn-light filter-button">Szűr <i class="fas fa-filter"></i></a>
                </div>
            </div>
        </div>
        <a id="project_filter_close_btn" class="filter_header_close"><i class="fas fa-times"></i></a>`;

        var projectHTML =`
        <div id="filter_header" class="row"> `
        + projectFltrHTML +
        `</div>
        <div id="card_container" class="row">`;
        if (Varibles.PageData != undefined & Varibles.PageData != null) {
            for (let i = 0; i < Varibles.PageData.length; i++) {
                projectHTML = projectHTML + 
                `<div class="col-xl-3 col-lg-4 col-md-6 col-12">
                    <div id="project_card_${Varibles.PageData[i]["ProjectID"]}" class="card partner-card">
                        <div class="card-body">
                            <p class="card-text partner-name">${Varibles.PageData[i]["ProjectStreet"]}</p>
                            <p class="card-text">${Varibles.PageData[i]["ProjectCity"]}</p>
                        </div> 
                    </div>
                </div>`
            }
        }else{
            projectHTML = projectHTML + `<p class="no_search_result_msg">Nincs a keresésnek megfelelő elem.</p>`;
        }

        +                     
        `</div>`;

        Varibles.Shell.innerHTML = projectHTML;
        document.getElementById('project_filter_close_btn').addEventListener('click', closeFilterHeader, false);
        document.getElementById('project_filter_submit_btn').addEventListener('click', Filters.getFilterData, false);;
        setCCheight();
    }
}
let Filters = {
    getFilterData: function (params) {
        Varibles.FilterData = {ProjectCity:""};
        Varibles.FilterData.ProjectCity = document.getElementById("input_project_city").value;
        Projects.loadModule(Varibles.Shell);
    }
}