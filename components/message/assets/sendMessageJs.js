
    function listboxresult1()
    {
        var spanresult=document.getElementById("result1");
        spanresult.value="";
        var x=document.getElementById("opt1");
        for(var i=0;i<x.options.length;i++)
        {
            if(x.options[i].selected === true)
            {
                spanresult.value += x.options[i].value + " ";
                document.getElementById("result1").innerHTML=spanresult.value;
                
            }
        }
    }
