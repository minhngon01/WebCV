function printDiv(selector) {
    var prtContent = document.getElementById(selector);
	var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
	WinPrint.document.write('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">');
	WinPrint.document.write('<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">');
	WinPrint.document.write('<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">');
	WinPrint.document.write('<link rel="stylesheet" href="./css/style.css">');
	WinPrint.document.write(prtContent.innerHTML);
	WinPrint.document.close();
	WinPrint.focus();
	WinPrint.print();
	WinPrint.close();
}