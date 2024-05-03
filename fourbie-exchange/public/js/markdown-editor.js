function insertHTML(startTag, endTag) {
    var textarea = document.getElementById("description");
    var start = textarea.selectionStart;
    var end = textarea.selectionEnd;
    var selectedText = textarea.value.substring(start, end);
    var replacement = startTag + selectedText + endTag;
    
    // Replace the selected text with the modified text
    textarea.setRangeText(replacement, start, end, 'end');

    // Move the cursor position
    textarea.focus();
    textarea.selectionStart = start + startTag.length;
    textarea.selectionEnd = end + startTag.length;
    renderPreview();
}

function insertLink() {
    var textarea = document.getElementById("description");
    var start = textarea.selectionStart;
    var end = textarea.selectionEnd;
    var linkText = prompt("Enter link text:");
    var url = prompt("Enter URL:");
    if (linkText && url) {
        var replacement = '<a href="' + url + '">' + linkText + '</a>';
        textarea.setRangeText(replacement, start, end, 'end');
        textarea.focus();
        textarea.selectionStart = start + linkText.length + url.length + 9;
        textarea.selectionEnd = start + linkText.length + url.length + 9;
    }

    renderPreview();
}

function insertList() {
    var textarea = document.getElementById("description");
    var start = textarea.selectionStart;
    var end = textarea.selectionEnd;
    var selectedText = textarea.value.substring(start, end);
    var lines = selectedText.split(/\r?\n/);
    var replacement = '<ul>';
    lines.forEach(function(line) {
        if (line.trim() !== '') {
            replacement += '<li>' + line.trim() + '</li>';
        }
    });
    replacement += '</ul>';
    textarea.setRangeText(replacement, start, end, 'end');
    textarea.focus();
    textarea.selectionStart = start + 4;
    textarea.selectionEnd = start + 4;

    renderPreview();
}


function renderPreview() {
    var textarea = document.getElementById("description");
    var previewDiv = document.getElementById("previewContent");
    var htmlText = textarea.value;
    previewDiv.innerHTML = htmlText;
}
