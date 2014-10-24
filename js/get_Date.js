// create a formatted date
function get_Date() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    var time = today.getHours() + ":" + today.getMinutes();

    if (dd < 10) { dd='0'+dd } 
    if (mm < 10) { mm='0'+mm } 
    var today = dd + '-' + mm + '-' + yyyy + ' ' + time + ':00';

	return today;
}
