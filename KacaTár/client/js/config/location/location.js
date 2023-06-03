import { CookieHandler } from "../cookie/cookie.js";
import { fetchUser } from "../http/fetchUser.js";
import { httpClient } from "../http/httpClient.js";
export class Location{

    exit(){
        const cookie = new CookieHandler();
    if (cookie.get("token")) {
        const http = new httpClient(fetchUser);
        http.loginByToken((err,result)=>{
            if (err) {
                window.location = "main.html";
            }
    })
}else{
    window.location = "main.html";
}
    }
    loginLets(){
        window.location = "sign.html";
    }
    isActiceUser(){
        const cookie = new CookieHandler();
    if (cookie.get("token")) {
        const http = new httpClient(fetchUser);
        http.loginByToken((err,result)=>{
            if (err) {
                return false;
            }
            else{
                return true;
            }
    })
}else{
    return false;
}
    }
    start(){
        const cookie = new CookieHandler();
    if (cookie.get("token") !=null) {
        console.log("fut");
        const http = new httpClient(fetchUser);
        http.loginByToken((err,result)=>{
            if (!err) {
                window.location = "main.html";
            }
    })
}
    }


}