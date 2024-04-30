function insertMarkdown(prefix, suffix) {
    var textarea = document.getElementById('description');
    var start = textarea.selectionStart;
    var end = textarea.selectionEnd;
    var selectedText = textarea.value.substring(start, end);
    var replacement = prefix + selectedText + suffix;
    textarea.value = textarea.value.substring(0, start) + replacement + textarea.value.substring(end);
}