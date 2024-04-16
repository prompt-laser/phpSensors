function NewSensor(type){
 let target = prompt("Please enter the target for the new sensor");
 if(target !== null && target !== ""){
  let e = document.createElement("div");
  e.classList.add("sensor");
  e.classList.add("col-sm-2");
  e.classList.add("border")
  e.onclick = function() {
   RemoveSensor(this);
  }
  e.dataset.target = target;
  switch(type){
   case "ping":
    e.dataset.type="ping";
    break;
   case "http":
    e.dataset.type="http";
    break;
   case "https":
    e.dataset.type="https";
    break;
   case "html":
    e.dataset.type="html";
    break;
  }
  document.getElementById("main-content").append(e);
 }
}

function RemoveSensor(elem){
 if(confirm("Delete this sensor?")){
  elem.remove();
 }
}

function Run(){
 let sensors = document.getElementsByClassName("sensor");
 for(i=0; i<sensors.length; i++){
  sensors[i].dataset.target;
  switch(sensors[i].dataset.type){
   case "ping":
    AJAX(pingURL + sensors[i].dataset.target, sensors[i]);
    break;
   case "http":
    AJAX(httpURL + sensors[i].dataset.target, sensors[i]);
    break;
   case "https":
    AJAX(httpsURL + sensors[i].dataset.target, sensors[i]);
    break;
   case "html":
    AJAX(htmlURL + sensors[i].dataset.target, sensors[i]);
    break;
  }
 }
}

function AJAX(aTarget, eTarget){
 let request = new XMLHttpRequest();
 request.onreadystatechange = function() {
  if(this.readyState === 4){
   eTarget.classList.remove("bg-danger");
   eTarget.classList.remove("bg-warning");
   eTarget.classList.remove("bg-success");
   eTarget.innerHTML = eTarget.dataset.target + "<br>" + eTarget.dataset.type + ":";
   if(this.status === 200){
    if(this.responseText !== ""){
     eTarget.classList.add("bg-success");
     eTarget.innerHTML += this.responseText;
    }else{
     eTarget.classList.add("bg-warning");
     eTarget.innerHTML += "timeout";
    }
   }else if(this.status === 500){
    eTarget.classList.add("bg-danger");
    eTarget.innerHTML += "ERR";
   }
  }
 };

 request.open("GET", aTarget, true);
 request.send();
}

let pingURL = "incl/ajax/ping.php?";
let httpURL = "incl/ajax/http.php?";
let httpsURL = "incl/ajax/https.php?";
let htmlURL = "incl/ajax/html.php?";

setInterval(Run, 5000);
