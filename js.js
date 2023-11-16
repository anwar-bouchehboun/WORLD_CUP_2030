




window.addEventListener("DOMContentLoaded",()=>{
    const queryString =  window.location.search;
    
    const groupe =  document.getElementById("groupe")
    console.log(queryString.includes("ALL"))
    console.log(queryString)

    if(!queryString.includes("ALL")){

        groupe.classList.add("hideGroup")
        
    }
    if(queryString === ""){
        groupe.classList.remove("hideGroup")

    }
    else{
       
        

    }
    
    
})