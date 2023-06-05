import { fetchUser } from "../config/http/fetchUser.js";
import { httpClient } from "../config/http/httpClient.js";
import { Location } from "../config/location/location.js"; 
import { CookieHandler } from "../config/cookie/cookie.js";
const http = new httpClient(fetchUser);
document.getElementById("sigup").addEventListener("submit",(e)=>{
    e.preventDefault();
})
document.getElementById("login").addEventListener("submit",(e)=>{
    e.preventDefault();
    const data = {
        fun:"login",
        email: e.target.Lemail.value,
        pass: e.target.Lpass.value
    }
http.login(data,(err,data)=>{
    if (err) {
        console.error(data);
    }
    else{
        console.log(data);
    }
})

})