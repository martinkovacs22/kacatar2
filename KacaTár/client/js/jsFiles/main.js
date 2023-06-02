import { httpClient } from "../config/http/httpClient.js";
import { fetchUser } from "../config/http/fetchUser.js";
window.addEventListener("load",(e)=>{
    e.preventDefault();
    const http = new httpClient(fetchUser);
    const data1 = {
        fun:"catagory"
    }
    http.getAllCategory(data1,(err,data)=>{
        if (err) {
            console.log(data);
        }
        else{
            console.log("category Item");
            data.data.forEach(item=>{
                console.log(item);
                document.getElementById("dropdownItem").innerHTML = `
                <a class="dropdown-item" href="#">${item.value}</a>
                `;
            });
        }
    })
})
document.getElementById("searchInput").addEventListener("input",(e)=>{
    e.preventDefault();
    const http = new httpClient(fetchUser);
    const data = {
        fun:"search",
        data:e.target.value
    }
    if (e.target.value[1] != null) {
        http.getProductBySearchData(data,(err,data)=>{
            if (err) {
                console.error(data);
                if (document.getElementById("searchData").classList.contains("searchData")) {
                    document.getElementById("searchData").classList.remove("searchData")
                }
            }else{
                if (!document.getElementById("searchData").classList.contains("searchData")) {
                    document.getElementById("searchData").classList.add("searchData")
                }
                document.getElementById("searchData").innerHTML='';
                data.data.forEach(item => {
                    document.getElementById("searchData").innerHTML+=`
                    <a href="productItem.html#${item.id}">
                    ${item.productName}
                    </a>
                `
                });
                
    
                console.log(data);
            }
        })
    }else{
        document.getElementById("searchData").innerHTML='';
        if (document.getElementById("searchData").classList.contains("searchData")) {
            document.getElementById("searchData").classList.remove("searchData")
        }
    }
    
    
})