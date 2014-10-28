

		var today = new Date();
		var dayOfWeekStartingSundayZeroIndexBased = today.getDay(); // 0 : Sunday ,1 : Monday,2,3,4,5,6 : Saturday
		var mondayOfWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - today.getDay()+1);
		var tuesdayOfWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - today.getDay()+2);
		var wedensdayOfWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - today.getDay()+3);
		var thursdayOfWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - today.getDay()+4);
		var fridayOfWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - today.getDay()+5);
		var saturdayOfWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - today.getDay()+6);
		var sundayOfWeek = new Date(today.getFullYear(), today.getMonth(), today.getDate() - today.getDay()+7);
	    
		 var dd = mondayOfWeek.getDate();
    	var mm = mondayOfWeek.getMonth() + 1;
      var y = mondayOfWeek.getFullYear();
     	var mon = dd + '/' + mm + '/' + y;

      var dd = tuesdayOfWeek.getDate();
      var mm = tuesdayOfWeek.getMonth() + 1;
      var y = tuesdayOfWeek.getFullYear();
      var tue = dd + '/' + mm + '/' + y;

      var dd = wedensdayOfWeek.getDate();
      var mm = wedensdayOfWeek.getMonth() + 1;
      var y = wedensdayOfWeek.getFullYear();
      var wed = dd + '/' + mm + '/' + y;


      var dd = thursdayOfWeek.getDate();
      var mm = thursdayOfWeek.getMonth() + 1;
      var y = thursdayOfWeek.getFullYear();
      var thu = dd + '/' + mm + '/' + y;

      var dd = fridayOfWeek.getDate();
      var mm = fridayOfWeek.getMonth() + 1;
      var y = fridayOfWeek.getFullYear();
      var fri = dd + '/' + mm + '/' + y;

      var dd = saturdayOfWeek.getDate();
      var mm = saturdayOfWeek.getMonth() + 1;
      var y = saturdayOfWeek.getFullYear();
      var sat = dd + '/' + mm + '/' + y;

      var dd = sundayOfWeek.getDate();
      var mm = sundayOfWeek.getMonth() + 1;
      var y = sundayOfWeek.getFullYear();
      var sund = dd + '/' + mm + '/' + y;


   		 document.getElementById('mon').value = mon;
   		 document.getElementById('tue').value = tue;
   		 document.getElementById('wed').value = wed;
   		 document.getElementById('thu').value = thu;
   		 document.getElementById('fri').value = fri;
   		 document.getElementById('sat').value = sat;
   		 document.getElementById('sun').value = sund;
  		 


function nextweek() {

    days = 7;// the number of days to add
    var day1 = document.getElementById('mon').value; // the test date
    strDate = day1.split("/").reverse().join("/"); // split it, reverse it and join it. 
    nDate = new Date( strDate ); // make a date object.
    fDate = new Date( nDate.setTime( nDate.getTime() + (days * (24*60*60*1000)) ) ); // add the days via time calculation in milliseconds
    var dd = fDate.getDate();
    var mm = fDate.getMonth() + 1;
    var y = fDate.getFullYear();
    var newmon = dd + '/' + mm + '/' + y;
    document.getElementById('mon').value = newmon;

    
    var day2 = document.getElementById('tue').value; // the test date
    strDate = day2.split("/").reverse().join("/"); // split it, reverse it and join it. 
    nDate = new Date( strDate ); // make a date object.
    fDate = new Date( nDate.setTime( nDate.getTime() + (days * (24*60*60*1000)) ) ); // add the days via time calculation in milliseconds
    var dd = fDate.getDate();
    var mm = fDate.getMonth() + 1;
    var y = fDate.getFullYear();
    var newtue = dd + '/' + mm + '/' + y;
    document.getElementById('tue').value = newtue;


    var day3 = document.getElementById('wed').value; // the test date
    strDate = day3.split("/").reverse().join("/"); // split it, reverse it and join it. 
    nDate = new Date( strDate ); // make a date object.
    fDate = new Date( nDate.setTime( nDate.getTime() + (days * (24*60*60*1000)) ) ); // add the days via time calculation in milliseconds
    var dd = fDate.getDate();
    var mm = fDate.getMonth() + 1;
    var y = fDate.getFullYear();
    var newwed = dd + '/' + mm + '/' + y;
    document.getElementById('wed').value = newwed;


    var day4 = document.getElementById('thu').value; // the test date
    strDate = day4.split("/").reverse().join("/"); // split it, reverse it and join it. 
    nDate = new Date( strDate ); // make a date object.
    fDate = new Date( nDate.setTime( nDate.getTime() + (days * (24*60*60*1000)) ) ); // add the days via time calculation in milliseconds
    var dd = fDate.getDate();
    var mm = fDate.getMonth() + 1;
    var y = fDate.getFullYear();
    var Newest = dd + '/' + mm + '/' + y;
    document.getElementById('thu').value = Newest;


    var day5 = document.getElementById('fri').value; // the test date
    strDate = day5.split("/").reverse().join("/"); // split it, reverse it and join it. 
    nDate = new Date( strDate ); // make a date object.
    fDate = new Date( nDate.setTime( nDate.getTime() + (days * (24*60*60*1000)) ) ); // add the days via time calculation in milliseconds
    var dd = fDate.getDate();
    var mm = fDate.getMonth() + 1;
    var y = fDate.getFullYear();
    var Newest = dd + '/' + mm + '/' + y;
    document.getElementById('fri').value = Newest;


    var day6 = document.getElementById('sat').value; // the test date
    strDate = day6.split("/").reverse().join("/"); // split it, reverse it and join it. 
    nDate = new Date( strDate ); // make a date object.
    fDate = new Date( nDate.setTime( nDate.getTime() + (days * (24*60*60*1000)) ) ); // add the days via time calculation in milliseconds
    var dd = fDate.getDate();
    var mm = fDate.getMonth() + 1;
    var y = fDate.getFullYear();
    var Newest = dd + '/' + mm + '/' + y;
    document.getElementById('sat').value = Newest;


    var day7 = document.getElementById('sun').value; // the test date
    strDate = day7.split("/").reverse().join("/"); // split it, reverse it and join it. 
    nDate = new Date( strDate ); // make a date object.
    fDate = new Date( nDate.setTime( nDate.getTime() + (days * (24*60*60*1000)) ) ); // add the days via time calculation in milliseconds
    var dd = fDate.getDate();
    var mm = fDate.getMonth() + 1;
    var y = fDate.getFullYear();
    var Newest = dd + '/' + mm + '/' + y;
    document.getElementById('sun').value = Newest;
 } 		 


function lastweek() {

    days = 7;// the number of days to add
    var day1 = document.getElementById('mon').value; // the test date
    strDate = day1.split("/").reverse().join("/"); // split it, reverse it and join it. 
    nDate = new Date( strDate ); // make a date object.
    fDate = new Date( nDate.setTime( nDate.getTime() - (days * (24*60*60*1000)) ) ); // add the days via time calculation in milliseconds
    var dd = fDate.getDate();
    var mm = fDate.getMonth() + 1;
    var y = fDate.getFullYear();
    var newmon = dd + '/' + mm + '/' + y;
    document.getElementById('mon').value = newmon;

    
    var day2 = document.getElementById('tue').value; // the test date
    strDate = day2.split("/").reverse().join("/"); // split it, reverse it and join it. 
    nDate = new Date( strDate ); // make a date object.
    fDate = new Date( nDate.setTime( nDate.getTime() - (days * (24*60*60*1000)) ) ); // add the days via time calculation in milliseconds
    var dd = fDate.getDate();
    var mm = fDate.getMonth() + 1;
    var y = fDate.getFullYear();
    var newtue = dd + '/' + mm + '/' + y;
    document.getElementById('tue').value = newtue;


    var day3 = document.getElementById('wed').value; // the test date
    strDate = day3.split("/").reverse().join("/"); // split it, reverse it and join it. 
    nDate = new Date( strDate ); // make a date object.
    fDate = new Date( nDate.setTime( nDate.getTime() - (days * (24*60*60*1000)) ) ); // add the days via time calculation in milliseconds
    var dd = fDate.getDate();
    var mm = fDate.getMonth() + 1;
    var y = fDate.getFullYear();
    var newwed = dd + '/' + mm + '/' + y;
    document.getElementById('wed').value = newwed;


    var day4 = document.getElementById('thu').value; // the test date
    strDate = day4.split("/").reverse().join("/"); // split it, reverse it and join it. 
    nDate = new Date( strDate ); // make a date object.
    fDate = new Date( nDate.setTime( nDate.getTime() - (days * (24*60*60*1000)) ) ); // add the days via time calculation in milliseconds
    var dd = fDate.getDate();
    var mm = fDate.getMonth() + 1;
    var y = fDate.getFullYear();
    var Newest = dd + '/' + mm + '/' + y;
    document.getElementById('thu').value = Newest;


    var day5 = document.getElementById('fri').value; // the test date
    strDate = day5.split("/").reverse().join("/"); // split it, reverse it and join it. 
    nDate = new Date( strDate ); // make a date object.
    fDate = new Date( nDate.setTime( nDate.getTime() - (days * (24*60*60*1000)) ) ); // add the days via time calculation in milliseconds
    var dd = fDate.getDate();
    var mm = fDate.getMonth() + 1;
    var y = fDate.getFullYear();
    var Newest = dd + '/' + mm + '/' + y;
    document.getElementById('fri').value = Newest;


    var day6 = document.getElementById('sat').value; // the test date
    strDate = day6.split("/").reverse().join("/"); // split it, reverse it and join it. 
    nDate = new Date( strDate ); // make a date object.
    fDate = new Date( nDate.setTime( nDate.getTime() - (days * (24*60*60*1000)) ) ); // add the days via time calculation in milliseconds
    var dd = fDate.getDate();
    var mm = fDate.getMonth() + 1;
    var y = fDate.getFullYear();
    var Newest = dd + '/' + mm + '/' + y;
    document.getElementById('sat').value = Newest;


    var day7 = document.getElementById('sun').value; // the test date
    strDate = day7.split("/").reverse().join("/"); // split it, reverse it and join it. 
    nDate = new Date( strDate ); // make a date object.
    fDate = new Date( nDate.setTime( nDate.getTime() - (days * (24*60*60*1000)) ) ); // add the days via time calculation in milliseconds
    var dd = fDate.getDate();
    var mm = fDate.getMonth() + 1;
    var y = fDate.getFullYear();
    var Newest = dd + '/' + mm + '/' + y;
    document.getElementById('sun').value = Newest;
 }  










