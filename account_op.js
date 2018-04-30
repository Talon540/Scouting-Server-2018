var today = new Date();
document.querySelector("#date").valueAsDate = today;
document.querySelector("#date2").valueAsDate = today;

if (today.getDay() == 6){
    document.getElementById("time").value="08:00:00";
    document.getElementById("time2").value="17:00:00";
} else if (today.getDay() == 3){
    document.getElementById("time").value="16:00:00";
    document.getElementById("time2").value="21:00:00";
} else if (today.getDay() == 5){
    document.getElementById("time").value="16:00:00";
    document.getElementById("time2").value="22:00:00";
} else {
    document.getElementById("time").value="16:00:00";
    document.getElementById("time2").value="19:00:00";
}

console.log(Date());