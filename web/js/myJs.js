function myPopup(myURL, title, myWidth, myHeight)
{
    var left = (screen.width - myWidth) / 2;
    var top = (screen.height - myHeight) / 4;
    var myWindow = window.open(myURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=' + myWidth + ', height=' + myHeight + ', top=' + top + ', left=' + left);
}

