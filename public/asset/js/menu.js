"use strict";

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('tab-group').className = 'ready';

    var headerClass = 'tab-header',
        contentClass = 'tab-content';

    document.getElementById('tab-group').addEventListener('click', function(event) {

        var myHeader = event.target;

        if (myHeader.className !== headerClass) return;

        var myID = myHeader.id, // e.g. tab-header-1
            contentID = myID.replace('header', 'content'); // result: tab-content-1

        deactivateAllTabs();

        myHeader.className = headerClass + ' active';
        document.getElementById(contentID).className = contentClass + ' active';
    });

    function deactivateAllTabs() {
        var tabHeaders = document.getElementsByClassName(headerClass),
            tabContents = document.getElementsByClassName(contentClass);

        for (var i = 0; i < tabHeaders.length; i++) {
            tabHeaders[i].className = headerClass;
            tabContents[i].className = contentClass;
        }
    }
});
