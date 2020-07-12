let currentYear=new Date().getFullYear();
// fill data to examination year dropdown
let yearValues=document.getElementById("examinationYear");
let beginYear=currentYear-10;
let endYear=currentYear+2;
while(beginYear<endYear){
    yearValues.options[yearValues.options.length] = new Option(beginYear.toString(),beginYear.toString());
    beginYear++;
}
yearValues.value=currentYear.toString();
// fill data to batch dropdown
let batchValues=document.getElementById("batch");
let data;
beginYear=currentYear-17;
while (beginYear<currentYear){
    data=(beginYear-1).toString()+"/"+beginYear.toString();
    batchValues.options[batchValues.options.length] = new Option(data,data);
    beginYear++;
}
