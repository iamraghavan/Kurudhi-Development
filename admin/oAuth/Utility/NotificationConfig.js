const buttonele = document.getElementById('buttonID');


buttonele.addEventListener('click',()=>{

    //    swal("Hello World")

    Notification.requestPermission().then(requestParameter => {
        const leaveDate = new Date();
        if(requestParameter === "granted"){
           const notification = new Notification("Example Notification",{
                
            
            
      
                body : `Hello Raghavan you have bee gone for ${Math.round(new Date() - leaveDate.getTime()/1000)}`,
                data: {
                    hello : "world"},
                icon : "https://firebasestorage.googleapis.com/v0/b/portfolio-4bf1c.appspot.com/o/CRW%201instaLogo.png?alt=media&token=075a78d5-3efc-4781-bff6-3e2af506bf6e",
                // tag : "Welcome Message",



            })
        } else{
            notification.close();
            
        }
        notification.addEventListener("error",e =>{
            alert("error")
        })

        // if(requestParameter === "granted"){ 
        // }

    })

});

let notification;

document.addEventListener("visibilitychange", ()=>{
    if(document.visibilityState === "hidden"){
        const leaveDate = new Date();
       let interval = setInterval(()=>{
            notification = new Notification("Comback Please", {
                body : `Hello Raghavan you have bee gone for ${Math.round(new Date() - leaveDate.getTime()/1000)}`,
                tag: "Comback"
            })
        },100);
        
        
        
    }

    else{
        notification.close();
        if (interval) clearInterval(interval);
        if (notification) notification.close();
    }
})