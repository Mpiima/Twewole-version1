function PrintDiv(id) {
            var data=document.getElementById(id).innerHTML;
            var myWindow = window.open('', 'my div', 'height=400,width=600');
            myWindow.document.write('<html><head><title>Print</title>');
myWindow.document.write('<link href="css/style.css" rel="stylesheet">');
myWindow.document.write('<link href="css/bootstrap.css" rel="stylesheet">');

            myWindow.document.write('</head><body>');
            myWindow.document.write(data);
            myWindow.document.write('</body></html>');
            myWindow.document.close(); // necessary for IE >= 10

            myWindow.onload=function(){ // necessary if the div contain images

                myWindow.focus(); // necessary for IE >= 10
                myWindow.print();
                myWindow.close();
            };
        }

        //my button<input type="button" value="Print table" style="float:right;" class="btn btn-sm btn-info" onclick="PrintDiv('myDiv')" />