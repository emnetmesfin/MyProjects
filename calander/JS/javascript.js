 //	var holidays = [[""]];

    function genTable(start, end, month, zemen){
		if(start == 0 ){
	    		start += 1;
	    	}
	    if(end - start > 5){
	    	end-=1;
	    }
    	// var oldTable = document.getElementById("monthTable");
    	var table = document.createElement("table");
    	var head_tr = document.createElement("tr");

    	var th = document.createElement("th");
    	th.setAttribute("colspan","5");

    	var th2 = document.createElement("th");
    	th2.setAttribute("colspan","2");

    	var month_name = document.createElement("span");
    	month_name.innerHTML = month;

    	var zemen_name = document.createElement("span");
    	zemen_name.innerHTML = zemen;

    	th.appendChild(month_name);
    	th2.appendChild(zemen_name);
    	head_tr.appendChild(th);
    	head_tr.appendChild(th2);

    	table.appendChild(head_tr);
    	head_tr.classList.add("month_header");

    	table.classList.add("monthTable");
    	table.style.display = "initial";

    	var day_list = ["ሰኞ","ማክሰኞ","ረቡዕ","ሀሙስ","አርብ","ቅዳሜ","እሁድ"];
    	var day_tr = document.createElement("tr");
    	for(day in day_list){
    		var cur_day = day_list[day];
    		var day_td = document.createElement("td");
    		day_td.style.width = "64px";
    		day_td.style.textAlign = "center";
    		var node = document.createTextNode(cur_day);
    		day_td.appendChild(node);
    		day_tr.appendChild(day_td);
    	}
    	table.appendChild(day_tr);


    	var tr;
    	var trCount = 0;
    	var count = 1;
    	for(i = 1;i<=42;i++){
    		var td = document.createElement("td");
    		td.setAttribute("id",i);

			if (i > end && i+1 % 7 == 0){
				td.colspan = end-i;
	    		break;
	    	}

    		if(((i - 1) % 7 == 0)){
    			tr = document.createElement("tr");
    			tr.appendChild(td);
				trCount += 1;
			}
			else{
				tr.appendChild(td);
			}

			if(i >= start && i <= end && count <= 30){
				var node = document.createTextNode(count);
				td.appendChild(node);
				td.style.textAlign = "center";
				count = count + 1;
				table.appendChild(tr);
			}
	    	
    		
				
		}
		return [table,(count + start - 1)%7];	
    }




    function display_yearly(){
    	document.getElementById("single").style.display = "none";
    	document.getElementById("month").style.visibility = "visible";
    	var month = document.getElementById("month");
    	month.innerHTML = null;
 		var months = ["መስከረም","ጥቅምት","ህዳር","ታህሳስ","ጥር","የካቲት","መጋቢት","ሚያዝያ","ግንቦት","ሰኔ","ሀምሌ","ነሀሴ"];

    	var year = eval(document.getElementById("year").value);

    	var pagDay = 5;
    	    
    	if(year%4==0){zemen=" ዘመነ ዮሐንስ";pagDay = 6;}
		else if(year%4==1){zemen="ዘመነ ማቴዎስ";}
		else if (year%4==2){zemen="ዘመነ ማርቆስ";}
		else {zemen="ዘመነ ሉቃስ";}

		var ZEMENBLUE = 5500;
		var ameteAlem= ZEMENBLUE + year;
		var count = 1;

		var ndays= (ameteAlem) + (ameteAlem/4) +(1 * 30)+ 2;
		var dayStart = ((ndays + 6)%7);
		dayStart = dayStart % 7;
		
		if(year % 4 - 1 === 0){
			dayStart = (dayStart+1)%7;
		}
		
		dayStart = (dayStart - 3)%7;
		
		while(dayStart < 0){
			dayStart += 7;
		}
    	
    	for(i in months){
		
			var lastDay = dayStart + 31;
			
    		var table = genTable(dayStart,lastDay,months[i],zemen);
    		month.appendChild(table[0]);
    		dayStart = table[1];
    		
    	}

		var dayStart= table[1];
    	month.appendChild(genTable(dayStart,dayStart + pagDay,"ጳጉሜ",zemen)[0]);
    }






    function display_monthly(){
    	var months = ["መስከረም","ጥቅምት","ህዳር","ታህሳስ","ጥር","የካቲት","መጋቢት","ሚያዝያ","ግንቦት","ሰኔ","ሀምሌ","ነሀሴ","ጳጉሜ"];
    	//document.getElementById("single").innerHTML = "";
    	document.getElementById("month").style.visibility = "hidden";
    	document.getElementById("single").style.display = "initial";
        document.getElementById("single").innerHTML = null;
    	var year = eval(document.getElementById("year").value);
    	var month = eval(document.getElementById("month_val").value);

    	var zemen;
    	if(year%4==0){zemen="ዘመነ ዮሐንስ";}
		else if(year%4==1){zemen="ዘመነ ማቴዎስ";}
		else if (year%4==2){zemen="ዘመነ ማርቆስ";}
		else {zemen="ዘመነ ሉቃስ";}

    	var ZEMENBLUE = 5500;
		var ameteAlem= ZEMENBLUE + year;
		var count = 1;

		var ndays= (ameteAlem) + (ameteAlem/4) +((month) * 30)+ 2;
		var dayStart = ((ndays + 6)%7);
		dayStart = (dayStart-3) % 7;
		if(dayStart < 0){
			dayStart += 7;
		}
		var days;
		if(month < 13){
			days = 31;
		}
		else{
			days = 5
			if (year%4 == 0){
				days = 6;
			}
		}
		var lastDay = dayStart + days;

    	document.getElementById("single").appendChild(genTable(dayStart,lastDay,months[month-1],zemen)[0]);
    }

    function test(val){
    	
    	document.getElementById("test").innerHTML += val;
    }
