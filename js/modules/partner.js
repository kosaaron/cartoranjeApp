import { closeFilterHeader } from "../filter.js";
import { setCCheight } from '../main.js';

let Varibles = {
    //data
    Shell: null,
    FilterData : {PartnerName:""},
    PageData: []
}

let Partners = {
    loadModule: function (shell) {
        Varibles.Shell = shell;
        Database.getFullPageData();
    } 
}

export default Partners;

let Database = {
    getFullPageData: function () {
        // var filterdata = "Market";
        var filterdata = Varibles.FilterData; 
        // var filterdata = {PartnerName:""};
        // alert(filterdata);
        // alert(Varibles.FilterData);
        $.ajax({
            type: "POST",
            url: "./php/modules/Partners.php",
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
        var partnerFltrHTML= `
        <div class="col-12 filter-container">
            <div class="row">
                <div class="col-md-10 col-12">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12">
                            <input type="text" name="Név" id="input_partner_name" class="form-control filter-input" placeholder="Megrendelő neve">
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-12 align-right">
                    <a id="partner_filter_submit_btn" type="button" class="btn btn-light filter-button">Szűr <i class="fas fa-filter"></i></a>
                </div>
            </div>
        </div>
        <a id="partner_filter_close_btn" class="filter_header_close"><i class="fas fa-times"></i></a>`;

        var partnerHTML =`
        <div id="filter_header" class="row"> `
        + partnerFltrHTML +
        `</div>
        <div id="card_container" class="row">`;
        if (Varibles.PageData != undefined & Varibles.PageData != null) {
            for (let i = 0; i < Varibles.PageData.length; i++) {
                partnerHTML = partnerHTML + 
                `<div class="col-xl-3 col-lg-4 col-md-6 col-12">
                    <div id="partner_card_${Varibles.PageData[i]["PartnerID"]}" class="card partner-card">
                        <div class="card-body">
                            <p class="card-text partner-name">${Varibles.PageData[i]["PartnerName"]}</p>
                            <p class="card-text"><a href="tel:${Varibles.PageData[i]["PartnerPhone"]}">${Varibles.PageData[i]["PartnerPhone"]}</a></p>
                            <p class="card-text"><a href="mailto:${Varibles.PageData[i]["PartnerEmail"]}">${Varibles.PageData[i]["PartnerEmail"]}</a></p>
                        </div>
                    <i class="fas fa-user partner-icon"></i>  
                    </div>
                </div>`
            }
        }else{
            partnerHTML = partnerHTML + `<p class="no_search_result_msg">Nincs a keresésnek megfelelő elem.</p>`;
        }

        +                     
        `</div>`;

        Varibles.Shell.innerHTML = partnerHTML;
        document.getElementById('partner_filter_close_btn').addEventListener('click', closeFilterHeader, false);
        document.getElementById('partner_filter_submit_btn').addEventListener('click', Filters.getFilterData, false);;
        setCCheight();
    }
}
let Filters = {
    getFilterData: function (params) {
        Varibles.FilterData = {PartnerName:""};
        Varibles.FilterData.PartnerName = document.getElementById("input_partner_name").value;
        Partners.loadModule(Varibles.Shell);
    }
}