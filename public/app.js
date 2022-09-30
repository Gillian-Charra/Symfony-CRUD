async function jsonFetch(url){
    const response = await fetch(url, {
        headers:{
            Accept:'application/json',
        },
    })
    if (response.status===204){
        return null;
    }
    if (response.ok) {
        return await response.json()
    }
    throw response
}
/**
 * @param {HTMLSelectElement} select 
 */
function bindSelect(select){

    new TomSelect(select,{
        
        hideSelected:true,
        closeAfterSelect:true,
        valueField:'id',
        labelField:'nom',
        searchField:'nom',

        load:async(query,callback)=>{

            const url =`${select.dataset.remote}?q=${encodeURIComponent(query)}`
            callback(await jsonFetch(url))
        }
    })
}


Array.from(document.querySelectorAll('select[multiple]')).map(bindSelect)

//Bizarre
//document.getElementsByClassName("ts-wrapper form-control multi required invalid has-options").classList.remove("form-control")
